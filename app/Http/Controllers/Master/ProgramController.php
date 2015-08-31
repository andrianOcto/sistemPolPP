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
use App\Program;
use DB;

class ProgramController extends Controller {

  public function getIndex() {

    $data['programs'] = Program::all();

    if(Session::get("role","default")=="master")
                return redirect('/');
            else
                return view('/master/program')->with($data);
    
  }


  public function postAdd(Request $request)
  {
    $program = new Program;
    $program->id = $request->input("kode");
    $program->description = $request->input("nama");
    $program->save();
    return redirect("/program");
  }

  public function postDelete(Request $request,$id)
  {
    Program::destroy($id);
    return redirect("/program");
  }

  public function postUpdate(Request $request)
  {
    $program = Program::find($request->input("kode"));
    $program->description = $request->input("nama");
    $program->save();
    return redirect("/program");
  }

}
