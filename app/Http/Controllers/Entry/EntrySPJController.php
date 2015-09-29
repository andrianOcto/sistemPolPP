<?php namespace App\Http\Controllers\Entry;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;
//Lib yang digunakan
use Session;
//Model yang digunakan
use App\JenisBelanja;
use App\KelompokBelanja;
use App\Bidang;
use App\Program;
use App\Kegiatan;
use App\EntryRKO;
use App\Rencana;
use App\RincianBelanja;
use App\EntrySPJ;
use Carbon\Carbon;
use DB;

class EntrySPJController extends Controller {

  public function getIndex() {

    $data['page_title']     = "Master Setting Kegiatan";
    $data['kegiatan']       = DB::table('s_kegiatan')
                                  ->join('s_bidang', 's_kegiatan.id_bidang', '=', 's_bidang.id')
                                  ->select('s_kegiatan.id', 's_bidang.nama','s_kegiatan.id_bidang', 's_kegiatan.description', 's_kegiatan.anggaran', 's_kegiatan.sasaran')
                                  ->get();
    $data['bidang']         = Bidang::all();

    //digunakan untuk membatasi master agar tidak masuk ke dalam fitur
    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/entry/EntrySPJ')->with($data);
    
  }

  public function getDetailSPJ(Request $request,$id){
    $data['page_title']       = "Entry Realisasi SJP";
    $data['rincian_belanja']  = RincianBelanja::all();
    $data['rencana']          = Rencana::where("id_kegiatan",$id)->where("tahun",date('Y'))->get();
    $data['detailSPJ']          = EntrySPJ::where("id_kegiatan",$id)->get();
    $data['detailKegiatan']   = Kegiatan::find($id);

    if(Session::get("role","default")=="master")
              return redirect('/');
            else
              return view('/entry/EntryRealisasi')->with($data);
  }

  public function postSPJ(Request $request){
    try
    {
      $input  = $request->input("tanggal");
      $format = 'd/m/Y';
      $tgl = Carbon::createFromFormat($format, $input);
      $spj                = new EntrySPJ;
      $spj->id_kegiatan   = $request->input("id_kegiatan");   
      $spj->id_rincian    = $request->input("id_rincian");    
      $spj->tahun         = date('Y');
      $spj->jumlah        = $request->input("jumlah");
      $spj->harga         = $request->input("harga");
      $spj->keperluan     = $request->input("keperluan"); 
      $spj->tanggal       = $tgl;


      $spj->save();
      $id_kegiatan        = $request->input("id_kegiatan");   
      return redirect("/SPJ/realisasi/$id_kegiatan")->with('successMessage', 'Data berhasil ditambahkan!');
    }

    //jika user sudah ada dalam database
    catch(\Illuminate\Database\QueryException $e)
    {
      return redirect("/SPJ")->with('errMessage', 'Kode yang disimpan sudah ada dalam database. </br> Harap Coba menggunakan kode yang belum ada');
    }
  }

  public function postUpdate(Request $request)
  {
    $EntrySPJ               = EntrySPJ::find($request->input("id"));
    $id_kegiatan            = $request->input('id_kegiatan');
    $EntrySPJ->id_rincian   = $request->input('id_rincian');
    $EntrySPJ->harga        = $request->input('harga');
    $EntrySPJ->jumlah       = $request->input('jumlah'); 
    $EntrySPJ->save();
    return redirect("/SPJ/realisasi/$id_kegiatan")->with('successMessage', 'Data berhasil diupdate!');;
  }

  public function postDelete(Request $request,$id)
  {
    EntrySPJ::destroy($id);
    $id_kegiatan = $request->input('id_kegiatan');
    return redirect("/SPJ/realisasi/$id_kegiatan")->with('successMessage', 'Data berhasil dihapus!');;
  }
}
