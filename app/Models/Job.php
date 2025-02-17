<?php

namespace App\Models;
use Illuminate\Support\Arr;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {
    use HasFactory;
    protected $table = 'job_listings';
    
    //evita que se puedan insertar datos que no estan en el modelo
    protected $fillable = ['title','salary'];

        // return [
        //     [
        //         'id' => 1,
        //         'title' => 'Director',
        //         'salary' => '$50.000'
        //     ],
        //     [
        //         'id' => 2,
        //         'title' => 'Programmer',
        //         'salary' => '$10.000'
        //     ],
        //     [
        //         'id' => 3,
        //         'title' => 'Teacher',
        //         'salary' => '$40.000'
        //     ],
        // ];
        public function employer()
        {
            return $this->belongsTo(Employer::class);
        }    

    

}