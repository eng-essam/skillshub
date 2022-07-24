<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('web.profile.index');
    }
}
