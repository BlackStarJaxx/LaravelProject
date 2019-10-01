<?php
use App\Mail\CompanyFormMail;
use Illuminate\Support\Facades\Mail;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware (['auth'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('companies', 'Admin\CompanyController');
});

Route::middleware (['auth'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('employees', 'Admin\EmployeeController');
});


Route::get ( '/', function () {
    $companies = \App\Company::all ();
    return view ( 'admin.companies.index' )->withCompany($companies);
} );


Route::get('companies', 'Admin\CompanyController@create');
Route::post('companies', 'Admin\CompanyController@store');


