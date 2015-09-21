<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;
use App\Bidang;
use App\EntryRKO;
use App\Kegiatan;

class GrafikPerbidangController extends Controller{
    public function getIndex(){
        $data['page_title'] = "Laporan Daftar Kegiatan";

        $data['rko']        = EntryRKO::all();
        $data['kegiatan']   = Kegiatan::all();
        $data['bidang']     = Bidang::all();
        
        if(Session::get("role","default")=="master")
            return redirect('/');
        else
            return view('/laporan/grafikperbidang')->with($data);
        
    }
}