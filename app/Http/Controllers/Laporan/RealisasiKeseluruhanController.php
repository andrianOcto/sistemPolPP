<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;

class RealisasiKeseluruhanController extends Controller{
    public function getIndex(){
        $data['page_title'] = "Realisasi Keseluruhan";
        
        if(Session::get("role","default")=="master")
        return redirect('/');
    else
        return view('/laporan/realisasiseluruh')->with($data);
    }
}