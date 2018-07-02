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
Route::get('/', 'PublicPageController@welcome')->name('homepage');
Route::get('/home', function () {
    return redirect()->route('home');
});
Route::get('/not-found-404.html', 'PublicPageController@notFound')->name('notFound_404');

Route::get('/about-us.html','PublicPageController@aboutUs')->name('aboutus');

Route::get('/job-search.html', 'PublicPageController@jobSearch')->name('jobsearch');

Route::get('/job-search/view-job/{slug}', 'PublicPageController@viewJobSearch')->name('jobsearch.viewJob');

Route::get('/our-service.html','PublicPageController@ourService')->name('ourservice');

Route::get('/our-service/view-service.html','PublicPageController@viewService')->name('view_service');

Route::get('/client-service.html', 'PublicPageController@clientService')->name('clientservice');

Route::get('/client-service/view-type-client-service.html','PublicPageController@viewTypeClientService')->name('view_type_client_service');

Route::get('/client-service/view-client-service.html', 'PublicPageController@viewClientService')->name('view_client_service');
Route::get('/customer-story.html','PublicPageController@customerStory')->name('customerStory');
Route::get('/customer-story/view-story.html','PublicPageController@viewCustomerStory')->name('viewCustomerStory');


Route::get('/our-cooperate.html', 'PublicPageController@ourCooperate')->name('ourcooperate');
Route::get('/our-cooperate/show.html','PublicPageController@showCooperate')->name('ourcooperate.show');


Route::get('/contact/candidate.html','PublicPageController@candidate')->name('contactCandidate');
Route::get('/contact/guest.html','PublicPageController@guest' )->name('contactGuest');


Route::get('/logout', function() {
    auth()->logout();
    return redirect('/');
})->name('logout');

//Contact Info Us Route
Route::post('/contact/send-contact', 'ContactUsPublicController@storeContact')->name('contactus.sendinfo');
Route::post('/contact/send-contact-candidate','ContactUsPublicController@storeCandidateContact')->name('contactus.storeCandidateInfo');
Route::post('/contact/send-contact-guest','ContactUsPublicController@storeGuestContact')->name('contactus.storeGuestInfo');
Route::post('contact/mail_subscribe','ContactUsPublicController@storeInMailSubscribe')->name('contactus.mailSubscribe');

// Route authentication
Auth::routes();

Route::get('/authenticated', 'HomeController@index')->name('home');
Route::middleware(['check_session','auth'])->prefix('authenticated')->group(function () {
    Route::get('404', function (){
        return view('layouts.404');
    })->name('404');
    Route::get('change-password', 'ChangeMyInfoController@changePassword')->name('change_info.password');
    Route::post('change-password/store','ChangeMyInfoController@storePassword')->name('change_info.store_password');


    Route::get('dashboardAdmin', 'DashboardController@index')->name('dashboard');
    Route::resource('user', 'UserController');
    Route::get('user/{id}/delete','UserController@delete')->name('user.delete');
    Route::resource('role', 'RoleController');
    Route::resource('permission','PermissionController');


    Route::get('company_info/view_aboutus','AboutUsController@index')->name('viewAboutUs');
    Route::get('company_info/edit_aboutus','AboutUsController@edit')->name('editAboutUs');
    Route::post('company_info/update_aboutus','AboutUsController@updateInfo')->name('updateAboutUs');


    Route::resource('our_service','OurServiceController');
    Route::get('our_service/{id}/view_instant','OurServiceController@viewInstant')->name('our_service.viewInstant');
    Route::get('our_service/{id}/delete','OurServiceController@delete')->name('our_service.delete');

    Route::resource('client_service','ClientServiceController');
    Route::get('client_service/{id}/view','ClientServiceController@viewInstant')->name('client_service.viewInstant');
    Route::get('client_service/{id}/delete','ClientServiceController@delete')->name('client_service.delete');


    Route::resource('type_client_service','TypeClientServiceController');
    Route::get('type_client_service/{id}/view','TypeClientServiceController@viewInstant')->name('type_client_service.viewInstant');
    Route::get('type_client_service/{id}/delete','TypeClientServiceController@delete')->name('type_client_service.delete');

    Route::resource('customer_story','CustomerStoryController');
    Route::get('customer_story/{id}/view','CustomerStoryController@viewInstant')->name('customer_story.viewInstant');
    Route::get('customer_story/{id}/delete','CustomerStoryController@delete')->name('customer_story.delete');
    Route::get('customer_story/{id}/toggle-show','CustomerStoryController@toggleShow')->name('customer_story.toggleShow');
    Route::get('customer_story_search/search','CustomerStoryController@searchCustomerStory')->name('customer_story.search');


    Route::resource('cooperate', 'CooperateController');
    Route::get('cooperate/{id}/view','CooperateController@viewInstant')->name('cooperate.viewInstant');
    Route::get('cooperate/changeOrder','CooperateController@getNewDataOrder')->name('cooperate.getNewOrder');

    Route::get('cooperate/{id}/delete','CooperateController@delete')->name('cooperate.delete');
    Route::get('cooperate/{id}/move-up', 'CooperateController@moveUp')->name('cooperate.moveUp');
    Route::get('cooperate/{id}/move-down', 'CooperateController@moveDown')->name('cooperate.moveDown');
    Route::get('cooperate/{id}/toggle-show','CooperateController@toggleShow')->name('cooperate.toggleShow');

    Route::resource('/job', 'JobManagerController');
    Route::get('job/company/{company_id}/create','JobManagerController@createJobCompany')->name('job.createJobForCompany');
    Route::get('job/{id}/view','JobManagerController@viewInstant')->name('job.viewInstant');
    Route::get('job/{id}/toggle-show','JobManagerController@toggleShow')->name('job.toggleShow');
    Route::get('job/{id}/delete','JobManagerController@delete')->name('job.delete');
    Route::post('job_check/check-slug','JobManagerController@checkSlug')->name('job.checkSlug');
    Route::post('job_check/check-name', 'JobManagerController@checkName')->name('job.checkName');


    Route::resource('job_type','JobTypeController');
    Route::get('job_type/{id}/view','JobTypeController@viewInstant')->name('job_type.viewInstant');
    Route::get('job_type/{id}/delete','JobTypeController@delete')->name('job_type.delete');
    Route::get('job_type/{id}/toggle-show','JobTypeController@toggleShow')->name('job_type.toggleShow');
    Route::post('job_type_find/find-relate-data', 'JobTypeController@findRelateData')->name('job_type.findRelate');


    Route::resource('job_cate','JobCategoryController');
    Route::get('job_cate/{id}/view','JobCategoryController@viewInstant')->name('job_cate.viewInstant');
    Route::get('job_cate/{id}/delete','JobCategoryController@delete')->name('job_cate.delete');
    Route::get('job_cate/{id}/toggle-show','JobCategoryController@toggleShow')->name('job_cate.toggleShow');

    Route::resource('job_level','JobLevelController');
    Route::get('job_level/{id}/view','JobLevelController@viewInstant')->name('job_level.viewInstant');
    Route::get('job_level/{id}/delete','JobLevelController@delete')->name('job_level.delete');
    Route::get('job_level/{id}/toggle-show','JobLevelController@toggleShow')->name('job_level.toggleShow');


    Route::resource('company_job','CompanyController');
    Route::get('company_job/{id}/view','CompanyController@viewInstant')->name('company_job.viewInstant');
    Route::get('company_job_search/search','CompanyController@searchCompany')->name('company_job.search');
    Route::get('company_job/{id}/toggle-show','CompanyController@toggleShow')->name('company_job.toggleShow');
    Route::get('company_job/{id}/relate-job','CompanyController@relateJob')->name('company_job.relateJob');
    Route::get('company_job/{id}/delete','CompanyController@delete')->name('company_job.delete');


    Route::resource('country','CountryController');
    Route::get('country/{id}/view', 'CountryController@viewInstant')->name('country.viewInstant');
    Route::get('country/{id}/delete', 'CountryController@delete')->name('country.delete');
    Route::get('country/{id}/toggle-show','CountryController@toggleShow')->name('country.toggleShow');
    Route::post('country-find/find-province', 'CountryController@findRelateData')->name('country.findRelate');


    Route::resource('province','ProvinceController');
    Route::get('province/{id}/view', 'ProvinceController@viewInstant')->name('province.viewInstant');
    Route::get('province/{id}/delete', 'ProvinceController@delete')->name('province.delete');
    Route::get('province/{id}/toggle-show','ProvinceController@toggleShow')->name('province.toggleShow');
    Route::post('province-find/relate-district','ProvinceController@findRelateDistrict')->name('province.relateDistrict');

    Route::resource('district','DistrictController');
    Route::get('district/{id}/view', 'DistrictController@viewInstant')->name('district.viewInstant');
    Route::get('district/{id}/delete', 'DistrictController@delete')->name('district.delete');
    Route::get('district/{id}/toggle-show','DistrictController@toggleShow')->name('district.toggleShow');


    Route::resource('contactus', 'ContactUsController');
    Route::get('contactus/{id}/view', 'ContactUsController@viewInstant')->name('contactus.viewInstant');
    Route::get('contactus/{id}/delete','ContactUsController@delete')->name('contactus.delete');
    Route::get('contactus/{id}/toggle-read', 'ContactUsController@toggleRead')->name('contactus.toggleRead');
    Route::get('contactus_search/search','ContactUsController@searchContact')->name('contactus.search');

    Route::resource('candidates', 'CandidateController');
    Route::get('candidates/{id}/toggle-read', 'CandidateController@toggleRead')->name('candidate.toggleRead');
    Route::get('candidates/{id}/view', 'CandidateController@viewInstant')->name('candidate.viewInstant');
    Route::get('candidates/{id}/delete','CandidateController@delete')->name('candidate.delete');
    Route::get('candidates_search/search','CandidateController@searchContact')->name('candidate.search');

    Route::resource('guest_contact', 'GuestController');
    Route::get('guest_contact/{id}/toggle-read', 'GuestController@toggleRead')->name('guest_contact.toggleRead');
    Route::get('guest_contact/{id}/view', 'GuestController@viewInstant')->name('guest_contact.viewInstant');
    Route::get('guest_contact/{id}/delete','GuestController@delete')->name('guest_contact.delete');
    Route::get('guest_contact_seach/search','GuestController@searchContact')->name('guest_contact.search');


    Route::get('mail_subscriber/index','MailSubscriberController@index')->name('mailsubscriber.index');
    Route::get('mail_subscriber/{id}/delete','MailSubscriberController@delete')->name('mailsubscriber.delete');
});
