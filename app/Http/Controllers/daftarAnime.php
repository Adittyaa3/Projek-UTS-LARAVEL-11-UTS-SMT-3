<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class daftarAnime extends Controller
{
    public function index(){
         $hasil = DB::table('anime')->get()->toArray();
         echo json_encode($hasil);
    }

}
