<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $data['sett'] = Setting::first();
        return view('web.contact.index')->with($data);
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string',
        ]);



        Message::create([
            'name' => $request->name,
            'email' => $request->name,
            'subject' => $request->name,
            'body' => $request->name,
        ]);

        $request->session()->flash('success','Your Massage Sent Successfully');
        return back();

    }

}
