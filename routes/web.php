<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

//index
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

//Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});


//wildcard 
Route::get('/jobs/{id}', function ($id) {
        // dd($id);
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

//Store , crear o guardar
Route::post('/jobs', function () {
    // dd(request()->all()); mirar que guarde o pase lo que queremos
    // request()->all();
    request()->validate([
        'title' => ['required','min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

//Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

//Update
Route::patch('/jobs/{id}', function ($id) {
    //validate
    request()->validate([
        'title' => ['required','min:3'],
        'salary' => ['required']
    ]);
    //authorize (on hold)

    //update the job
    $job = Job::findOrFail($id); //por si no hay un id o es null
    
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);    
    // and persist
    // redirect
    // return redirect('/jobs/', $job->id);
    return redirect('/jobs');

});

//Delete, destroy
Route::delete('/jobs/{id}', function ($id) {
    //authorize
    //delete the job
    $job = Job::findOrFail($id);
    $job->delete();
    //redirect
    return redirect('/jobs');

});

Route::get('/contact', function () {
    return view('contact');
});
