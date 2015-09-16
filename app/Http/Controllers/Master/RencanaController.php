<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use App\Rencana;
use App\Bidang;


class RencanaController extends Controller {

  public function getIndex($id) {
setlocale(LC_MONETARY, 'id_ID'); 
  	$data['page_title']    = "Master Setting Bidang";
    $data['bidang']        = Rencana::where("id_kegiatan",$id)->where("tahun",date('Y'))->get();
    $data['id_kegiatan']   = $id;

    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/master/rencanaRealisasi')->with($data);
    
  }

  public function postRencana(Request $request)
  {
    try
    {
      $rencana               = new Rencana;
      $rencana->id_kegiatan  = $request->input("id_kegiatan");
      $rencana->tahun        = date('Y');
      $rencana->description  = $request->input("description");
      $rencana->jumlah       = $request->input("jumlah");
      $rencana->harga        = $request->input("harga");
      $rencana->save();

      return redirect("/rencana/".$request->input("id_kegiatan"))->with('successMessage', 'Data berhasil ditambahkan!');
    }
    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/rencana/".$request->input("id_kegiatan"))->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada'.$e->getMessage());
    }
  }

  public function postUpdate(Request $request)
  {
    $bidang               = Bidang::find($request->input("kode"));
    $bidang->nama         = $request->input("nama");
    $bidang->nama_lengkap = $request->input("lengkap");
    $bidang->save();
    return redirect("/bidang");
  }

  public function postDelete(Request $request,$id)
  {
    Bidang::destroy($id);
    return redirect("/bidang");
  }

}
