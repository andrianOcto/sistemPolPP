<?php namespace App\Http\Controllers\Laporan;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Lib yang digunakan
use Session;
//Model yang digunakan
use DB;
use App\Bidang;
use Maatwebsite\Excel\Facades\Excel;

class RekapRealisasiKeseluruhanPerbidangController extends Controller{
    public function getIndex(){
        $data['page_title'] = 'Rekapitulasi Realisasi Keseluruhan Perbidang';
        $data['bidang']     = Bidang::all();
        
        if(Session::get("role","default")=="master")
            return redirect('/');
        else
            return view('/laporan/rekaprealisasiseluruhperbidang')->with($data);
    }
    
    public function exportToExcel(){
        $data   = array(
                array('REKAPITULASI REALISASI KESELURUHAN'),
                array(''),
                array('Bulan', 'Anggaran', 'RKO', 'Realisasi', 'Saldo'),
                array('Januari'),
                array('Februari'),
                array('Maret'),
                array('April'),
                array('Mei'),
                array('Juni'),
                array('Juli'),
                array('Agustus'),
                array('Oktober'),
                array('November'),
                array('Desember'),
                array('Jumlah'),
        );
        
        Excel::create('Rekap Realisasi Keseluruhan Perbidang', function($excel) use($data){
            $excel->sheet('realisasi keseluruhan', function($sheet) use($data){
                
                //document manipulation
                $sheet->setOrientation('portrait');
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
                $sheet->cells('A4:E15', function($cells){
                    $cells->setBorder('solid','solid','solid','solid');
                });
                $sheet->cells('A15:E15', function($cells){
                    $cells->setAlignment('center');
                    $cells->setFontWeight('bold');
                });
                
                //data
                $sheet->fromArray($data, null, 'A1', false, false);
            });
        })->download('xlsx');
    }
}