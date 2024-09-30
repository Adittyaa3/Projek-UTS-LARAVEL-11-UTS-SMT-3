<?php

namespace App\Http\Controllers;

use App\Models\JenisUserModel;
use App\Models\MenuModel;
use App\Models\User;
use App\Models\Menus;
use App\Models\JenisUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuUserController extends Controller
{
    // public function index()
    // {

    //     $Menus = Menus::with('Menus', 'jenisUser')->get();

    //     $groupedMenus = $Menus->groupBy('jenisUser.jenis_user');
    //     $menus = menus::all();
    //     $jenis_users = JenisUser::all();

    //     return view('menu-sidebar.index', compact('groupedMenus','menus','jenis_users'));
    // }



    // public function store(Request $request)
    // {

    //     $data = [
    //         'jenisUser_id' => $request->jenis_users,
    //         'menu_id' => $request->id,
    //     ];

    //     Menus::create($data);

    //     return redirect()->back()->with('success', 'Berhasil Ditambahkan');

    // }
    // public function update(Request $request, $id)
    // {
    //     $menu = Menus::find($id);
    //     $menu->menu_name = $request->menu_name;
    //     $menu->menu_link = $request->menu_link;
    //     $menu->menu_icon = $request->menu_icon;
    //     $menu->save();

    //     return response()->json(['status' => 'success']);
    // }

    // public function delete($id)
    // {
    //     $data = Menus::find($id);
    //     $data->delete();

    //     return redirect()->back('success');
    // }
}
