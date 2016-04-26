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

class ProgramController extends Controller {

  public function getIndex() {

    $data['programs'] = Program::all()->where("tahun",date('Y'));
    $data['kegiatans'] = Kegiatan::all()->where("tahun",date('Y'));
    $data['bidang'] = Bidang::all()->where("tahun",date('Y'));
    $data['bidangJSON'] = Bidang::all()->where("tahun",date('Y'))->toJSON();

    if(Session::get("role","default")=="master")
                return redirect('/');
            else
                return view('/master/program')->with($data);
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
       $dummy= DB::table('s_kegiatan')->where('s_kegiatan.tahun', date('Y'))
                                  ->where('s_kegiatan.id_program',$id)
                                  ->join('m_detail_rko', 's_kegiatan.id', '=', 'm_detail_rko.id_kegiatan')
                                  ->select('s_kegiatan.id','s_kegiatan.description','m_detail_rko.jan','m_detail_rko.feb','m_detail_rko.mar','m_detail_rko.apr','m_detail_rko.mei','m_detail_rko.jun','m_detail_rko.jul','m_detail_rko.agu','m_detail_rko.sep','m_detail_rko.okt','m_detail_rko.nov','m_detail_rko.des')
                                  ->get();
        return response()->json($dummy);
      }
      catch(ModelNotFoundException $e)
      {
        return response()->json([]);
      }

  }

}
