<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use App\Models\User;
use App\Models\menus;
use App\Models\MenuLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class SuperAdmin extends Controller
{
    public function index()
    {
        $user = User::all(); 
        $jenis_users = JenisUser::all();
        $menus = Menus::all();
    
        return view('Super-Admin.index', compact('user','jenis_users','menus'));
    }
    

    public function create(){
        $user=user::all();
        $jenis_users = JenisUser::all(); // Mengambil data dari jenis_users
        $menus = Menus::all();

        
        return view('Super-Admin.create',compact('user','jenis_users','menus'));
    }

    public function store(Request $request ){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'ID_jenis_user' =>'required|exists:jenis_users,id'
        ]);

        $User = user::create([
            'name'  =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'ID_jenis_user' => $request->ID_jenis_user
        ]);
    


        return redirect()->route('user.index');

    }

    public function show($id){
        $user=user::find($id);
        return view('Super-Admin.show',compact('user'));
    }

    public function edit(string $id){  
        $user=user::find($id);  
        $menus = Menus::all();

        $jenis_users = JenisUser::all(); // Ambil semua jenis user untuk dropdown
        return view('Super-Admin.update', compact('user', 'jenis_users','menus'));
    }

    // public function update( Request $request ,user $user , $id){
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'password' => 'required|min:8'
            
    //     ]);

    //     $user =[
    //         'name'  =>$request->name,
    //         'email' =>$request->email,
    //         'password' =>Hash::make($request->password)
    //     ];
        
        
    //     $user =user::findOrFail($id) ;
    //     $user::update($user);
        
    //     return redirect('Super-Admin.show');

    
    //  }
    public function update(Request $request, $id) {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'password' => 'nullable|min:8', // Password bersifat opsional
    //         'role' => 'required|string' // Pastikan role valid
    //     ]);
    
    //     // Temukan user berdasarkan ID
    //     $user = user::findOrFail($id);
    
    //     // Update data user
    //     $user->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $request->password ? Hash::make($request->password) : $user->password // Hanya hash password jika ada perubahan
    //     ]);
    
    //     // Update role jika ada
    //     if ($request->has('ID_jenis_user')) {
    //         $user->syncRoles($request->role); // Mengganti role
    //     }
    
    //     // Redirect ke route yang sesuai
    //     return redirect()->route('user.index'); // Ganti dengan route yang sesuai
    //

    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'nullable|min:8',
        'ID_jenis_user' => 'required|exists:jenis_users,id', // Validasi ID jenis user
    ]);
    
    // Temukan user berdasarkan ID
    $user = User::findOrFail($id);
    
    // Update data user
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password ? Hash::make($request->password) : $user->password,
        'ID_jenis_user' => $request->ID_jenis_user, // Update ID jenis user
    ]);
    
    // Redirect ke route yang sesuai
    return redirect()->route('user.index'); // Ganti dengan route yang sesuai
    
     }

    
    
    


    
     public function destroy($id){
        $user=user::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
     }



}
