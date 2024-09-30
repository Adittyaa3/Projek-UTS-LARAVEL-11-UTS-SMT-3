<?php

namespace App\Http\Controllers;
use App\Models\anime;
use App\Models\menus;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class Animes extends Controller
{
    public function index() : View
    {
        //get all products
        $anime = anime::latest()->paginate(10);
        $menus = Menus::all();

        //render view with products
        return view('Admin.menu-anime.index', compact('anime','menus'));
    }

    public function create(): View{
        $menus = Menus::with('menuLevel')->get();
        return view('Admin.menu-anime.create' ,compact('menus'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required',
            'number_of_episodes' => 'required|numeric',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        //create product
        anime::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'description'   => $request->description,
            'number_of_episodes'=> $request->number_of_episodes,
        ]);

        //redirect to index
        return redirect()->route('anime.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get product by ID
        $anime = anime::findOrFail($id);
        $menus = Menus::all();

        //render view with product
        return view('Admin.menu-anime.show', compact('anime','menus'));
    }

    public function edit(string $id): View
    {
        //get product by ID
        $anime = anime::findOrFail($id);

        //render view with product
        return view('Admin.menu-anime.update', compact('anime'));
    }

    public function update(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required',
            'number_of_episodes' => 'required|numeric',
        ]);

        //get product by ID
        $anime = anime::findOrFail($request->id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            //delete old image
            Storage::delete('public/products/'.$anime->image);

            //update product with new image
            $anime->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'number_of_episodes'   => $request->number_of_episodes,
      
            ]);

        } else {

            //update product without image
            $anime->update([
                'title'         => $request->title,
                'number_of_episodes'   => $request->number_of_episodes,
              
            ]);
        }

        //redirect to index
        return redirect()->route('anime.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $anime = anime::findOrFail($id);

        //delete image
        Storage::delete('public/products/'. $anime->image);

        //delete product
        $anime->delete();

        //redirect to index
        return redirect()->route('anime.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }



    public function rekomendasi()
    {
        $anime = anime::all();
        $menus = Menus::all();
        return view('RekomendasiAnime', compact('anime','menus'));
    }
    public function animeeajax()
    {
        $anime = anime::all();
        $menus = Menus::all();
        return view('User.animeAPI', compact('anime','menus'));
    }

}

