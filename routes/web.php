<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
    //drop and die dd($jobs[0]->title);

});

//wildcard 
Route::get('/jobs/{id}', function ($id) {
   // dd($id);
   ;
   $job = Job::find($id);
   return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
