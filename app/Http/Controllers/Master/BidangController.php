<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use App\Bidang;

class BidangController extends Controller {

  public function getIndex() {

  	$data['page_title']    = "Master Setting Bidang";
    $data['bidang']        = Bidang::all();

    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/master/bidang')->with($data);
    
  }

  public function postBidang(Request $request)
  {
    $bidang               = new Bidang;
    $bidang->id           = $request->input("kode");
    $bidang->nama         = $request->input("nama");
    $bidang->nama_lengkap = $request->input("lengkap");
    $bidang->save();
    return redirect("/bidang");
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
