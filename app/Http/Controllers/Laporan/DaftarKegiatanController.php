<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;
use App\Kegiatan;
use App\Bidang;
use Maatwebsite\Excel\Facades\Excel;

class DaftarKegiatanController extends Controller {
    
    public function getIndex(){
        
    $data['page_title'] = "Laporan Daftar Kegiatan";
    $data['kegiatan']   = DB::table('s_kegiatan')->where("tahun",date('Y'))
                                  ->join('s_bidang', 's_kegiatan.id_bidang', '=', 's_bidang.id')
                                  ->select('s_kegiatan.id', 's_bidang.nama','s_kegiatan.id_bidang', 's_kegiatan.description', 's_kegiatan.anggaran', 's_kegiatan.sasaran')
                                  ->get();
    
    if(Session::get("role","default")=="master")
        return redirect('/');
    else
        return view('/laporan/daftarkegiatan')->with($data);
        
    }
    
    public function exportToExcel(){
        $query = DB::table('s_kegiatan')->where("tahun",date('Y'))
                ->join('s_bidang', 's_kegiatan.id_bidang', '=', 's_bidang.id')
                ->select('s_kegiatan.id', 's_bidang.nama','s_kegiatan.id_bidang', 's_kegiatan.description', 's_kegiatan.anggaran', 's_kegiatan.sasaran')
                ->get();
        
        $i=0;
        $datatabel = array();
        foreach($query as $data1){
            $result['id'] = $data1->id;
            $result['nama'] = $data1->nama;
            $result['description'] = $data1->description;
            $result['anggaran'] = $data1->anggaran;
            $result['sasaran'] = $data1->sasaran;
            
            $datatabel[$i] = $result;
            $i++;
        }
        
        $data = array(
            //title
            array('LAPORAN DAFTAR KEGIATAN'),
            array(''),
            //tabel header
            array('Kode Kegiatan','Bidang','Nama Kegiatan','Anggaran','Sasaran')
            //tabel data
        );

        $i=0;
        $startArray = 3;
        foreach ($datatabel as $key) {
            $data[$startArray] =$datatabel[$i]; 
        $i++;
        $startArray++;
        }
        
        Excel::create('Daftar Kegiatan', function($excel) use($data) {
            $excel->sheet('kegiatan', function($sheet) use($data){
                
                //document manipulation
                $sheet->setOrientation('landscape');
                $sheet->setAutoSize(true);
                
                //cells manupulation
                $sheet->mergeCells('A1:E1');
                $sheet->cells('A1:E1', function($cells){
                    $cells->setFontSize(14);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                });
                $sheet->cells('A3:E3', function($cells){
                    $cells->setAlignment('center');
                    $cells->setFontWeight('bold');
                    $cells->setBorder('solid','solid','solid','solid');
                });
                $sheet->cells('A4:E8', function($cells){
                    $cells->setBorder('solid','solid','solid','solid');
                });
                
                //data
                $sheet->fromArray($data, null, 'A1', false, false);
                
            });
        })->download('xlsx');
        
    }
}
