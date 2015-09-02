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
use DB;

class ObjekBelanjaController extends Controller {

  public function getIndex() {

  	$data['page_title']     = "Master Setting Obyek Belanja";
    $data['objekbelanja']   = DB::table('s_objek_belanja')
                                  ->join('s_jenis_belanja', 's_objek_belanja.id_jenis', '=', 's_jenis_belanja.id')
                                  ->select('s_objek_belanja.id', 's_objek_belanja.id_jenis', 's_objek_belanja.description', 's_jenis_belanja.description as kelompok')
                                  ->get();
    $data['jenis']       = JenisBelanja::all();
    $data['jns']       = JenisBelanja::all();

    //digunakan untuk membatasi master agar tidak masuk ke dalam fitur
    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/master/objekbelanja')->with($data);
    
  }

  public function postAdd(Request $request)
  { 

    try
    {
      $klp = $request->input("id_jenis");
      $kd  = $request->input("kode");
      $kode = $klp.".".$kd;

      $objekbelanja               = new ObjekBelanja;
      $objekbelanja->id           = $kode;
      $objekbelanja->id_jenis  = $request->input("jenis");
      $objekbelanja->description  = $request->input("nama");
      $objekbelanja->save();

      return redirect("/objekBelanja")->with('successMessage', 'Data berhasil ditambahkan!');
    }

    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/objekBelanja")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postUpdate(Request $request,$id)
  {
    $klp = $request->input("updatejenis");
    $kd  = $request->input("updateid_objek");
    $kode = $klp.".".$kd;

    $objekbelanja               = ObjekBelanja::find($kd);
    $objekbelanja->id_jenis  = $request->input("updateid_jenis".$id);
    $objekbelanja->description  = $request->input("nama");
    $objekbelanja->save();
    return redirect("/objekBelanja")->with('successMessage', 'Data berhasil diupdate!');
  }

  public function postDelete(Request $request,$id)
  {
    ObjekBelanja::destroy($id);
    return redirect("/objekBelanja")->with('successMessage', 'Data berhasil dihapus!');
  }

}
