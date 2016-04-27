<?php namespace App\Http\Controllers\Entry;

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
use App\EntryRKO;
use DB;

class EntryRKOController extends Controller {

  public function getIndex() {

    $data['programs'] = Program::all();
    $data['kegiatans'] = Kegiatan::all();
    $data['bidang'] = Bidang::all();
    $data['bidangJSON'] = Bidang::all()->toJSON();

    if(Session::get("role","default")=="master")
                return redirect('/');
            else
                return view('/Entry/entryRKO')->with($data);
  }

  public function postUpdate(Request $request)
  {
    try
    {
      $affectedRows = EntryRKO::where('id_kegiatan', $request->input("kodeKegiatan"))
      ->where('tahun', date('Y'))
      ->update(array(
        'jan' => $request->input("jan"),
        'feb' => $request->input("feb"),
        'mar' => $request->input("mar"),
        'apr' => $request->input("apr"),
        'mei' => $request->input("mei"),
        'jun' => $request->input("jun"),
        'jul' => $request->input("jul"),
        'agu' => $request->input("agu"),
        'sep' => $request->input("sep"),
        'okt' => $request->input("okt"),
        'nov' => $request->input("nov"),
        'des' => $request->input("des"),)
       );
      return redirect("/entryRKO")->with('successMessage', 'Data berhasil diupdate!');;
    }
    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/entryRKO")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }


}
