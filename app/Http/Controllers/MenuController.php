<?php

namespace App\Http\Controllers;

use App\Models\Menus; // Pastikan model Menu digunakan
// use App\Models\MenuLevel; // Pastikan model MenuLevel digunakan
use App\Models\JenisUser;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function indexside()
    {
        // Ambil data menu dari database
        // $menus = Menus::with('menuLevel')->get();
        $menus = Menus::all();
        // $menuLevels = MenuLevel::all();
        $jenis_users = JenisUser::all(); // Ambil data jenis user

        return view('Admin.sidebar', compact('menus','jenis_users'));
    }
    // Method untuk menampilkan daftar semua menu
    public function index()
    {
        // Mengambil semua data menu beserta data levelnya (relasi ke tabel menu_levels)
        // $menus = Menus::with('menuLevel')->get();
        // $jenis_users  = Menus::with('menuLevel')->get();
        $jenis_users = JenisUser::all();
        $menus = Menus::all();
        return view('menu-sidebar.index', compact('menus','jenis_users'));
    }

    // Method untuk menampilkan form tambah menu baru
    public function create()
    {
        // // Mengambil semua data level dari tabel menu_levels
        // $menuLevels = MenuLevel::all();
        // $menus = Menus::with('menuLevel')->get();
        $menus = Menus::all();
        return view('menu-sidebar.create', compact('menus'));
    }

    // Method untuk menyimpan data menu baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_link' => 'required|string|max:255',
            'menu_icon' => 'required|string|max:255',
            // 'ID_level' => 'nullable|exists:menu_levels,ID_level', // Memastikan level ID valid
        ]);

        // Menyimpan data yang sudah tervalidasi ke database
        Menus::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit menu
    public function edit(string $id)
    {
        // Mengambil semua data level untuk digunakan dalam pilihan dropdown
        // $menuLevels = MenuLevel::all();
        $menus = Menus::findOrFail($id);
        return view('menu-sidebar.edit',compact('menus') );
    }

    // Method untuk mengupdate data menu yang sudah ada
    public function update(Request $request, Menus $menu)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_link' => 'required|string|max:255',
            'menu_icon' => 'required|string|max:255',
            // 'ID_level' => 'nullable|exists:menu_levels,ID_level', // Memastikan level ID valid
        ]);

        // Mengupdate data menu di database
        $menu->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('menus.index')->with('success', 'Menu berhasil diupdate');
    }

    // Method untuk menghapus data menu dari database
    public function destroy(Menus $menu )
    {
        // Menghapus menu yang dipilih
        $menu->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus');
    }
}
