<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use function view;

class Skillcontroller extends Controller
{
    public function show($id){

        $data['skill']=Skill::findOrfail($id);
        $data['paginExam']=$data['skill']->exams()->active()->paginate(12);
        return view('web.skills.show')->with($data);
    }
}
