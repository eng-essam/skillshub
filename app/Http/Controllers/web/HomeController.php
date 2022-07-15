<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data['exams'] = Exam::active()->inRandomOrder('5')->paginate(12);
        return view('web.home.index')->with($data);
    }

    public function log()
    {
        Auth::logout();
        redirect(url('/'));
    }
}
