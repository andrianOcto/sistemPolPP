<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use App\JenisBelanja;
use App\Bidang;
use App\ObjekBelanja;
use App\Kegiatan;
use App\EntryRKO;
use DB;

class KegiatanController extends Controller {

  public function getIndex() {

  	$data['page_title']     = "Master Setting Kegiatan";
    $data['kegiatan']   = DB::table('s_kegiatan')
                                  ->join('s_bidang', 's_kegiatan.id_bidang', '=', 's_bidang.id')
                                  ->select('s_kegiatan.id', 's_bidang.nama','s_kegiatan.id_bidang', 's_kegiatan.description', 's_kegiatan.anggaran', 's_kegiatan.sasaran')
                                  ->get();
    $data['bidang']       = Bidang::all();

    //digunakan untuk membatasi master agar tidak masuk ke dalam fitur
    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/master/kegiatan')->with($data);
    
  }

public function postAdd(Request $request)
  {
    try
    {
      $kegiatan               = new Kegiatan;
      $kegiatan->id           = $request->input("kodeProgram").".".$request->input("kodeKegiatan");
      $kegiatan->id_bidang    = $request->input("kodeBidang");
      $kegiatan->id_program   = $request->input("kodeProgram");
      $kegiatan->description  = $request->input("namaKegiatan");
      $kegiatan->nama_bidang  = $request->input("shortNameBidang");
      $kegiatan->nama_lengkap_bidang  = $request->input("completeNameBidang");
      $kegiatan->tahun        = date('Y');

      $entryRKO               = new EntryRKO;
      $entryRKO->id_kegiatan  = $request->input("kodeProgram").".".$request->input("kodeKegiatan");
      $entryRKO->tahun        = date('Y');

      $entryRKO->save();
      $kegiatan->save();
      return redirect("/program")->with('successMessage', 'Data berhasil ditambahkan!');
    }

    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/program")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postUpdate(Request $request,$id)
  {
    $kode                     = $request->input("kodeKegiatan");
    $kegiatan                 = Kegiatan::find($kode);
    
    $kegiatan->id_bidang      = $request->input("kodeBidang".$id);
    $kegiatan->description    = $request->input("namaKegiatan");
    $kegiatan->anggaran       = $request->input("anggaran");
    $kegiatan->sasaran        = $request->input("sasaran");

    $kegiatan->save();
    return redirect("/kegiatan")->with('successMessage', 'Data berhasil diupdate!');
  }

  public function postDelete(Request $request,$id)
  {
    Kegiatan::destroy($id);
    return redirect("/kegiatan")->with('successMessage', 'Data berhasil dihapus!');
  }

}
