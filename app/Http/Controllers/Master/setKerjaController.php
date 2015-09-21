<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use App\SatuanKerja;
use App\Urusan;
use DB;


class setKerjaController extends Controller {

  public function getIndex() {
  	$data['page_title']    ="Setting Satuan Kerja";
  	$data['urusan']        =Urusan::all();
    $data['satuanKerja']   =SatuanKerja::find(1); 
    if(Session::get("role","default")=="master")
                return redirect('/');
            else
            	return view('/master/test')->with($data);
    
  }

  public function getEdit(){
  	return "Edit";
  }

  public function postSave(Request $request){
  	$SatuanKerja				          = SatuanKerja::find(1);
  	$SatuanKerja->id_urusan		    = $request->input("id_urusan"); 
  	$SatuanKerja->nama_skpd 	    = $request->input("nama_skpd");
  	$SatuanKerja->kode_skpd		    = $request->input("kode_skpd2"); 
  	$SatuanKerja->nama_bendahara  = $request->input("nama_bendahara"); 
  	$SatuanKerja->nip 			      = $request->input("nip_bendahara");
  	$SatuanKerja->npwp 			      = $request->input("npwp"); 
  	$SatuanKerja->nama_bank 	    = $request->input("nama_bank"); 
  	$SatuanKerja->no_rekening 	  = $request->input("rekening"); 
  	$SatuanKerja->nip_kepala	    = $request->input("nip_kepala");
  	$SatuanKerja->nama_kepala	    = $request->input("nama_kepala"); 
  	$SatuanKerja->nama_jabatan	  = $request->input("nama_jabatan"); 
  	$SatuanKerja->save();
  	return redirect("/satuanKerja")->with('successMessage', 'Data berhasil diupdate!');;;;;
  }

}
