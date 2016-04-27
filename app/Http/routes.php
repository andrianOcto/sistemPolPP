<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controller('api', 'ApiController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//route digunakan sebelum pengguna login
Route::group(['middleware' => 'guest'], function () {
	
    Route::get('/login', 'LoginController@getLogin');
    Route::post('/login', 'LoginController@postLogin');
});


//digunakan untuk routing kalau udah login
Route::group(['middleware' => 'auth'], function () {
    
     Route::get('/', 'DashboardController@getIndex');
     Route::get('/logout', 'DashboardController@getLogout');

     //Route Admin
     Route::get('/admin','Admin\AdminController@getIndex');
     Route::post('/admin/register','Admin\AdminController@postRegister');
     Route::post('/admin/update','Admin\AdminController@postUpdate');
     Route::post('/admin/delete/{username}','Admin\AdminController@postDelete');

     Route::get('/admin/role','Admin\RoleController@getIndex');
     Route::post('/admin/role/register','Admin\RoleController@postRegister');
     Route::post('/admin/role/update','Admin\RoleController@postUpdate');
     Route::post('/admin/role/delete/{username}','Admin\RoleController@postDelete');

     // Route Master Setting Satuan Kerja
     Route::get('/satuanKerja','Master\setKerjaController@getIndex');
     Route::get('/satuanKerja/edit','Master\setKerjaController@getEdit');
     Route::post('/satuanKerja/save','Master\setKerjaController@postSave');

     // Route Master Setting Urusan
     Route::get('/urusan','Master\UrusanController@getIndex');
     Route::post('/urusan/add','Master\UrusanController@postUrusan');
     Route::post('/urusan/update','Master\UrusanController@postUpdate');
     Route::post('/urusan/delete/{id}','Master\UrusanController@postDelete');

     // Route Master Setting Bidang
     Route::get('/bidang','Master\BidangController@getIndex');
     Route::post('/bidang/add','Master\BidangController@postBidang');
     Route::post('/bidang/update','Master\BidangController@postUpdate');
     Route::post('/bidang/delete/{id}','Master\BidangController@postDelete');

     // Route Master Setting Kelompok Belanja
     Route::get('/kelompokBelanja','Master\KelompokBelanjaController@getIndex');
     Route::post('/belanja/add','Master\KelompokBelanjaController@postKelompok');
     Route::post('/kelompokBelanja/update','Master\KelompokBelanjaController@postUpdate');
     Route::post('/kelompokBelanja/delete/{id}','Master\KelompokBelanjaController@postDelete');

     // Route Master Setting Jenis Belanja
     Route::get('/jenisBelanja','Master\JenisBelanjaController@getIndex');
     Route::post('/jenisBelanja/add','Master\JenisBelanjaController@postJenis');
     Route::post('/jenisBelanja/update','Master\JenisBelanjaController@postUpdate');
     Route::post('/jenisBelanja/delete/{id}','Master\JenisBelanjaController@postDelete');

     //Route Master Setting Obyek Belanja
     Route::get('/objekBelanja','Master\ObjekBelanjaController@getIndex');
     Route::post('/objekBelanja/add','Master\ObjekBelanjaController@postAdd');
     Route::post('/objekBelanja/update/{id}','Master\ObjekBelanjaController@postUpdate');
     Route::post('/objekBelanja/delete/{id}','Master\ObjekBelanjaController@postDelete');

      //Route Master Setting Rincian Belanja
     Route::get('/rincianBelanja','Master\RincianBelanjaController@getIndex');
     Route::post('/rincianBelanja/add','Master\RincianBelanjaController@postAdd');
     Route::post('/rincianBelanja/update/{id}','Master\RincianBelanjaController@postUpdate');
     Route::post('/rincianBelanja/delete/{id}','Master\RincianBelanjaController@postDelete');

     //Route Master Setting Program
     Route::get('/program','Master\ProgramController@getIndex');
     Route::post('/program/add','Master\ProgramController@postAdd');
     Route::get('/program/load/{id}','Master\ProgramController@getLoad');
     Route::post('/program/update','Master\ProgramController@postUpdate');
     Route::post('/program/delete/{id}','Master\ProgramController@postDelete');

     //Route Master Setting Kegiatan
     Route::post('/kegiatan/add','Master\KegiatanController@postAdd');
     Route::get('/kegiatan','Master\KegiatanController@getIndex');
     Route::post('/kegiatan/update/{id}','Master\KegiatanController@postUpdate');
     Route::post('/kegiatan/delete/{id}','Master\KegiatanController@postDelete');

     //Route Rencana Realisasi
     Route::get('/rencana/{id}','Master\RencanaController@getIndex');
     Route::post('/rencana/add','Master\RencanaController@postRencana');
     Route::post('/rencana/update','Master\RencanaController@postUpdate');
     Route::post('/rencana/delete/{kegiatan}/{id}','Master\RencanaController@postDelete');

     //Route Entry RKO
     Route::get('/entryRKO','Entry\EntryRKOController@getIndex');
     Route::post('/program/add','Master\ProgramController@postAdd');
     Route::get('/program/load/{id}','Master\ProgramController@getLoad');
     Route::post('/entryRKO/update','Entry\EntryRKOController@postUpdate');
     Route::post('/program/delete/{id}','Master\ProgramController@postDelete');
    
     //Route Entry SPJ
     Route::get('/SPJ','Entry\EntrySPJController@getIndex');
     Route::get('/SPJ/realisasi/{id}','Entry\EntrySPJController@getDetailSPJ');
     Route::post('/SPJ/add','Entry\EntrySPJController@postSPJ');
     Route::post('/realisasi/delete/{id}', 'Entry\EntrySPJController@postDelete');
     Route::post('/SPJ/update', 'Entry\EntrySPJController@postUpdate');
    
     //Route Daftar Kegiatan
     Route::get('/daftarkegiatan','Laporan\DaftarKegiatanController@getIndex');
     Route::get('/dafarkegiatan/excel','Laporan\DaftarKegiatanController@exportToExcel');
    
     //Route Daftar RKO
     Route::get('/daftaralokasi','Laporan\DaftarAlokasiController@getIndex');
     Route::get('/daftaralokasi/excel','Laporan\DaftarAlokasiController@exportToExcel');
    
     //Route Grafik Realisasi Keseluruhan
     Route::get('/grafikrealisasikeseluruhan','Laporan\GrafikKeseluruhanController@getIndex');
     Route::get('/grafikrealisasikeseluruhan/refresh/{tahun}','Laporan\GrafikKeseluruhanController@getRefresh');
     Route::post('/grafikrealisasi/pertahun','Laporan\GrafikKeseluruhanController@perTahun');
    
     //Route Grafik Realisasi Perbidang
     Route::get('/grafikrealisasiperbidang','Laporan\GrafikPerbidangController@getIndex');             
     Route::get('/grafikrealisasiperbidang/refresh/{tahun}/{id}', 'Laporan\GrafikPerbidangController@getRefresh');

     //Route ChangePassword
     Route::post('/changePassword','DashboardController@getPassword');
    
     //Route Realisasi Seluruh
     Route::get('/realisasikeseluruhan','Laporan\RealisasiKeseluruhanController@getIndex');
    
     //Route Realisasi Seluruh Perbidang
     Route::get('/realisasikeseluruhanperbidang','Laporan\RealisasiKeseluruhanPerbidangController@getIndex');
    
     //Route Rekap Realisasi Seluruh
     Route::get('/rekaprealisasikeseluruhan','Laporan\RekapRealisasiKeseluruhanController@getIndex');
     Route::get('/rekaprealisasikeseluruhan/excel','Laporan\RekapRealisasiKeseluruhanController@exportToExcel');
    
     //Route Rekap Realisasi Seluruh Perbidang
     Route::get('/rekaprealisasikeseluruhanperbidang', 'Laporan\RekapRealisasiKeseluruhanPerbidangController@getIndex');
     Route::get('/rekaprealisasikeseluruhanperbidang/excel', 'Laporan\RekapRealisasiKeseluruhanPerbidangController@exportToExcel');

     Route::get('/laporanSPJ','Laporan\RealisasiKeseluruhanController@getSPJ');
});