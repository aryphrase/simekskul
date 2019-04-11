<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/ekstrakurikuler', function () {
    return view('ekskul');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
 
Route::get('/halamanutama', 'HomeController@index');

// --Siswa
Route::resource('siswa', 'SiswaController');
Route::get('/siswa/{id}/edit', 'SiswaController@edit');
Route::get('/siswa/{id}/show', 'SiswaController@show');
Route::post('/inputdatasiswa', 'SiswaController@store');

// --Pembina
Route::resource('pembina', 'PembinaController');
Route::get('/pembina/{id}/edit', 'PembinaController@edit');
Route::get('/pembina/{id}/show', 'PembinaController@show');
Route::post('/inputdatapembina', 'PembinaController@store');

// --Ekskul
Route::resource('ekskul', 'EkskulController');
Route::get('/ekskul/daftarekskul', 'EkskulController@daftarekskul');
Route::get('/ekskul/{id}/buatdataekskul', 'EkskulController@buatdataekskul');
Route::get('/ekskul/{id}/edit', 'EkskulController@edit');
Route::get('/ekskul/{id}/show', 'EkskulController@show');
Route::post('/inputdataekskul', 'EkskulController@store');

// --Proker
Route::resource('proker', 'ProkerController');
Route::get('/proker/{id}/edit', 'ProkerController@edit');
Route::get('/proker/{id}/show', 'ProkerController@show');
Route::post('/inputdataproker', 'ProkerController@store');


// --Rapat
Route::resource('rapat', 'RapatController');
Route::get('/rapat/{id}/edit', 'RapatController@edit');
Route::get('/rapat/{id}/show', 'RapatController@show');
Route::post('/inputdatarapat', 'RapatController@store');

// --Keuangan
Route::resource('keuangan', 'KeuanganController');
Route::get('/keuangan', 'KeuanganController@index');
Route::get('/keuangan/pemasukan/create', 'KeuanganController@createPemasukan');
Route::get('/keuangan/pengeluaran/create', 'KeuanganController@createPengeluaran');
Route::post('/inputdatapemasukan', 'KeuanganController@storePemasukan');
Route::post('/inputdatapengeluaran', 'KeuanganController@storePengeluaran');
Route::get('/keuangan/pemasukan/{id}/showpemasukan', ['uses' => 'KeuanganController@showPemasukan', 'as' => 'keuangan.showPemasukan']);
Route::get('/keuangan/pengeluaran/{id}/showpengeluaran', ['uses' => 'KeuanganController@showPengeluaran', 'as' => 'keuangan.showPengeluaran']);
Route::get('/keuangan/pemasukan/{id}/editpemasukan', ['uses' => 'KeuanganController@editPemasukan', 'as' => 'keuangan.editPemasukan']);
Route::get('/keuangan/pengeluaran/{id}/editpengeluaran', ['uses' => 'KeuanganController@editPengeluaran', 'as' => 'keuangan.editPengeluaran']);
Route::put('/keuangan/pemasukan/{id}', 'KeuanganController@updatePemasukan');
Route::put('/keuangan/pengeluaran/{id}', 'KeuanganController@updatePengeluaran');
Route::delete('/keuangan/pemasukan/{id}', ['uses' => 'KeuanganController@destroyPemasukan', 'as' => 'keuangan.destroyPemasukan']);
Route::delete('/keuangan/pengeluaran/{id}', ['uses' => 'KeuanganController@destroyPengeluaran', 'as' => 'keuangan.destroyPengeluaran']);

// --Keanggotaan
Route::resource('keanggotaan', 'KeanggotaanController');
Route::get('/keanggotaan/editkeanggotaan/{id}/editkeanggotaan', ['uses' => 'KeanggotaanController@editKeanggotaan', 'as' => 'keanggotaan.editKeanggotaan']);
Route::put('/updatedatakeanggotaan/{id}', 'KeanggotaanController@update');
Route::get('/keanggotaan/pendaftaran/create', 'KeanggotaanController@create');
Route::get('/keanggotaan/pendaftaran/buktipendaftaran', 'KeanggotaanController@buktipendaftaran');
Route::post('/pendaftaran', 'KeanggotaanController@store');
Route::get('/keanggotaan/carianggota','KeanggotaanController@carianggota');

// --Pembinaan
Route::resource('pembinaan', 'PembinaanController');
Route::get('/pembinaan/create', 'PembinaanController@create');
Route::get('/pembinaan/{id}/edit', 'PembinaanController@edit');
Route::post('/inputdatapembinaan', 'PembinaanController@store');

// --Penilaian
Route::resource('penilaian', 'PenilaianController');
Route::get('/penilaian/create', 'PenilaianController@create');
Route::get('/penilaian/{id}/edit', 'PenilaianController@edit');
Route::post('/inputdatapenilaian', 'PenilaianController@store');

// --Laporan
Route::resource('laporan', 'LaporanController');
Route::get('/laporan/create', 'LaporanController@create');
Route::get('/laporan/{id}/edit', 'LaporanController@edit');
Route::get('/laporan/{id}/show', 'LaporanController@show');
Route::post('/inputdatalaporan', 'LaporanController@store');
Route::get('laporan/{id}/cetakpdflaporan', ['uses' => 'LaporanController@cetakpdfsatuan', 'as' => 'laporan.cetakpdfsatuan']);

// --Proposal
Route::resource('proposal', 'ProposalController');
Route::get('/proposal/create', 'ProposalController@create');
Route::get('/proposal/{id}/edit', 'ProposalController@edit');
Route::get('/proposal/{id}/show', 'ProposalController@show');
Route::post('/inputdataproposal', 'ProposalController@store');
Route::get('proposal/{id}/cetakpdfproposal', ['uses' => 'ProposalController@cetakpdfsatuan', 'as' => 'proposal.cetakpdfsatuan']);

Route::resource('sekolah', 'SekolahController');
Route::post('/inputdatasekolah', 'SekolahController@store');

// Cetak PDF
Route::get('/cetakpdfproker', 'ProkerController@cetakpdf');
Route::get('/cetakpdfkeuangan', 'KeuanganController@cetakpdf');
Route::get('rapat/{id}/cetakpdfrapat', ['uses' => 'RapatController@cetakpdfsatuan', 'as' => 'rapat.cetakpdfsatuan']);
Route::get('keanggotaan/pendaftaran/{id}/cetakbuktipendaftaran', ['uses' => 'KeanggotaanController@cetakbuktipendaftaran', 'as' => 'keanggotaan.cetakbuktipendaftaran']);
Route::get('/cetakpdfpendaftar', 'KeuanganController@cetakpendaftar');