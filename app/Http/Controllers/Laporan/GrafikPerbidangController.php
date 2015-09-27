<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;
use App\Bidang;
use App\EntryRKO;
use App\Kegiatan;

class GrafikPerbidangController extends Controller{
    public function getIndex(){
        $data['page_title'] = "Laporan Daftar Kegiatan";
        
        $data['bidang']     = Bidang::all();
        
        $defaultBidang      = ""; 

        $i=0;
        foreach ($data['bidang'] as $key) {
            if($i == 0)
                $defaultBidang = $key;

            $i++;
        }


        $data['rko']        = DB::table('m_detail_rko')
                            ->join('s_kegiatan','s_kegiatan.id','=','m_detail_rko.id_kegiatan')->where('s_kegiatan.id_bidang',$defaultBidang->id)
                            ->select('m_detail_rko.tahun',DB::raw('SUM(jan) as jan'),DB::raw('SUM(feb) as feb'),DB::raw('SUM(mar) as mar'),DB::raw('SUM(apr) as apr'),
                            DB::raw('SUM(mei) as mei'),DB::raw('SUM(jun) as jun'),DB::raw('SUM(jul) as jul'),DB::raw('SUM(agu) as agu'),DB::raw('SUM(sep) as sep'),
                            DB::raw('SUM(okt) as okt'),DB::raw('SUM(nov) as nov'),DB::raw('SUM(des) as des'))
                            ->groupBy('m_detail_rko.tahun')
                            ->get();

        $data['tahun'] = DB::table('m_detail_rko')
                         ->select('tahun')
                         ->groupBy('tahun')
                         ->get();
        $data['kegiatan']   = Kegiatan::all();
        
        
        if(Session::get("role","default")=="master")
            return redirect('/');
        else
            return view('/laporan/grafikperbidang')->with($data);
        
    }
    public function getRefresh($tahun,$id){
        $data['page_title'] = "Laporan Daftar Kegiatan";
        
        $data['bidang']     = Bidang::all();
        
        $defaultBidang      = ""; 


        $data['rko']        = DB::table('m_detail_rko')
                            ->join('s_kegiatan','s_kegiatan.id','=','m_detail_rko.id_kegiatan')->where('s_kegiatan.id_bidang',$id)->where('s_kegiatan.tahun',$tahun)
                            ->select('m_detail_rko.tahun',DB::raw('SUM(jan) as jan'),DB::raw('SUM(feb) as feb'),DB::raw('SUM(mar) as mar'),DB::raw('SUM(apr) as apr'),
                            DB::raw('SUM(mei) as mei'),DB::raw('SUM(jun) as jun'),DB::raw('SUM(jul) as jul'),DB::raw('SUM(agu) as agu'),DB::raw('SUM(sep) as sep'),
                            DB::raw('SUM(okt) as okt'),DB::raw('SUM(nov) as nov'),DB::raw('SUM(des) as des'))
                            ->groupBy('m_detail_rko.tahun')
                            ->get();

        $data['tahun'] = DB::table('m_detail_rko')
                         ->select('tahun')
                         ->groupBy('tahun')
                         ->get();
        $data['kegiatan']   = Kegiatan::all();
        
        
        if(Session::get("role","default")=="master")
            return redirect('/');
        else
            return view('/laporan/grafikperbidang')->with($data);
        
    }
}