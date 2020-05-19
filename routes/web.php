<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/user/create', 'Auth\RegisterController@create')->name('user.create');
Route::get('/verify/account/{token}', 'Auth\RegisterController@verifyAccount')->name('verify.account');

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::any('/password/change/', 'Auth\ResetPasswordController@showResetForm')->name('password.change');
Route::post('/password/update', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::any('/profile/ppic/change', 'EditProfileController@picture')->name('profile.ppic.change');
Route::get('/profile/create', 'CandidateProfileController@create')->name('profile.create');
Route::get('/profile/create/summary', 'CandidateProfileController@createSummary')->name('profile.create.summary');
Route::get('/profile/create/education', 'CandidateProfileController@createEducation')->name('profile.create.education');
Route::get('/profile/create/work', 'CandidateProfileController@createWork')->name('profile.create.work');

Route::post('/add/contact/details', 'CandidateProfileController@addcontact')->name('add.contact.details');
Route::post('/add/profile/summary', 'CandidateProfileController@addSummary')->name('add.profile.summary');
Route::post('/add/profile/feducation', 'CandidateProfileController@addFurtherEducation')->name('add.profile.feducation');
Route::post('/add/profile/proffesion', 'CandidateProfileController@addProffession')->name('add.profile.proffesion');
Route::post('/add/profile/work', 'CandidateProfileController@addWork')->name('add.profile.work');
Route::post('/add/profile/interest', 'CandidateProfileController@addInterest')->name('add.profile.interest');

Route::post('/delete/profile/feducation', 'CandidateProfileController@deleteFurtherEducation')->name('delete.profile.feducation');
Route::post('/delete/profile/proffesion', 'CandidateProfileController@deleteProffession')->name('delete.profile.proffesion');
Route::post('/delete/profile/work', 'CandidateProfileController@deleteWork')->name('delete.profile.work');

Route::post('/edit/contact/details', 'EditProfileController@editContact')->name('edit.contact.details');
Route::post('/edit/profile/summary', 'EditProfileController@editSummary')->name('edit.profile.summary');
Route::post('/edit/profile/feducation', 'EditProfileController@editFurtherEducation')->name('edit.profile.feducation');
Route::post('/edit/profile/proffesion', 'EditProfileController@editProffession')->name('edit.profile.proffesion');
Route::post('/edit/profile/work', 'EditProfileController@editWork')->name('edit.profile.work');
Route::post('/edit/profile/interest', 'EditProfileController@editInterest')->name('edit.profile.interest');

Route::get('/view/cv', 'CurriculumVitaeController@view')->name('view.cv');
Route::any('/upload/cv', 'CurriculumVitaeController@upload')->name('upload.cv');
Route::get('/export/cv', 'CurriculumVitaeController@export')->name('export.cv');

Route::get('jobs/jobapply/{id}','JobAdController@apply')->name('jobs.jobapply');
Route::post('/jobs/jobapply/sendtest', 'JobAdController@sendTest')->name('jobs.jobapply.sendtest');
Route::get('jobs/my-applications','JobAdController@applications')->name('jobs.my-applications');
Route::get('jobs/applied/{id}','JobAdController@applied')->name('jobs.applied');

Route::post('ticket-send','NotificationController@send')->name('ticket.send');
Route::get('tickets','NotificationController@tickets')->name('tickets');

Route::get('/markAsRead', function(){

	auth()->user()->unreadNotifications->markAsRead();

	return redirect()->back();

})->name('markAsRead');

Route::middleware(['auth', 'verified','admin'])->prefix('admin')->group(function () {


Route::any('dashboard/json', 'DashboardController@json')->name('dashboard.json');
Route::any('dashboard', 'DashboardController@dashboard')->name('dashboard');

Route::get('jobAds/json', 'JobAdController@json')->name('jobAds.json');
Route::resource('jobAds', 'JobAdController');


Route::get('users/json', 'UserController@json')->name('users.json');
Route::resource('users', 'UserController');
Route::any('staff/profile', 'UserController@profile')->name('staff.profile');
Route::any('staff/profile/image/{id}', 'UserController@profileImage')->name('staff.profile.image');
Route::any('users','UserController@index')->name('users.index');
    
Route::delete('jobAds/remove_job/{id}','JobAdController@removeJob')->name('jobAds.remove_job');

Route::get('candidate/cv/{id}', 'CVManagementController@candidateCV')->name('candidateCV');
Route::any('comment/cv', 'CVManagementController@commentCV')->name('comment.cv');


Route::get('tickets','NotificationController@admintickets')->name('tickets');
Route::post('response/ticket','NotificationController@response')->name('response.ticket');
Route::get('staff/notification/{id}', 'NotificationController@staffNotification')->name('staff.notifications');

/* categories */
Route::get('industry/add', 'IndustryController@create')->name('industry.create');
Route::post('industry/store', 'IndustryController@store')->name('industry.store');
Route::get('industry/json', 'IndustryController@json')->name('industry.json');
Route::get('industry', 'IndustryController@index')->name('industry.index');
Route::get('industry/edit/{id}', 'IndustryController@edit')->name('industry.edit');
Route::get('industry/view/{id}', 'IndustryController@view')->name('industry.view');
Route::post('industry/update/{id}', 'IndustryController@update')->name('industry.update');

});

