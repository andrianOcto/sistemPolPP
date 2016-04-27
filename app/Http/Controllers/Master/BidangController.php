<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//Lib yang digunakan
use Session;
//Model yang digunakan
use App\Bidang;
use App\Role;

class BidangController extends Controller {

  public function getIndex() {

  	$data['page_title']    = "Master Setting Bidang";
    $data['bidang']        = Bidang::all();

    if(Session::get("role","default")!="master")
              return redirect('/');
            else
              return view('/master/bidang')->with($data);

  }

  public function postBidang(Request $request)
  {
    try
    {
      $bidang               = new Bidang;
      $bidang->id           = $request->input("kode");
      $bidang->nama         = $request->input("nama");
      $bidang->nama_lengkap = $request->input("lengkap");
      $bidang->save();

      $role                 = new Role;
      $role->id_bidang      = $request->input("kode");
      $role->description    = $request->input("nama");
      $role->save();
      return redirect("/bidang")->with('successMessage', 'Data berhasil ditambahkan!');;
    }

    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/bidang")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postUpdate(Request $request)
  {
    $bidang               = Bidang::find($request->input("kode"));
    $bidang->nama         = $request->input("nama");
    $bidang->nama_lengkap = $request->input("lengkap");
    $bidang->save();

    $role                 = Role::where('id_bidang', $request->input("kode"))->firstOrFail();
    $role->id_bidang      = $request->input("kode");
    $role->description    = $request->input("nama");
    $role->save();

    return redirect("/bidang")->with('successMessage', 'Data berhasil diupdate!');;;;
  }

  public function postDelete(Request $request,$id)
  {
    Bidang::destroy($id);
    return redirect("/bidang");
  }

}
