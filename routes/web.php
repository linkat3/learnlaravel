<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // $jobs = Job::with('employer')-> get();
    $jobs = Job::with('employer')->latest()->paginate(5); //paginando los resultados, recordar pasarlos al view
    // se puede usar simplePaginate para mostrar solo previus/next
    //$jobs = Job::all();
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
    //drop and die dd($jobs[0]->title);

});
Route::get('/jobs/create', function () {
    return view('jobs.create');
});


//wildcard 
Route::get('/jobs/{id}', function ($id) {
        // dd($id);
    ;
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // dd(request()->all()); mirar que guarde o pase lo que queremos
    // request()->all();
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});
