<?php

/*
    'Job Seeker' //role_id =1
    'Job Provider' //role_id = 2
*/

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

#--------------------------------------------------------------------------------------------------------------------------------------------------------#

Route::group(['middleware' => ['auth', 'verified']], function () {

    //----------------------------------------------------------------------((DEFAULT))
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('notice', 'NoticeController');
    Route::get('testimonial/approve/{id}','TestimonialController@approve')->name('testimonial.approve');
    Route::get('testimonial/disapprove/{id}','TestimonialController@disapprove')->name('testimonial.disapprove');
    Route::resource('testimonial', 'TestimonialController')->except('show');

    //------------------------------------------------------------------------------------------------------************((JOB SEEKER))

    //---------------------------------------------------------------------((SEARCH JOBS))
    Route::get('/search', function () {

        $excluding_ids = DB::table('jobs')
            ->join('applicants', 'jobs.id', '=', 'applicants.job_id')
            ->where('status', 'hired')
            ->orWhere('status', '')->pluck('applicants.job_id');


        if (!request('category_id')) {
            $jobs = \App\Job::whereNotIn('id', $excluding_ids->toArray())->where('title', 'like', '%' . request("query") . '%')->get();
            return view('Job_Seeker.search')->with('jobs', $jobs)
                ->with('categories', \App\JobCategory::all());
        } else {
            $jobs = \App\Job::whereNotIn('id', $excluding_ids->toArray())->where('title', 'like', '%' . request("query") . '%')->where('category_id', '=', request('category_id'))->get();
            return view('Job_Seeker.search')->with('jobs', $jobs)
                ->with('categories', \App\JobCategory::all());
        }

        /*if (!request('category_id')) {
            $jobs = \App\Job::where('title', 'like', '%' . request("query") . '%')->get();
            return view('Job_Seeker.search')->with('jobs', $jobs)
                ->with('categories', \App\JobCategory::all());
        } else {
            $jobs = \App\Job::where('title', 'like', '%' . request("query") . '%')->where('category_id', '=', request('category_id'))->get();
            return view('Job_Seeker.search')->with('jobs', $jobs)
                ->with('categories', \App\JobCategory::all());
        }*/
    });
    //---------------------------------------------------------------------((ALL JOBS))
    Route::get('seeker/all_jobs', 'SeekerController@index')->name('all_jobs');
    Route::get('seeker/my_jobs', 'SeekerController@myJobs')->name('my_jobs');

    //---------------------------------------------------------------------((BOOKMARK JOBS))
    Route::get('seeker/add_bookmark/{id}', 'BookmarksController@addBookmark')->name('add_bookmark');
    Route::get('seeker/remove_bookmark/{id}', 'BookmarksController@removeBookmark')->name('remove_bookmark');
    Route::get('seeker/my_bookmarks', 'BookmarksController@myBookmarks')->name('my_bookmarks');

    //---------------------------------------------------------------------((MAIN PROFILE))
    Route::get('seeker/profile/{name}', 'SeekerController@profile')->name('seeker_profile');
    Route::post('seeker/profile/store', 'SeekerController@store')->name('seeker_profile.store');
    Route::post('seeker/profile/update', 'SeekerController@update')->name('seeker_profile.update');
    Route::post('seeker/profile/avatarStore', 'SeekerController@storeAvatar')->name('seeker_profile.avatarStore');

    //---------------------------------------------------------------------((SKILL SECTION))
    Route::post('seeker/skills/store', 'SkillsController@store')->name('seeker_skill.store');
    Route::post('seeker/skills/update', 'SkillsController@update')->name('seeker_skill.update');

    //---------------------------------------------------------------------((WORK SECTION))
    Route::post('seeker/work/store', 'WorksController@store')->name('seeker_work.store');
    Route::post('seeker/work/update', 'WorksController@update')->name('seeker_work.update');
    Route::post('seeker/work/delete', 'WorksController@delete')->name('seeker_work.delete');

    //---------------------------------------------------------------------((EDUCATION SECTION))
    Route::post('seeker/education/store', 'EducationsController@store')->name('seeker_education.store');
    Route::post('seeker/education/update', 'EducationsController@update')->name('seeker_education.update');
    Route::post('seeker/education/delete', 'EducationsController@delete')->name('seeker_education.delete');


    //-----------------------------------------------------------------------------------------------------------************((JOB PROVIDER))

    //---------------------------------------------------------------------((MAIN PROFILE))
    Route::get('provider/company/{name}', 'ProvidersController@company')->name('provider_company');
    Route::post('provider/company/store', 'ProvidersController@store')->name('provider_company.store');
    Route::post('provider/company/update', 'ProvidersController@update')->name('provider_company.update');
    Route::post('provider/company/storeLogo', 'ProvidersController@storeLogo')->name('provider_company.storeLogo');
    Route::get('company/{id}', 'ProvidersController@show')->name('provider_company.show');

    //---------------------------------------------------------------------((JOB SECTION))
    Route::resource('jobs', 'JobsController');
    //---------------------------------------------------------------------((APPLICANT SECTION))
    Route::get('application/show/{id}', 'ApplicantController@show')->name('application_show');
    Route::get('applicant/view/{id}', 'ApplicantController@view')->name('applicant_view');
    Route::post('application/store/{id}', 'ApplicantController@store')->name('application_store');

    //---------------------------------------------------------------------((JOB PROPOSAL))
    Route::get('proposal/shortlist/{id}', 'ProposalsController@shortlist')->name('proposal_shortlist');
    Route::get('proposal/{id}/{user}/hire', 'ProposalsController@hire')->name('proposal_hire');
    Route::get('proposal/{id}/{user}/reject', 'ProposalsController@reject')->name('proposal_reject');

    //-----------------------------------------------------------------------------------------------------------************((SITE ADMIN))
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('admin/all_users', 'AdminController@index')->name('admin.all_users');
    Route::get('admin/banProvider/{id}', 'AdminController@banProvider')->name('admin.ban_provider');
    Route::get('admin/unbanProvider/{id}', 'AdminController@unbanProvider')->name('admin.unban_provider');
    Route::get('admin/banSeeker/{id}', 'AdminController@banSeeker')->name('admin.ban_seeker');
    Route::get('admin/unbanSeeker/{id}', 'AdminController@unbanSeeker')->name('admin.unban_seeker');

});
