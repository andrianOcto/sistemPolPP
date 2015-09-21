<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;
use App\Kegiatan;
use App\EntryRKO;
use Maatwebsite\Excel\Facades\Excel;

class DaftarAlokasiController extends Controller{
    public function getIndex(){
        $data['page_title'] = "Laporan RKO";
        
        $data['alokasi']    = DB::table('m_detail_rko')
                                ->join('s_kegiatan', 'm_detail_rko.id_kegiatan', '=', 's_kegiatan.id')
                                ->select('s_kegiatan.nama_bidang', 's_kegiatan.description', 's_kegiatan.anggaran', 'm_detail_rko.jan', 'm_detail_rko.feb', 'm_detail_rko.mar', 'm_detail_rko.apr', 'm_detail_rko.mei', 'm_detail_rko.jun', 'm_detail_rko.jul', 'm_detail_rko.agu', 'm_detail_rko.sep', 'm_detail_rko.okt', 'm_detail_rko.nov', 'm_detail_rko.des')
                                ->get();
    
    if(Session::get("role","default")=="master")
        return redirect('/');
    else
        return view('/laporan/daftaralokasi')->with($data);
        
    }
    
    public function exportToExcel(){
        $query    = DB::table('m_detail_rko')
                                ->join('s_kegiatan', 'm_detail_rko.id_kegiatan', '=', 's_kegiatan.id')
                                ->select('s_kegiatan.nama_bidang', 's_kegiatan.description', 's_kegiatan.anggaran', 'm_detail_rko.jan', 'm_detail_rko.feb', 'm_detail_rko.mar', 'm_detail_rko.apr', 'm_detail_rko.mei', 'm_detail_rko.jun', 'm_detail_rko.jul', 'm_detail_rko.agu', 'm_detail_rko.sep', 'm_detail_rko.okt', 'm_detail_rko.nov', 'm_detail_rko.des')
                                ->get();
        
        $i=1;
        $datatabel = array();
        foreach($query as $data1){
            $result['nama_bidang'] = $data1->nama_bidang;
            $result['description'] = $data1->description;
            $result['anggaran'] = $data1->anggaran;
            $result['jan'] = $data1->jan;
            $result['feb'] = $data1->feb;
            $result['mar'] = $data1->mar;
            $result['apr'] = $data1->apr;
            $result['mei'] = $data1->mei;
            $result['jun'] = $data1->jun;
            $result['jul'] = $data1->jul;
            $result['agu'] = $data1->agu;
            $result['sep'] = $data1->sep;
            $result['okt'] = $data1->okt;
            $result['nov'] = $data1->nov;
            $result['des'] = $data1->des;
            
            $datatabel[$i] = $result;
            $i++;
        }
        
        $data = array(
            //title
            array('LAPORAN DAFTAR REALISASI ALOKASI'),
            array(''),
            //tabel header
            array('Bidang','Nama Kegiatan','Anggaran','Januari','Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
            //tabel data
            $datatabel[1]    
        );
        
        Excel::create('Daftar Realisasi Alokasi', function($excel) use($data) {
            $excel->sheet('RKO Kegiatan', function($sheet) use($data){
                
                //document manipulation
                $sheet->setOrientation('landscape');
                
                //cells manupulation
                $sheet->mergeCells('A1:O1');
                $sheet->cells('A1:O1', function($cells){
                    $cells->setFontSize(14);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                });
                $sheet->cells('A3:O3', function($cells){
                    $cells->setAlignment('center');
                    $cells->setFontWeight('bold');
                    $cells->setBorder('solid','solid','solid','solid');
                });
                
                //data
                $sheet->fromArray($data, null, 'A1', false, false);
                
            });
        })->download('xlsx');
    }
}