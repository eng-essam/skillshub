<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use function view;

class Skillcontroller extends Controller
{
    public function show($id){
        return view('web.skills.show');
    }
}
