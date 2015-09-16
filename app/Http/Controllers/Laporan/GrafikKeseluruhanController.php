<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;

class GrafikKeseluruhanController extends Controller{
    public function getIndex(){
    $data['page_title'] = "Laporan Daftar Kegiatan";
    
        if(Session::get("role","default")=="master")
        return redirect('/');
    else
        return view('/laporan/grafikkeseluruhan')->with($data);
        
    }
}