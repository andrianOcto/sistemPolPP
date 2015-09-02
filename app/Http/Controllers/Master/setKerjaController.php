<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan


class setKerjaController extends Controller {

  public function getIndex() {
  	$data['page_title'] ="Setting Satuan Kerja";
    if(Session::get("role","default")=="master")
                return redirect('/');
            else
            	return view('/master/s_SatuanKerja')->with($data);
    
  }

}
