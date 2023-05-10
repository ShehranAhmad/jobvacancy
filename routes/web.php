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

Route::get('/dashboard','DashboardController@index')->middleware(['auth'])->name('dashboard');
Route::post('/forget-password','DashboardController@forgetPassword')->name('email.password');
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/','HomeController@index')->name('index');
Route::get('/home','HomeController@index')->name('home');
Route::get('/about','HomeController@about')->name('about');
Route::get('/contact','HomeController@contact')->name('contact');
Route::get('/blogs','HomeController@blog')->name('blog');
Route::get('/blog-detail/{slug?}','HomeController@blogDetail')->name('blog.detail');
Route::get('/events','HomeController@event')->name('event');
Route::get('/event-detail/{slug?}','HomeController@eventDetail')->name('event.detail');
Route::get('/job/detail/{slug?}','SearchController@jobDetail')->name('job.detail');
Route::get('/company-detail/{slug?}','SearchController@companyDetail')->name('company.detail');
Route::get('/companies','HomeController@companies')->name('companies');
Route::post('/submit-inquiry','HomeController@inquiryStore')->name('submit.inquiry');
Route::get('/inquiry-submitted','HomeController@inquirySubmitted')->name('inquiry.submitted');



//   Search

Route::get('/jobs','SearchController@search')->name('search');
Route::get('/find-skill','SearchController@findSkill')->name('find.skill');
Route::get('/find-company','SearchController@findCompany')->name('find.company');


    //Employee

Route::prefix('employee')->name('employee.')->middleware(['employee','auth'])->namespace('Employee')->group(function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('profile','ProfileController@profile')->name('profile');
    Route::post('profile-update','ProfileController@updateProfile')->name('update.profile');
    Route::post('update/password','ProfileController@updatePassword')->name('update.password');


    Route::post('update-profile/picture','ProfileController@updatePicture')->name('update.picture');
    Route::get('delete/profile','ProfileController@profileDelete')->name('delete.pic');
    Route::get('/favorite/jobs','DashboardController@favorites')->name('favorites');
    Route::get('/follow/companies','DashboardController@follow')->name('follow');
    Route::get('/remove-favorite/job/{id?}','DashboardController@removeFavorites')->name('remove.job');



    Route::get('/follow-company','FollowupController@follow')->name('followup.company');
    Route::get('/unfollow-company','FollowupController@unfollow')->name('unfollowup.company');
    Route::get('/favorite-job','FollowupController@favorite')->name('favorite-job');


});





Route::prefix('admin')->name('admin.')->middleware(['admin','auth'])->namespace('Admin')->group(function(){

    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::post('profile-update','AdminController@updateProfile')->name('update.profile');

    Route::get('/inquiries', 'AdminController@inquiries')->name('inquiries');
    Route::get('/inquiry-detail/{id?}', 'AdminController@inquiriesDetail')->name('inquiries.detail');
    Route::get('/inquiry-close/{id?}', 'AdminController@inquiriesClose')->name('inquiries.close');




    Route::get('/companies', 'CompanyController@list')->name('company');
    Route::get('/add-company', 'CompanyController@add')->name('add.company');
    Route::post('/store-company', 'CompanyController@store')->name('company.store');
    Route::post('/update-company', 'CompanyController@update')->name('company.update');
    Route::get('/detail-company/{slug?}', 'CompanyController@detail')->name('company.detail');
    Route::get('/edit-company/{slug?}', 'CompanyController@edit')->name('company.edit');
    Route::get('/block-company/{id?}', 'CompanyController@block')->name('company.block');
    Route::get('/unblock-company/{id?}', 'CompanyController@unblock')->name('company.unblock');
    Route::get('/delete-company/{id?}', 'CompanyController@delete')->name('company.delete');

    Route::get('/jobs','JobController@list')->name('job');
    Route::get('/add-job','JobController@add')->name('job.add');
    Route::post('/store-job','JobController@store')->name('job.store');
    Route::post('/update-job','JobController@update')->name('job.update');
    Route::get('/detail-job/{slug?}', 'JobController@detail')->name('job.detail');
    Route::get('/edit-job/{slug?}', 'JobController@edit')->name('job.edit');
    Route::get('/job-job/{id?}', 'JobController@delete')->name('job.delete');

    Route::name('blogs.')->group(function () {
        Route::get('blogs_add', 'BlogController@add')->name('add');
        Route::post('store_blogs/{id?}', 'BlogController@store')->name('store');
        Route::get('blogs_list', 'BlogController@list')->name('list');
        Route::get('edit_blog/{id?}', 'BlogController@edit')->name('edit');
        Route::get('delete_blog/{id?}', 'BlogController@delete')->name('delete');
        Route::get('blog_visibility/{id}/{visibility}', 'BlogController@blog_visibility')->name('change.visibility');
    });

    Route::name('event.')->group(function () {
        Route::get('event-add', 'EventController@add')->name('add');
        Route::post('store-event/{id?}', 'EventController@store')->name('store');
        Route::post('update-event', 'EventController@update')->name('update');
        Route::get('event-list', 'EventController@list')->name('list');
        Route::get('edit-event/{id?}', 'EventController@edit')->name('edit');
        Route::get('delete-event/{id?}', 'EventController@delete')->name('delete');
    });





    Route::get('/categories','ConfigurationController@categoryList')->name('category');
    Route::get('/add-category','ConfigurationController@categoryAdd')->name('category.add');
    Route::get('/edit-category/{id}','ConfigurationController@categoryEdit')->name('category.edit');
    Route::get('/delete-category/{id}','ConfigurationController@categoryDelete')->name('category.delete');
    Route::post('/store-category','ConfigurationController@categoryStore')->name('category.store');
    Route::post('/update-category','ConfigurationController@categoryUpdate')->name('category.update');


    Route::get('/skills','ConfigurationController@skillList')->name('skill');
    Route::get('/add-skill','ConfigurationController@skillAdd')->name('skill.add');
    Route::get('/edit-skill/{id}','ConfigurationController@skillEdit')->name('skill.edit');
    Route::get('/delete-skill/{id}','ConfigurationController@skillDelete')->name('skill.delete');
    Route::post('/store-skill','ConfigurationController@skillStore')->name('skill.store');
    Route::post('/update-skill','ConfigurationController@skillUpdate')->name('skill.update');
    Route::get('/find-skills','ConfigurationController@findSkill')->name('find.skill');




    Route::get('/settings', 'SettingController@index')->name('setting.index');
    Route::get('setting/meta-tags', 'SettingController@metaTags')->name('setting.meta.tags');
    Route::post('settings/update', 'SettingController@update')->name('setting.update');
    Route::get('top/companies', 'SettingController@topCompanies')->name('setting.logos');
    Route::get('add-top/hiring-company', 'SettingController@topCompanyAdd')->name('add.setting.hiring.company');
    Route::post('store-top/hiring-company', 'SettingController@topCompanyStore')->name('store.setting.hiring.company');
    Route::post('delete-top/hiring-company/{id?}', 'SettingController@topCompanyDelete')->name('delete.setting.hiring.company');
});


Route::get('/google','SocialiteController@joinWithGoogle')->name('google');
Route::get('/redirect-google','SocialiteController@googleRedirect');
