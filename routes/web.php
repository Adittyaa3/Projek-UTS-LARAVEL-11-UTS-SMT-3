<?php

use App\Http\Controllers\Animes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SuperAdmin;
use App\Http\Middleware\isUser;
use App\Http\Middleware\isAdmin;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingMenuUserController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\MenuUserController;
use App\Http\Controllers\SettingMenu;

use App\Http\Controllers\MessageController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/showregister', function () {
    return view('auth.register');
});
// show view 
Route::get('/registerform', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/loginform', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Apply the 'auth' middleware to a group of routes
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboardadmin', function () {
        return view('Admin.dashboardAdmin');
    })->name('dashboardadmin');

    Route::get('/dashboarduser', function () {
        return view('User.dashboard');
    })->name('dashboarduser');



    Route::get('/inbox', [MessageController::class, 'inbox'])->name('inbox');
    Route::get('/message/{id}', [MessageController::class, 'readMessage'])->name('readMessage');
    Route::post('/message/send', [MessageController::class, 'sendEmail'])->name('sendEmail');
    Route::post('/message/reply/{id}', [MessageController::class, 'replyMessage'])->name('replyMessage');
    
    // Route untuk menulis email baru
    Route::get('/compose', function () {
        return view('compose');
    })->name('composeEmail');
    

    // // post feed
    // Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    // Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    // // Route::post('/posts/like{id}', [PostController::class, 'like'])->name('posts.like');
    // Route::post('/posts/like/{id}', [PostController::class, 'like'])->name('posts.like');

    // Route::post('/posts/{id}/comment', [PostController::class, 'comment'])->name('posts.comment');
    // Route::get('/posts/{id}/edit', [PostController::class, 'editPost'])->name('posts.edit');
    // Route::put('/posts/{id}', [PostController::class, 'updatePost'])->name('posts.update');
    // Route::delete('/posts/{id}', [PostController::class, 'deletePost'])->name('posts.delete');
    // Route::get('/user/posts', [PostController::class, 'userPosts'])->name('user.posts');

    
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    
    Route::post('/posts/{post}/like', [LikeController::class, 'like'])->name('posts.like');
    Route::post('/posts/{post}/unlike', [LikeController::class, 'unlike'])->name('posts.unlike');
    // Add these routes for managing CRUD operations
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Route untuk menampilkan, edit, dan delete post milik user
Route::get('/user/posts', [PostController::class, 'userPosts'])->name('user.posts');
// Route::get('/posts/{id}/edit', [PostController::class, 'editPost'])->name('posts.edit');
// Route::put('/posts/{id}', [PostController::class, 'updatePost'])->name('posts.update');
// Route::delete('/posts/{id}', [PostController::class, 'deletePost'])->name('posts.delete');


    
Route::get('/Viewmanipulation_dom', function () {
    return view('contentSubmenu.manipulation_dom');
});
Route::get('/Vieweffects', function () {
    return view('contentSubmenu.effects');
});
Route::get('/Viewajax', function () {
    return view('contentSubmenu.ajax');
});
Route::get('/ViewAjaxGempa', function () {
    return view('contentSubmenu.AjaxGempa');
});
Route::get('/ViewGempamapas', function () {
    return view('contentSubmenu.GempaMaps');
});
    

// // Route to display the form for adding a new mhs
//  Route::get('buatmhs', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
// // Route to display the list of mhs
// Route::get('showmhs', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
// // Route to display mhs details
// Route::get('show/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
// // Route to display the form f  or editing a mhs
// Route::get('edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
// // Route to save a new mhs
// Route::post('/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
// // Route to update an existing mhs
// Route::post('update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
// // Route to delete a mhs
// Route::get('/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');


Route::get('/sosialfeedpage', function () {
    return view('template-feed.main');
});
});



// anime
Route::middleware(AdminMiddleware ::class)->group(function () {
    Route::get('showanime', [Animes::class, 'index'])->name('anime.index');
    Route::get('createanime', [Animes::class, 'create'])->name('anime.create');
    Route::post('/storeanime', [Animes::class, 'store'])->name('anime.store');
    // Route::get('/showanime{id}', [Animes::class, 'show'])->name('anime.show');
    Route::get('/showedit{id}', [Animes::class, 'edit'])->name('anime.edit');
    Route::post('/update', [Animes::class, 'update'])->name('anime.update');
    Route::delete('anime/{id}', [Animes::class, 'destroy'])->name('anime.destroy');


    // Route untuk menampilkan daftar video
Route::get('videos', [VideoController::class, 'index'])->name('videos.index');

// Route untuk menampilkan form upload video baru
Route::get('videos/create', [VideoController::class, 'create'])->name('videos.create');

// Route untuk menyimpan video baru
Route::post('videos', [VideoController::class, 'store'])->name('videos.store');

// Route untuk menampilkan form edit video
Route::get('videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');

// Route untuk update video yang sudah ada
Route::put('videos/{id}', [VideoController::class, 'update'])->name('videos.update');

// Route untuk menghapus video
Route::delete('videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');


Route::get('AksesMenu', [MenuUserController::class, 'index'])->name('aksesMenu.index');
Route::post('AksesMenu/store', [MenuUserController::class, 'store'])->name('aksesMenu.store');
Route::post('AksesMenu/update/{id}', [MenuUserController::class, 'update'])->name('aksesMenu.update');
Route::post('AksesMenu/delete/{id}', [MenuUserController::class, 'delete'])->name('aksesMenu.delete');

Route::post('/sidebarplus', [MenuUserController::class, 'indexside'])->name('sidebar.index')->name('menu.untuksidebar');

});


// Route::get('/list-anime', [Animes::class, 'rekomendasi'])->middleware('auth','role','role_or_permission')->name('anime.rekomendasi');
Route::get('/list-anime', [Animes::class, 'rekomendasi'])->name('anime.rekomendasi');
Route::get('/list-anime-ajax', [Animes::class, 'animeeajax'])->name('anime.ajax');
Route::get('/showanime{id}', [Animes::class, 'show'])->name('anime.show');


// create user
Route::middleware(SuperAdminMiddleware::class)->group(function () {
    Route::get('showindex', [SuperAdmin::class, 'index'])->name('user.index');
    Route::get('createuser', [SuperAdmin::class, 'create'])->name('user.create');
    Route::post('/storeuser', [SuperAdmin::class, 'store'])->name('user.store');
    // Route::get('/showanime{id}', [Animes::class, 'show'])->name('anime.show');
    Route::get('/showedituser/{id}', [SuperAdmin::class, 'edit'])->name('user.edit');

    // Route::post('/updateuser', [SuperAdmin::class, 'update'])->name('user.update');
    Route::get('deleteuser/{id}', [SuperAdmin::class, 'destroy'])->name('user.destroy');
    Route::put('/updateuser/{id}', [SuperAdmin::class, 'update'])->name('user.update');


        // Rute untuk menampilkan daftar menu
    Route::get('/menus/show', [MenuController::class, 'index'])->name('menus.index');

// Rute untuk menampilkan form tambah menu baru
    Route::get('/menus/created', [MenuController::class, 'create'])->name('menus.create');

// Rute untuk menyimpan menu baru ke database
    Route::post('/menus/store/create', [MenuController::class, 'store'])->name('menus.store');

// Rute untuk menampilkan form edit menu
    Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');

// Rute untuk mengupdate data menu yang sudah ada
    Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');

// Rute untuk menghapus data menu
    Route::delete('/listmenus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');
    Route::resource('jenis_users', JenisUserController::class);

    Route::get('/access', [SettingMenu::class, 'index'])->name('access.index');
    Route::post('/select-sessions', [SettingMenu::class, 'access']);


    // Route::get('/sidebar', [MenuUserController::class, 'indexside'])->name('sidebar.index')->middleware('auth');
    // Route::resource('menus', MenuUserController::class)->middleware('auth');
    // Route::post('aksesMenu/store', [MenuUserController::class, 'store'])->name('aksesMenu.store')->middleware('auth');



// Menampilkan daftar semua menu level
    // Route::get('menu_levels', [MenuLevelController::class, 'index'])->name('menu_levels.index');

    // // Menampilkan form untuk membuat menu level baru
    // Route::get('menu_levels/create', [MenuLevelController::class, 'create'])->name('menu_levels.create');

    // // Menyimpan data menu level baru
    // Route::post('menu_levels', [MenuLevelController::class, 'store'])->name('menu_levels.store');

    // // Menampilkan detail dari menu level tertentu
    // Route::get('menu_levels/{id}', [MenuLevelController::class, 'show'])->name('menu_levels.show');

    // // Menampilkan form untuk mengedit menu level
    // Route::get('menu_levels/{id}/edit', [MenuLevelController::class, 'edit'])->name('menu_levels.edit');

    // // Mengupdate data menu level tertentu
    // Route::put('menu_levels/{id}', [MenuLevelController::class, 'update'])->name('menu_levels.update');

    // // Menghapus menu level tertentu
    // Route::delete('menu_levels/{id}', [MenuLevelController::class, 'destroy'])->name('menu_levels.destroy');


    });



Route::get('/animeCAAPI', function () {
    return view('   ');
});

Route::get('/animeAPI2', function () {
    return view('User.animeAPI2');
});




// Route::get('jenis_users', [JenisUserController::class, 'index'])->name('jenis_users.index'); // Menampilkan daftar jenis user
// Route::get('jenis_users/create', [JenisUserController::class, 'create'])->name('jenis_users.create'); // Form untuk membuat jenis user baru
// Route::post('jenis_users', [JenisUserController::class, 'store'])->name('jenis_users.store'); // Menyimpan data jenis user baru
// Route::get('jenis_users/{id}/edit', [JenisUserController::class, 'edit'])->name('jenis_users.edit'); // Form untuk mengedit jenis user
// Route::put('jenis_users/{id}', [JenisUserController::class, 'update'])->name('jenis_users.update'); // Memperbarui data jenis user
// Route::delete('jenis_users/{id}', [JenisUserController::class, 'destroy'])->name('jenis_users.destroy'); // Menghapus jenis user



