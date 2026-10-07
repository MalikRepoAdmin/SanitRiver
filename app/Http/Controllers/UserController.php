<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 20);
        $perPage = min($perPage, 100);

        $users = User::with(['laporanSungais'])->latest()->paginate($perPage);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $user = User::where('user_id', $user_id)->with(['laporanSungais.gambarSungais'])->first();

        $nameWordCount = str($user->username)->wordCount() > 1 ? 2 : 1;

        // TODO: define the view route according to frontend inside views/
        return view('users.index', compact('user', 'nameWordCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
        $user = User::where('user_id', $user_id);

        // Validate the user who edit is the user themselves
        if ($user->getKey() !== Auth::id()) {
            abort(403, 'Anda Tidak Memiliki Akses untuk melakukan edit');
        }

        // TODO: define the view route according to frontend inside views/
        return view('user.editProfile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();

        // Validate the user who edit is the user themselves
        if ($user->getKey() !== Auth::id()) {
            abort(403, 'Anda Tidak Memiliki Akses untuk melakukan edit');
        }

        $validated = $request->validate([
            'nama_lengkap' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'tgl_lahir' => 'nullable|string',
            'pekerjaan' => 'nullable|string|max:255',
            'domisili' => 'nullable|string',
        ], [
            'nama_lengkap.max:255' => 'Nama Lengkap maksimal 255 karakter',
            'pekerjaan.max:255' => 'Pekerjaan maksimal 255 karakter',
        ]);

        $user->update($validated);

        // TODO: define the redirect route according to frontend inside views/
        return redirect()->route('user.profile', $user->getKey())->with('status', 'Profil User Berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        $user = user::findOrFail($user_id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
