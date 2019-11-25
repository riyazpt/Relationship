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
    return view('welcome');
});
//Route for company master
Route::resource('company', 'CompanyController');
//PDF company Print
Route::get('generate-company-pdf', 'PDF\GeneratePDFController@companyPDFview')->name('generate-company-pdf');


//Route for ontact person master
Route::resource('person', 'ContactPersonController');
//PDF  Print
Route::get('generate-contact-person-pdf', 'PDF\GeneratePDFController@personsPDFview')->name('generate-contact-person-pdf');

//Route for ontact person master
Route::resource('address', 'AddressController');


Route::get('/anyCompanyData/index','DatatablesController@index');
Route::get('/anyCompanyData','DatatablesController@anyCompanyData');


//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
