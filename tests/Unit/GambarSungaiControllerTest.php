<?php

namespace Tests\Unit;

use App\Http\Controllers\GambarSungaiController;
use App\Models\GambarSungai;
use App\Models\Sungai;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GambarSungaiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_images()
    {
        $sungai = Sungai::create(['nama_sungai' => 'A', 'alamat' => 'X']);
        GambarSungai::create([
            'file_path' => 'a.jpg',
            'imageable_id' => $sungai->sungai_id,
            'imageable_type' => Sungai::class,
        ]);
        GambarSungai::create([
            'file_path' => 'b.jpg',
            'imageable_id' => $sungai->sungai_id,
            'imageable_type' => Sungai::class,
        ]);

        $controller = new GambarSungaiController();
        $response = $controller->index();

        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent(), true);
        $this->assertCount(2, $data);
    }

    public function test_store_uploads_and_creates()
    {
        Storage::fake('public');

        $sungai = Sungai::create(['nama_sungai' => 'Store River', 'alamat' => 'X']);
        $file = UploadedFile::fake()->image('photo.jpg');

        $request = Request::create('/', 'POST', [
            'imageable_id' => $sungai->sungai_id,
            'imageable_type' => Sungai::class,
        ], [], ['file' => $file]);

        $controller = new GambarSungaiController();
        $response = $controller->store($request);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertDatabaseCount('gambar_sungais', 1);
    }

    public function test_show_returns_image()
    {
        $sungai = Sungai::create(['nama_sungai' => 'Show River', 'alamat' => 'Addr']);
        $g = GambarSungai::create([
            'file_path' => 'x.jpg',
            'imageable_id' => $sungai->sungai_id,
            'imageable_type' => Sungai::class,
        ]);

        $controller = new GambarSungaiController();
        $response = $controller->show($g);

        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent(), true);
        $this->assertEquals('x.jpg', $data['file_path']);
    }

    public function test_update_replaces_file()
    {
        Storage::fake('public');

        $sungai = Sungai::create(['nama_sungai' => 'Update River', 'alamat' => 'A']);
        $g = GambarSungai::create([
            'file_path' => 'gambar_sungais/old.jpg',
            'imageable_id' => $sungai->sungai_id,
            'imageable_type' => Sungai::class,
        ]);
        Storage::disk('public')->put('gambar_sungais/old.jpg', 'old');

        $file = UploadedFile::fake()->image('new.jpg');
        $request = Request::create('/', 'POST', [], [], ['file' => $file]);

        $controller = new GambarSungaiController();
        $response = $controller->update($request, $g);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseCount('gambar_sungais', 1);
        $this->assertFalse(Storage::disk('public')->exists('gambar_sungais/old.jpg'));
    }

    public function test_destroy_deletes_file_and_record()
    {
        Storage::fake('public');

        $sungai = Sungai::create(['nama_sungai' => 'Delete River', 'alamat' => 'A']);
        $g = GambarSungai::create([
            'file_path' => 'gambar_sungais/del.jpg',
            'imageable_id' => $sungai->sungai_id,
            'imageable_type' => Sungai::class,
        ]);
        Storage::disk('public')->put('gambar_sungais/del.jpg', 'c');

        $controller = new GambarSungaiController();
        $response = $controller->destroy($g);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseCount('gambar_sungais', 0);
        $this->assertFalse(Storage::disk('public')->exists('gambar_sungais/del.jpg'));
    }
}
