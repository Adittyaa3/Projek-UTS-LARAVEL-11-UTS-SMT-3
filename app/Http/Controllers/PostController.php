<?php 
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // View all posts and form to create a new post
    public function index()
    {
        $posts = Post::with(['user', 'comments', 'likes'])->orderBy('created_at', 'desc')->get();
        return view('POST.index', compact('posts'));
    }
    public function edit(Post $post)
    {
        // Ensure the logged-in user can only edit their own post
        if ($post->user_id != Auth::id()) {
            return redirect()->route('posts.index');
        }

        return view('POST.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Ensure the logged-in user can only update their own post
        if ($post->user_id != Auth::id()) {
            return redirect()->route('posts.index');
        }

        $request->validate([
            'tweet' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            $post->image = $image->hashName();
        }

        $post->tweet = $request->tweet;
        $post->save();

        return redirect()->route('posts.index');
    }

    // Store new post
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'tweet' => 'required',
    //         'image' => 'nullable|image|max:2048',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $image->storeAs('public/products', $image->hashName());
    //     }

    //     Post::create([
    //         'user_id' => Auth::id(),
    //         'tweet' => $request->tweet,
    //         'image' => $image->hashName(),
    //     ]);
        

    //     return redirect()->back();
    // }
    public function store(Request $request)
{
    // Validasi input, gambar opsional
    $request->validate([
        'tweet' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    // Inisialisasi variabel untuk menyimpan nama file gambar (jika ada)
    $imageName = null;

    // Periksa apakah ada file yang diunggah
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->hashName(); // Dapatkan nama file yang aman
        $image->storeAs('public/products', $imageName); // Simpan file di storage
    }

    // Simpan data post, gambar bersifat opsional
    Post::create([
        'user_id' => Auth::id(),
        'tweet' => $request->tweet,
        'image' => $imageName, // Nilai ini akan null jika tidak ada gambar yang diunggah
    ]);

    return redirect()->back();
}

    

    // Delete post
    public function destroy(Post $post)
    {
        if ($post->user_id == Auth::id()) {
            $post->delete();
        }

        return redirect()->back();
    }

    public function userPosts()
{
    // Mengambil semua post milik user yang sedang login
    $posts = Post::where('user_id', Auth::id())->with(['likes', 'comments'])->latest()->get();
    
    return view('POST.manage', compact('posts'));
}

public function editPost($id)    
{
    // Mengambil post yang akan diedit hanya jika post dimiliki oleh user yang sedang login
    $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    
    return view('POST.edit', compact('post'));
}

public function updatePost(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'message_text' => 'required',
        'message_image' => 'image|nullable'
    ]);

    // Hanya update post milik user yang sedang login
    $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $post->message_text = $request->message_text;

    if ($request->hasFile('message_image')) {
        $post->message_image = $request->file('message_image')->store('posts_images', 'public');
    }

    $post->save();

    return redirect()->route('user.posts')->with('success', 'Post berhasil diperbarui.');
}

public function deletePost($id)
{
    // Menghapus post milik user yang sedang login
    $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $post->delete();

    return redirect()->route('user.posts')->with('success', 'Post berhasil dihapus.');
}


    
}
