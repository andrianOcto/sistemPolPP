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
use App\EntryRKO;
use Maatwebsite\Excel\Facades\Excel;

class RealisasiKeseluruhanPerbidangController extends Controller{
    public function getIndex(){
        $data['page_title'] = "Realisasi Keseluruhan";
        $data['rko']        = DB::table('m_detail_rko')
                                -> join ('s_kegiatan', 'm_detail_rko.id_kegiatan', '=', 's_kegiatan.id')
                                -> select('m_detail_rko.id_kegiatan', 's_kegiatan.description', 'm_detail_rko.jan', 'm_detail_rko.feb', 'm_detail_rko.mar', 'm_detail_rko.apr', 'm_detail_rko.mei', 'm_detail_rko.jun', 'm_detail_rko.jul', 'm_detail_rko.agu', 'm_detail_rko.sep', 'm_detail_rko.okt', 'm_detail_rko.nov', 'm_detail_rko.des')
                                -> get();
        $data['bidang']     = Bidang::all();
        
        if(Session::get("role","default")=="master")
            return redirect('/');
        else
            return view('/laporan/realisasiseluruhperbidang')->with($data);
    }
}