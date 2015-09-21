<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;
use App\EntryRKO;

class GrafikKeseluruhanController extends Controller{
    public function getIndex(){
        $data['page_title'] = "Laporan Daftar Kegiatan";
    
        $data['rko'] = EntryRKO::all();
        
        if(Session::get("role","default")=="master")
        return redirect('/');
    else
        return view('/laporan/grafikkeseluruhan')->with($data);
        
    }
    
    public function perTahun(Request $request){
        $tahun = new EntryRKO;
        $tahun->tahun = $request->input("pertahun");
        $tahun->save();
        return redirect("/grafikrealisasikeseluruhan");
    }
}