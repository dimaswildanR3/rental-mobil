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
Route::get('/', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login')->name('proceed-login');

Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('/dashboard', 'LoginController@dashboard')->name('dashboard');

    //logout
    Route::get('logout', 'LoginController@logout')->name('logout');


    //user
    Route::get('/admin/user','UserController@index')->name('user.index');
    Route::get('/admin/user/create','UserController@create')->name('user.create');
    Route::get('/admin/user/source','UserController@source')->name('user.source');
    Route::get('/admin/user/{id}/edit','UserController@edit')->name('user.edit');
    Route::get('/admin/user/{id}/show','UserController@show')->name('user.show');
    Route::get('/admin/user/{id}/destroy','UserController@destroy')->name('user.destroy');
    Route::post('/admin/user/store','UserController@store')->name('user.store');
    Route::post('/admin/user/{id}/update','UserController@update')->name('user.update');
    Route::get('/admin/user/change','UserController@change')->name('user.change');
    Route::post('/admin/user/updatePassword','UserController@updatePassword')->name('user.updatePassword');

    //role
    Route::get('/admin/role','RoleController@index')->name('role.index');
    Route::get('/admin/role/create','RoleController@create')->name('role.create');
    Route::get('/admin/role/source','RoleController@source')->name('role.source');
    Route::get('/admin/role/{id}/edit','RoleController@edit')->name('role.edit');
    Route::get('/admin/role/{id}/show','RoleController@show')->name('role.show');
    Route::get('/admin/role/{id}/destroy','RoleController@destroy')->name('role.destroy');
    Route::post('/admin/role/store','RoleController@store')->name('role.store');
    Route::post('/admin/role/{id}/update','RoleController@update')->name('role.update');



    //car
    // Route::get('/admin/car','CarController@index')->name('car.index');
    // Route::get('/admin/car/create','CarController@create')->name('car.create');
    // Route::get('/admin/car/source','CarController@source')->name('car.source');
    // Route::get('/admin/car/{id}/edit','CarController@edit')->name('car.edit');
    // Route::get('/admin/car/{id}/show','CarController@show')->name('car.show');
    // Route::get('/admin/car/{id}/destroy','CarController@destroy')->name('car.destroy');
    // Route::post('/admin/car/store','CarController@store')->name('car.store');
    // Route::post('/admin/car/{id}/update','CarController@update')->name('car.update');
    // Route::get('/admin/car/{id}/getImage','CarController@getImage')->name('car.getImage');
    // Route::get('/admin/car/{id}/destroyImage','CarController@destroyImage')->name('car.destroyImage');

    //customer
    Route::get('/admin/customer','CustomerController@index')->name('customer.index');
    Route::get('/admin/customer/create','CustomerController@create')->name('customer.create');
    Route::get('/admin/customer/source','CustomerController@source')->name('customer.source');
    Route::get('/admin/customer/{id}/edit','CustomerController@edit')->name('customer.edit');
    Route::get('/admin/customer/{id}/show','CustomerController@show')->name('customer.show');
    Route::get('/admin/customer/{id}/destroy','CustomerController@destroy')->name('customer.destroy');
    Route::get('/admin/customer/getCustomer','CustomerController@getCustomer')->name('customer.getCustomer');
    Route::post('/admin/customer/store','CustomerController@store')->name('customer.store');
    Route::post('/admin/customer/{id}/update','CustomerController@update')->name('customer.update');

    //manufacture
    Route::get('/admin/manufacture','ManufactureController@index')->name('manufacture.index');
    Route::get('/admin/manufacture/create','ManufactureController@create')->name('manufacture.create');
    Route::get('/admin/manufacture/source','ManufactureController@source')->name('manufacture.source');
    Route::get('/admin/manufacture/{id}/edit','ManufactureController@edit')->name('manufacture.edit');
    Route::get('/admin/manufacture/{id}/show','ManufactureController@show')->name('manufacture.show');
    Route::get('/admin/manufacture/{id}/destroy','ManufactureController@destroy')->name('manufacture.destroy');
    Route::get('/admin/manufacture/getManufacture','ManufactureController@getManufacture')->name('manufacture.getManufacture');
    Route::post('/admin/manufacture/store','ManufactureController@store')->name('manufacture.store');
    Route::post('/admin/manufacture/{id}/update','ManufactureController@update')->name('manufacture.update');
    Route::get('/admin/manufacture/{id}/find','ManufactureController@find')->name('manufacture.find');

    //transaction
    Route::get('/admin/transaction','TransactionController@index')->name('transaction.index');
    Route::get('/admin/transaction/create','TransactionController@create')->name('transaction.create');
    Route::get('/admin/transaction/history','TransactionController@history')->name('transaction.history');
    Route::get('/admin/transaction/{status}/source','TransactionController@source')->name('transaction.source');
    Route::get('/admin/transaction/{id}/edit','TransactionController@edit')->name('transaction.edit');
    Route::get('/admin/transaction/{id}/print','TransactionController@print')->name('transaction.print');
    Route::get('/admin/transaction/{id}/show','TransactionController@show')->name('transaction.show');
    Route::get('/admin/transaction/{id}/destroy','TransactionController@destroy')->name('transaction.destroy');
    Route::post('/admin/transaction/store','TransactionController@store')->name('transaction.store');
    Route::post('/admin/transaction/{id}/update','TransactionController@update')->name('transaction.update');
    Route::post('/admin/transaction/export','TransactionController@export')->name('transaction.export');
    Route::post('/admin/transaction/{id}/complete','TransactionController@complete')->name('transaction.complete');

    //setting
    Route::get('/admin/setting','SettingController@index')->name('setting.index');
    Route::get('/admin/setting/create','SettingController@create')->name('setting.create');
    Route::get('/admin/setting/source','SettingController@source')->name('setting.source');
    Route::get('/admin/setting/{id}/edit','SettingController@edit')->name('setting.edit');
    Route::get('/admin/setting/{id}/show','SettingController@show')->name('setting.show');
    Route::get('/admin/setting/{id}/destroy','SettingController@destroy')->name('setting.destroy');
    Route::post('/admin/setting/store','SettingController@store')->name('setting.store');
    Route::post('/admin/setting/change','SettingController@change')->name('setting.change');
    Route::post('/admin/setting/{id}/update','SettingController@update')->name('setting.update');

    //depan
    Route::get('/home', 'DepanController@index')->name('depan.home');
    Route::get('/about', 'AboutController@index')->name('depan.about');
    Route::get('/services', 'ServicesController@index')->name('depan.services');
    Route::get('/contact', 'ContactController@index')->name('depan.contact');

    
    
    Route::get('/admin/faktur', 'FakturController@index')->name('faktur.index');
    Route::get('/admin/faktur/source','FakturController@fakturSource')->name('faktur.source');
    Route::get('/admin/faktur/create', 'FakturController@create')->name('faktur.create');
    Route::get('/admin/faktur/{id}/edit', 'FakturController@edit')->name('faktur.edit');
    Route::get('/admin/faktur/{id}/show', 'FakturController@show')->name('faktur.show');
    Route::get('/admin/faktur/{id}/destroy', 'FakturController@destroy')->name('faktur.destroy');
    Route::post('/admin/faktur/store', 'FakturController@store')->name('faktur.store');
    Route::post('/admin/faktur/{id}/update', 'FakturController@update')->name('faktur.update');

    Route::get('/admin/karyawan', 'KaryawanController@index')->name('karyawan.index');
    Route::get('/admin/karyawan/source','KaryawanController@Source')->name('karyawan.source');
Route::get('/admin/karyawan/create', 'KaryawanController@create')->name('karyawan.create');
Route::get('/admin/karyawan/{id}/edit', 'KaryawanController@edit')->name('karyawan.edit');
Route::get('/admin/karyawan/{id}/show', 'KaryawanController@show')->name('karyawan.show');
Route::get('/admin/karyawan/{id}/destroy', 'KaryawanController@destroy')->name('karyawan.destroy');
Route::post('/admin/karyawan/store', 'KaryawanController@store')->name('karyawan.store');
Route::post('/admin/karyawan/{id}/update', 'KaryawanController@update')->name('karyawan.update');

Route::get('/admin/kendaraan', 'KendaraanController@index')->name('kendaraan.index');
Route::get('/admin/kendaraan/source','KendaraanController@source')->name('kendaraan.source');
Route::get('/admin/kendaraan/create', 'KendaraanController@create')->name('kendaraan.create');
Route::get('/admin/kendaraan/{id}/edit', 'KendaraanController@edit')->name('kendaraan.edit');
Route::get('/admin/kendaraan/{id}/show', 'KendaraanController@show')->name('kendaraan.show');
Route::get('/admin/kendaraan/{id}/destroy', 'KendaraanController@destroy')->name('kendaraan.destroy');
Route::post('/admin/kendaraan/store', 'KendaraanController@store')->name('kendaraan.store');
Route::post('/admin/kendaraan/{id}/update', 'KendaraanController@update')->name('kendaraan.update');

Route::get('/admin/pelanggan', 'PelangganController@index')->name('pelanggan.index');
Route::get('/admin/pelanggan/source','PelangganController@source')->name('pelanggan.source');
Route::get('/admin/pelanggan/create', 'PelangganController@create')->name('pelanggan.create');
Route::get('/admin/pelanggan/{id}/edit', 'PelangganController@edit')->name('pelanggan.edit');
Route::get('/admin/pelanggan/{id}/show', 'PelangganController@show')->name('pelanggan.show');
Route::get('/admin/pelanggan/{id}/destroy', 'PelangganController@destroy')->name('pelanggan.destroy');
Route::post('/admin/pelanggan/store', 'PelangganController@store')->name('pelanggan.store');
Route::post('/admin/pelanggan/{id}/update', 'PelangganController@update')->name('pelanggan.update');

Route::get('/admin/pembayaran', 'PembayaranController@index')->name('pembayaran.index');
Route::get('/admin/pembayaran/source','PembayaranController@source')->name('pembayaran.source');
Route::get('/admin/pembayaran/create', 'PembayaranController@create')->name('pembayaran.create');
Route::get('/admin/pembayaran/{id}/edit', 'PembayaranController@edit')->name('pembayaran.edit');
Route::get('/admin/pembayaran/{id}/show', 'PembayaranController@show')->name('pembayaran.show');
Route::get('/admin/pembayaran/{id}/destroy', 'PembayaranController@destroy')->name('pembayaran.destroy');
Route::post('/admin/pembayaran/store', 'PembayaranController@store')->name('pembayaran.store');
Route::post('/admin/pembayaran/{id}/update', 'PembayaranController@update')->name('pembayaran.update');

Route::get('/admin/pemesanan', 'PemesananController@index')->name('pemesanan.index');
Route::get('/admin/pemesanan/source','PemesananController@source')->name('pemesanan.source');
Route::get('/admin/pemesanan/create', 'PemesananController@create')->name('pemesanan.create');
Route::get('/admin/pemesanan/{id}/edit', 'PemesananController@edit')->name('pemesanan.edit');
Route::get('/admin/pemesanan/{id}/show', 'PemesananController@show')->name('pemesanan.show');
Route::get('/admin/pemesanan/{id}/destroy', 'PemesananController@destroy')->name('pemesanan.destroy');
Route::post('/admin/pemesanan/store', 'PemesananController@store')->name('pemesanan.store');
Route::post('/admin/pemesanan/{id}/update', 'PemesananController@update')->name('pemesanan.update');
});
