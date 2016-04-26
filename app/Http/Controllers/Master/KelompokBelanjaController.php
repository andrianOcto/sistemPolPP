<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//Lib yang digunakan
use Session;
//Model yang digunakan
use App\KelompokBelanja;

class KelompokBelanjaController extends Controller {

  public function getIndex() {

  	$data['page_title']    = "Master Setting KelompokBelanja";
    $data['kelompokbelanja']        = KelompokBelanja::all()->where("tahun",date('Y'));

    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/master/kelompokbelanja')->with($data);

  }

  public function postKelompok(Request $request)
  {
    try
    {
      $kelompokbelanja               = new KelompokBelanja;
      $kelompokbelanja->id           = $request->input("kode");
      $kelompokbelanja->description  = $request->input("nama");
      $kelompokbelanja->save();
      return redirect("/kelompokBelanja")->with('successMessage', 'Data berhasil ditambahkan!');;
    }

    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/kelompokBelanja")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postUpdate(Request $request)
  {
    $kelompokbelanja               = KelompokBelanja::find($request->input("kode"));
    $kelompokbelanja->description  = $request->input("nama");
    $kelompokbelanja->save();
    return redirect("/kelompokBelanja")->with('successMessage', 'Data berhasil diupdate!');;;
  }

  public function postDelete(Request $request,$id)
  {
    KelompokBelanja::destroy($id);
    return redirect("/kelompokBelanja");
  }

}
