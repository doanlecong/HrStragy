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


// Route public
Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/about-us.html',function (){
    return view('aboutus');
})->name('aboutus');

Route::get('/job-search.html', function (){
    return view('job_search');
})->name('jobsearch');

Route::get('/our-service.html', function (){
    return view('ourservices');
})->name('ourservice');
Route::get('view-service.html',function () {
    return view('view_service');
})->name('view_service');

Route::get('/client-service.html', function () {
    return view('');
})->name('clientservice');

Route::get('/our-cooperate.html',function (){
    return view('ourcooperate');
})->name('ourcooperate');

Route::get('/contact.html',function (){
    return view('contactus');
})->name('contact');

// Route authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
