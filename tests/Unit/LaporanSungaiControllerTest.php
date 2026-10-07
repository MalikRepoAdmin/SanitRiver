<?php

namespace Tests\Unit;

use App\Http\Controllers\LaporanSungaiController;
use App\Models\LaporanSungai;
use App\Models\Sungai;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class LaporanSungaiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_reports()
    {
        $user = User::factory()->create();
        $s = Sungai::create(['nama_sungai' => 'L1', 'alamat' => 'jl.pahlawan']);

        LaporanSungai::create([
            'user_id' => $user->user_id,
            'sungai_id' => $s->sungai_id,
            'status' => 'Bersih',
            'persetujuan' => 'menunggu',
        ]);

        $controller = new LaporanSungaiController();
        $response = $controller->index();

        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent(), true);
        $this->assertCount(1, $data);
    }

    public function test_store_creates_report()
    {
        $user = User::factory()->create();
        $s = Sungai::create(['nama_sungai' => 'L2', 'alamat' => 'jl.pahlawan']);

        $controller = new LaporanSungaiController();
        $request = Request::create('/', 'POST', [
            'user_id' => $user->user_id,
            'sungai_id' => $s->sungai_id,
            'status' => 'Cukup Bersih',
            'persetujuan' => 'menunggu',
        ]);

        $response = $controller->store($request);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertDatabaseHas('laporan_sungais', ['status' => 'Cukup Bersih']);
    }

    public function test_show_loads_relations()
    {
        $user = User::factory()->create();
        $s = Sungai::create(['nama_sungai' => 'L3', 'alamat' => 'jl.pahlawan']);
        $lap = LaporanSungai::create([
            'user_id' => $user->user_id,
            'sungai_id' => $s->sungai_id,
            'status' => 'Kurang Bersih',
            'persetujuan' => 'menunggu',
        ]);

        $controller = new LaporanSungaiController();
        $response = $controller->show($lap);

        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('user', $data);
        $this->assertArrayHasKey('sungai', $data);
    }

    public function test_update_modifies()
    {
        $user = User::factory()->create();
        $s = Sungai::create(['nama_sungai' => 'L4', 'alamat' => 'jl.pahlawan']);
        $lap = LaporanSungai::create([
            'user_id' => $user->user_id,
            'sungai_id' => $s->sungai_id,
            'status' => 'Bersih',
            'persetujuan' => 'menunggu',
        ]);

        $controller = new LaporanSungaiController();
        $request = Request::create('/', 'PUT', ['status' => 'Tercemar', 'persetujuan' => 'disetujui']);
        $response = $controller->update($request, $lap);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('laporan_sungais', ['status' => 'Tercemar', 'persetujuan' => 'disetujui']);
    }

    public function test_destroy_deletes_report()
    {
        $user = User::factory()->create();
        $s = Sungai::create(['nama_sungai' => 'L5', 'alamat' => 'jl.pahlawan']);
        $lap = LaporanSungai::create([
            'user_id' => $user->user_id,
            'sungai_id' => $s->sungai_id,
            'status' => 'Bersih',
            'persetujuan' => 'menunggu',
        ]);

        $controller = new LaporanSungaiController();
        $response = $controller->destroy($lap);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseCount('laporan_sungais', 0);
    }
}
