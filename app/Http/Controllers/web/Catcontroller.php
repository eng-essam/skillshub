<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use function view;

class Catcontroller extends Controller
{
   public function show($id){
       return view('web.cats.show');
   }
}
