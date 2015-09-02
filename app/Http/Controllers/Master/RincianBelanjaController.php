<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use App\JenisBelanja;
use App\KelompokBelanja;
use App\ObjekBelanja;
use App\RincianBelanja;
use DB;

class RincianBelanjaController extends Controller {

  public function getIndex() {

  	$data['page_title']     = "Master Setting Rincian Obyek Belanja";
    $data['rincianbelanja']   = DB::table('s_rincian_belanja')
                                  ->join('s_objek_belanja', 's_rincian_belanja.id_objek', '=', 's_objek_belanja.id')
                                  ->select('s_rincian_belanja.id', 's_rincian_belanja.id_objek', 's_rincian_belanja.description', 's_objek_belanja.description as kelompok')
                                  ->get();
    $data['objek']       = ObjekBelanja::all();
    $data['obj']       = ObjekBelanja::all();

    //digunakan untuk membatasi master agar tidak masuk ke dalam fitur
    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/master/rincianbelanja')->with($data);
    
  }

  public function postAdd(Request $request)
  { 

    try
    {
      $klp = $request->input("id_objek");
      $kd  = $request->input("kode");
      $kode = $klp.".".$kd;

      $rincianbelanja               = new RincianBelanja;
      $rincianbelanja->id           = $kode;
      $rincianbelanja->id_objek  = $request->input("objek");
      $rincianbelanja->description  = $request->input("nama");
      $rincianbelanja->save();

      return redirect("/rincianBelanja")->with('successMessage', 'Data berhasil ditambahkan!');
    }

    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/rincianBelanja")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postUpdate(Request $request,$id)
  {
    $klp = $request->input("updateobjek");
    $kd  = $request->input("updateid_rincian");
    $kode = $klp.".".$kd;

    $rincianbelanja               = RincianBelanja::find($kd);
    $rincianbelanja->id_objek  = $request->input("updateid_objek".$id);
    $rincianbelanja->description  = $request->input("nama");
    $rincianbelanja->save();
    return redirect("/rincianBelanja")->with('successMessage', 'Data berhasil diupdate!');
  }

  public function postDelete(Request $request,$id)
  {
    RincianBelanja::destroy($id);
    return redirect("/rincianBelanja")->with('successMessage', 'Data berhasil dihapus!');
  }

}
