<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use function view;

class Examcontroller extends Controller
{
    public function show($id){
        return view('web.exam.show');
    }

    public function question($id){
        return view('web.exam.question');
    }
}
