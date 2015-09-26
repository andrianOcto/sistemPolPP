<?php namespace App\Http\Controllers\Entry;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//Lib yang digunakan
use Session;
//Model yang digunakan
use App\JenisBelanja;
use App\KelompokBelanja;
use App\Bidang;
use App\Program;
use App\Kegiatan;
use App\EntryRKO;
use App\Rencana;
use App\RincianBelanja;
use DB;

class EntrySPJController extends Controller {

  public function getIndex() {

    $data['page_title']     = "Master Setting Kegiatan";
    $data['kegiatan']       = DB::table('s_kegiatan')
                                  ->join('s_bidang', 's_kegiatan.id_bidang', '=', 's_bidang.id')
                                  ->select('s_kegiatan.id', 's_bidang.nama','s_kegiatan.id_bidang', 's_kegiatan.description', 's_kegiatan.anggaran', 's_kegiatan.sasaran')
                                  ->get();
    $data['bidang']         = Bidang::all();

    //digunakan untuk membatasi master agar tidak masuk ke dalam fitur
    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/entry/EntrySPJ')->with($data);
    
  }

  public function getDetailSPJ(Request $request,$id){
    $data['page_title']       = "Entry Realisasi SJP";
    $data['rincian_belanja']  = RincianBelanja::all();
    $data['rencana']          = Rencana::where("id_kegiatan",$id)->where("tahun",date('Y'))->get();
    $data['detailKegiatan']   = Kegiatan::find($id);

    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/entry/EntryRealisasi')->with($data);
  }
}
