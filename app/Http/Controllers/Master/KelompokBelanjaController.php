<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use App\KelompokBelanja;

class KelompokBelanjaController extends Controller {

  public function getIndex() {

  	$data['page_title']    = "Master Setting KelompokBelanja";
    $data['kelompokbelanja']        = KelompokBelanja::all();

    if(Session::get("role","default")=="master")
                return view('/master/kelompokbelanja')->with($data);
            else
                return redirect('/');
    
  }

  public function postKelompok(Request $request)
  {
    $kelompokbelanja               = new KelompokBelanja;
    $kelompokbelanja->id           = $request->input("kode");
    $kelompokbelanja->description  = $request->input("nama");
    $kelompokbelanja->save();
    return redirect("/kelompokBelanja");
  }

  public function postUpdate(Request $request)
  {
    $kelompokbelanja               = KelompokBelanja::find($request->input("kode"));
    $kelompokbelanja->description  = $request->input("nama");
    $kelompokbelanja->save();
    return redirect("/kelompokBelanja");
  }

  public function postDelete(Request $request,$id)
  {
    KelompokBelanja::destroy($id);
    return redirect("/kelompokBelanja");
  }

}
