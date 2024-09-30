<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\mahasiswa;
use Illuminate\Contracts\Support\ValidatedData;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = mahasiswa::all();
        return view('Admin.menu.index',compact('mahasiswa'));
    }

    public function create(){
        $mahasiswa =mahasiswa::all();
        return view('Admin.menu.create',compact('mahasiswa'));
    }
    
    public function store(request $request){

        $ValidatedData=$request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'angkatan' => 'required|string',
            'nomor_hp' => 'required|string'
        ]);
        mahasiswa::create($ValidatedData);

        return redirect('buatmhs');
    }

    public function show($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('Admin.create', compact('mahasiswa'));
    }
    public function edit($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        return view('Admin.menu.update', compact('mahasiswa'));
    }

    public function update(Request $request,  mahasiswa $mahasiswa ,$id)
    {
        $ValidatedData=$request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'angkatan' => 'required|string',
             'nomor_hp' => 'required|string',
        ]);

        $mahasiswa = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'nomor_hp' => $request->nomor_hp
        ];
        // $mahasiswa = mahasiswa::find($id);
        // $mahasiswa->update($ValidatedData);
        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->update($mahasiswa);
        return redirect('buatmhs');
    //     return redirect()->route('mahasiswa.index')->with('success', 'Buku berhasil diupdate.');
    }
    public function destroy($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Buku berhasil dihapus.');
    }

}
