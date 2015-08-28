<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use App\Urusan;

class UrusanController extends Controller {

  public function getIndex() {

  	$data['urusan']    = Urusan::all();

    if(Session::get("role","default")=="master")
                return view('/master/urusan')->with($data);
            else
                return redirect('/');
    
  }

  public function postUrusan(Request $request)
  {
    $urusan               = new Urusan;
    $urusan->id           = $request->input("kode");
    $urusan->description  = $request->input("deskripsi");
    $urusan->save();
    return redirect("/urusan");
  }

  public function postUpdate(Request $request)
  {
    $urusan = Urusan::find($request->input("kode"));
    $urusan->description = $request->input("deskripsi");
    $urusan->save();
    return redirect("/urusan");
  }

  public function postDelete(Request $request,$id)
  {
    Urusan::destroy($id);
    return redirect("/urusan");
  }

}
