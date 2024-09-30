<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use App\Models\menus;
use Illuminate\Http\Request;

class JenisUserController extends Controller
{
    // Read: Menampilkan semua jenis user
    public function index()
    {
        $jenisUsers = JenisUser::all();
        $menus = Menus::all();
        return view('jenis-user.index', compact('jenisUsers','menus'));
    }

    // Create: Form untuk membuat jenis user baru
    public function create()
    {
        
        $menus = Menus::all();
        $jenisUsers = JenisUser::all();
        return view('jenis-user.create',compact('jenisUsers','menus'));
    }

    // Store: Simpan jenis user baru
    public function store(Request $request)
    {
        $request->validate([
            'jenis_user' => 'required|string|max:255',
        ]);

        JenisUser::create($request->all());

        return redirect()->route('jenis_users.index')
                         ->with('success', 'Jenis user berhasil dibuat.');
    }

    // Edit: Form untuk mengedit jenis user
    public function edit($id)
    {
        $jenisUser = JenisUser::findOrFail($id);
        return view('jenis-user.edit', compact('jenisUser'));
    }

    // Update: Perbarui data jenis user
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_user' => 'required|string|max:255',
        ]);

        $jenisUser = JenisUser::findOrFail($id);
        $jenisUser->update($request->all());

        return redirect()->route('jenis_users.index')
                         ->with('success', 'Jenis user berhasil diperbarui.');
    }

    // Delete: Hapus jenis user
    public function destroy($id)
    {
        $jenisUser = JenisUser::findOrFail($id);
        $jenisUser->delete();

        return redirect()->route('jenis_users.index')
                         ->with('success', 'Jenis user berhasil dihapus.');
    }
}
