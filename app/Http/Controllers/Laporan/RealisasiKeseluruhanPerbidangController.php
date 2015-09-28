<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;

class RealisasiKeseluruhanPerbidangController extends Controller{
    public function getIndex(){
        $data['page_title'] = "Realisasi Keseluruhan Perbidang";
        
        if(Session::get("role","default")=="master")
        return redirect('/');
    else
        return view('/laporan/realisasiseluruhperbidang')->with($data);
    }
}