<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;
use App\EntryRKO;

class GrafikKeseluruhanController extends Controller{
    public function getIndex(){
        $data['page_title'] = "Laporan Daftar Kegiatan";
        $data['tahun'] = DB::table('m_detail_rko')
                         ->select('tahun')
                         ->groupBy('tahun')
                         ->get();
        $data['rko'] = DB::table('m_detail_rko')
                         ->select('tahun',DB::raw('SUM(jan) as jan'),DB::raw('SUM(feb) as feb'),DB::raw('SUM(mar) as mar'),DB::raw('SUM(apr) as apr'),
                            DB::raw('SUM(mei) as mei'),DB::raw('SUM(jun) as jun'),DB::raw('SUM(jul) as jul'),DB::raw('SUM(agu) as agu'),DB::raw('SUM(sep) as sep'),
                            DB::raw('SUM(okt) as okt'),DB::raw('SUM(nov) as nov'),DB::raw('SUM(des) as des'))
                         ->groupBy('tahun')
                         ->get();;
        $data['spj'] = DB::table('m_detail_rko')
                         ->select('tahun',DB::raw('SUM(jan) as jan'),DB::raw('SUM(feb) as feb'),DB::raw('SUM(mar) as mar'),DB::raw('SUM(apr) as apr'),
                            DB::raw('SUM(mei) as mei'),DB::raw('SUM(jun) as jun'),DB::raw('SUM(jul) as jul'),DB::raw('SUM(agu) as agu'),DB::raw('SUM(sep) as sep'),
                            DB::raw('SUM(okt) as okt'),DB::raw('SUM(nov) as nov'),DB::raw('SUM(des) as des'))
                         ->groupBy('tahun')
                         ->get();
        if(Session::get("role","default")=="master")
        return redirect('/');
    else
        return view('/laporan/grafikkeseluruhan')->with($data);
        
    }
    
    public function perTahun(Request $request){
        $tahun = new EntryRKO;
        $tahun->tahun = $request->input("pertahun");
        $tahun->save();
        return redirect("/grafikrealisasikeseluruhan");
    }
}