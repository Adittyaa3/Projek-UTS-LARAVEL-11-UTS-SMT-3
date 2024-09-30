<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' =>'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ID_jenis_user' => 1,
           
        ]);

        // Login pengguna setelah registrasi
        Auth::login($user);

        // Redirect ke dashboard setelah registrasi dan login
        return redirect()->route('login.form')->with('success', 'Registration successful. You are now logged in!');
    }

    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     if (Auth::attempt($request)){

    //         if(Auth::user()->ID_jenis_user == 1){
    //             return redirect('/dashboard-admin');
    //         }

    //         if(Auth::user()->ID_jenis_user == 2){
    //             return redirect('/dashboard');
    //         }

    //         return redirect('/dashboard-it');

    //     }
    // }
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Cobalah untuk melakukan autentikasi pengguna
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

        // Cek jenis pengguna
        if (Auth::user()->ID_jenis_user == 2) {
            return redirect('/showanime');
        }

        if (Auth::user()->ID_jenis_user == 3) {
            return redirect('/showindex');
        }

        return redirect('list-anime-ajax');

    } else {
        // Jika autentikasi gagal, redirect kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}


    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You are logged out!');
    }
    public function admindashboard(){
        $user = Auth::user();
        $menus=Menus::all();
        return view('Admin.menu.dashboardAdmin',compact('menus'));
    }
    public function userdashboard(){
        $user = Auth::user();
        return view('User.dashboard');
    }
    
}
