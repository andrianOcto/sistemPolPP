<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;
use App\Kegiatan;
use App\Bidang;

class DaftarKegiatanController extends Controller {
    
    public function getIndex(){
    
    $data['page_title'] = "Laporan Daftar Kegiatan";
    $data['kegiatan']   = DB::table('s_kegiatan')
                                  ->join('s_bidang', 's_kegiatan.id_bidang', '=', 's_bidang.id')
                                  ->select('s_kegiatan.id', 's_bidang.nama','s_kegiatan.id_bidang', 's_kegiatan.description', 's_kegiatan.anggaran', 's_kegiatan.sasaran')
                                  ->get();
    $data['bidang']       = Bidang::all();
    
    if(Session::get("role","default")=="master")
        return redirect('/');
    else
        return view('/laporan/daftarkegiatan')->with($data);
        
    }
}
