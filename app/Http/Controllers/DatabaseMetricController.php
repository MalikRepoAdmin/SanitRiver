<?php
namespace App\Http\Controllers;

use App\Models\DatabaseMetric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseMetricController extends Controller
{
    /**
     * 1. READ: Menampilkan data metrik ke halaman web
     */
    public function index()
    {
        DB::enableQueryLog();
        $startTime = microtime(true);
        
        $storageMetrics = DatabaseMetric::getTableStorageMetrics();
        
        $queryLogs = DB::getQueryLog();
        $totalQueries = count($queryLogs) > 0 ? count($queryLogs) : 1;
        $executionTimeMs = (microtime(true) - $startTime) * 1000;
        $memoryUsed = round(memory_get_usage() / 1024 / 1024, 2);

        return view('dashboard.database_metric', compact(
            'storageMetrics', 'totalQueries', 'executionTimeMs', 'memoryUsed'
        ));
    }

    /**
     * 2. CREATE: Mengisi 30 data laporan baru secara otomatis via web
     */
    public function store(Request $request)
    {
        // Pastikan minimal ada 1 data sungai induk agar terhindar dari foreign key error
        $sungaiExists = DB::table('sungais')->where('sungai_id', 1)->exists();
        if (!$sungaiExists) {
            DB::table('sungais')->insert([
                'sungai_id' => 1,
                'nama_sungai' => 'Sungai Brantas',
                'alamat' => 'Jawa Timur',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Eksekusi insert massal meloloskan aturan duplikasi data
        for ($i = 1; $i <= 30; $i++) {
            DB::table('laporan_sungais')->insert([
                'user_id' => 1, 
                'sungai_id' => 1,
                'status' => ['Bersih', 'Cukup Bersih', 'Kurang Bersih', 'Tercemar'][rand(0, 3)],
                'created_at' => now()->subHours($i)->subSeconds(rand(1, 59)),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('database.metric')->with('success', 'Berhasil menjalankan operasi CREATE (30 Laporan Baru Ditambahkan)!');
    }

    /**
     * 3. DELETE: Mengosongkan data laporan sungai dari database
     */
    public function destroy($id)
    {
        $dataTerbaru = DB::table('laporan_sungais')
        ->latest() 
        ->first();

    if ($dataTerbaru) {

        DB::table('laporan_sungais')
            ->where('laporansungai_id', $dataTerbaru->laporansungai_id) 
            ->delete();
    }

    return redirect()->back();
    
    }
}