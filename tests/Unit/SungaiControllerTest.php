<?php

namespace Tests\Unit;

use App\Http\Controllers\SungaiController;
use App\Models\GambarSungai;
use App\Models\Sungai;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SungaiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_sungais()
    {
        Sungai::create(['nama_sungai' => 'A', 'alamat' => 'X']);
        Sungai::create(['nama_sungai' => 'B', 'alamat' => 'Y']);

        $controller = new SungaiController();
        $response = $controller->index();

        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent(), true);

        $this->assertCount(2, $data);
    }

    public function test_store_creates_sungai()
    {
        $controller = new SungaiController();

        $request = Request::create('/', 'POST', [
            'nama_sungai' => 'C',
            'alamat' => 'Z',
        ]);

        $response = $controller->store($request);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertDatabaseHas('sungais', ['nama_sungai' => 'C']);
    }

    public function test_show_returns_sungai_with_relations()
    {
        $s = Sungai::create(['nama_sungai' => 'Show', 'alamat' => 'Addr']);
        $s->gambarSungais()->create(['file_path' => 'path.jpg']);

        $controller = new SungaiController();
        $response = $controller->show($s);

        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent(), true);

        $this->assertEquals('Show', $data['nama_sungai']);
        $this->assertArrayHasKey('gambar_sungais', $data);
    }

    public function test_update_changes_fields()
    {
        $s = Sungai::create(['nama_sungai' => 'Old', 'alamat' => 'A']);

        $controller = new SungaiController();
        $request = Request::create('/', 'PUT', ['nama_sungai' => 'New']);

        $response = $controller->update($request, $s);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('sungais', ['nama_sungai' => 'New']);
    }

    public function test_destroy_deletes_sungai_and_images()
    {
        Storage::fake('public');

        $s = Sungai::create(['nama_sungai' => 'ToDel', 'alamat' => 'A']);
        $s->gambarSungais()->create(['file_path' => 'gambar_sungais/test.jpg']);
        Storage::disk('public')->put('gambar_sungais/test.jpg', 'contents');

        $this->assertDatabaseCount('gambar_sungais', 1);

        $controller = new SungaiController();
        $response = $controller->destroy($s);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseCount('sungais', 0);
        $this->assertDatabaseCount('gambar_sungais', 0);
        $this->assertFalse(Storage::disk('public')->exists('gambar_sungais/test.jpg'));
    }
}
