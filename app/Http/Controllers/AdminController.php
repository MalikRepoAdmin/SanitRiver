<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->integer('per_page', 20);
        $perPage = min($perPage, 100);

        $admins = Admin::with(['sungais'])->latest()->paginate($perPage);

        return view('users.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
    public function show(string $admin_id)
    {
        $admin = Admin::where('admin_id', $admin_id)->with(['sungais.gambarSungais'])->first();

        $nameWordCount = str($admin->username)->wordCount() > 1 ? 2 : 1;

        // TODO: define the view route according to frontend inside views/
        return view('users.index', compact('admin', 'nameWordCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
