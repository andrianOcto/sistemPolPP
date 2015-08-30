<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use App\JenisBelanja;
use App\KelompokBelanja;
use DB;

class JenisbelanjaController extends Controller {

  public function getIndex() {

  	$data['page_title']     = "Master Setting Jenis Belanja";
    $data['jenisbelanja']   = DB::table('s_jenis_belanja')
                                  ->join('s_kelompok_belanja', 's_jenis_belanja.id_kelompok', '=', 's_kelompok_belanja.id')
                                  ->select('s_jenis_belanja.id', 's_jenis_belanja.id_kelompok', 's_jenis_belanja.description', 's_kelompok_belanja.description as kelompok')
                                  ->get();
    $data['kelompok']       = KelompokBelanja::all();
    $data['klp']       = KelompokBelanja::all();

    //digunakan untuk membatasi master agar tidak masuk ke dalam fitur
    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/master/jenisbelanja')->with($data);
    
  }

  public function postJenis(Request $request)
  { 
    $klp = $request->input("kelompok");
    $kd  = $request->input("kode");
    $kode = $klp.".".$kd;

    $jenisbelanja               = new Jenisbelanja;
    $jenisbelanja->id           = $kode;
    $jenisbelanja->id_kelompok  = $request->input("kelompok");
    $jenisbelanja->description  = $request->input("nama");
    $jenisbelanja->save();
    return redirect("/jenisBelanja");
  }

  public function postUpdate(Request $request)
  {
    $klp = $request->input("kelompok");
    $kd  = $request->input("kode");
    $kode = $klp.".".$kd;

    $jenisbelanja               = Jenisbelanja::find($kode);
    $jenisbelanja->id_kelompok  = $request->input("kelompok");
    $jenisbelanja->description  = $request->input("nama");
    $jenisbelanja->save();
   // return redirect("/jenisBelanja");
  }

  public function postDelete(Request $request,$id)
  {
    Jenisbelanja::destroy($id);
    return redirect("/jenisBelanja");
  }

}
