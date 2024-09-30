<?php

namespace App\Http\Controllers;

use App\Models\SettingMenuUser;
use App\Models\Menus;
use App\Models\JenisUser; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingMenu extends Controller
{
    public function index()
    {
        $menus = Menus::where('delete_mark', '0')->get();
        $jenisUsers = JenisUser::where('delete_mark', '0')->get();
        return view('menu-sidebar.setting', compact('menus', 'jenisUsers'));
    }

    public function access(Request $request)
    {
        
        $role = $request->post('role');
        $items = $request->post('items');
        

        $role = JenisUser::findOrFail($role);
        DB::table('setting_menu_user')->where('id_jenis_user', $role->id_jenis_user)->delete();
        
        
        foreach ($items as $item) {
            SettingMenuUser::create([
                'ID_jenis_user' => $role->id, // Pastikan konsistensi
                'ID_menu' => $item, // Sesuaikan dengan model dan database
                'create_by' => $role->jenis_user // Sesuaikan dengan field yang ada
            ]);
        }
        

        return response()->json(['success' => true]);
    }

    public function create()
    {
        $menus = Menus::where('delete_mark', '0')->get();
        $jenisUsers = JenisUser::where('delete_mark', '0')->get(); // Ambil data jenis pengguna
        return view('roleMenuSetting.create', compact('menus', 'jenisUsers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jenis_user' => 'required|exists:jenis_user,id_jenis_user',
            'menu_ids' => 'required|array', // Ganti menu_id dengan menu_ids
            'menu_ids.*' => 'exists:menu,menu_id', // Validasi untuk setiap menu_id
            'create_by' => 'required|string|max:30',
        ]);

        foreach ($request->menu_ids as $menuId) {
            SettingMenuUser::create([
                'id_jenis_user' => $request->id_jenis_user,
                'menu_id' => $menuId,
                'delete_mark' => '0',
                'create_date' => now(),
                'update_date' => now(),
                'create_by' => $request->create_by,
            ]);
        }

        return redirect()->route('roleMenuSetting.index')->with('success', 'Pengaturan menu pengguna berhasil ditambahkan.');
    }

    public function edit(SettingMenuUser $setting)
    {
        $menus = Menus::where('delete_mark', '0')->get();
        $jenisUsers = JenisUser::where('delete_mark', '0')->get();
        return view('roleMenuSetting.edit', compact('setting', 'menus', 'jenisUsers'));
    }

        public function update(Request $request, SettingMenuUser $setting)
    {
        $request->validate([
            'id_jenis_user' => 'required|exists:jenis_user,id_jenis_user',
            'menu_ids' => 'required|array', // Ganti menu_id dengan menu_ids
            'menu_ids.*' => 'exists:menu,menu_id', // Validasi untuk setiap menu_id
            'update_by' => 'required|string|max:30',
        ]);

        // Hapus pengaturan menu yang ada untuk jenis user ini
        SettingMenuUser::where('id_jenis_user', $request->id_jenis_user)->delete();

        foreach ($request->menu_ids as $menuId) {
            SettingMenuUser::create([
                'id_jenis_user' => $request->id_jenis_user,
                'menu_id' => $menuId,
                'delete_mark' => '0',
                'update_date' => now(),
                'update_by' => $request->update_by,
            ]);
        }

        return redirect()->route('roleMenuSetting.index')->with('success', 'Pengaturan menu pengguna berhasil diperbarui.');
    }

    public function destroy(SettingMenuUser $setting)
    {
        $setting->update(['delete_mark' => '1']); // Soft delete
        return redirect()->route('roleMenuSetting.index')->with('success', 'Pengaturan menu pengguna berhasil dihapus.');
    }
}