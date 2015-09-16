<?php namespace App\Http\Controllers\Master;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//Lib yang digunakan
use Session;
//Model yang digunakan
use App\JenisBelanja;
use App\KelompokBelanja;
use App\Bidang;
use App\Program;
use App\Kegiatan;
use DB;

class entryRKOController extends Controller {

  public function getIndex() {

    $data['programs'] = Program::all();
    $data['kegiatans'] = Kegiatan::all();
    $data['bidang'] = Bidang::all();
    $data['bidangJSON'] = Bidang::all()->toJSON();

    if(Session::get("role","default")=="master")
                return redirect('/');
            else
                return view('/master/entryRKO')->with($data);
  }


  public function postAdd(Request $request)
  {
    try
    {
      $program              = new Program;
      $program->id          = $request->input("kode");
      $program->description = $request->input("nama");
      $program->tahun       = date('Y');
      $program->save();
      return redirect("/program")->with('successMessage', 'Data berhasil ditambahkan!');;
    }

    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/program")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postDelete(Request $request,$id)
  {
    Program::destroy($id);
    return redirect("/program")->with('successMessage', 'Data berhasil dihapus!');;
  }

  public function postUpdate(Request $request)
  {
    $program = Program::find($request->input("kode"));
    $program->description = $request->input("nama");
    $program->save();
    return redirect("/program")->with('successMessage', 'Data berhasil diupdate!');;
  }

  public function getLoad($id)
  {
      try{
        $dummy = Kegiatan::where('id_program',$id)->get();
        return response()->json($dummy);
      }
      catch(ModelNotFoundException $e)
      {
        return response()->json([]);
      }
    
  }

}
