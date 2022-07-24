<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillsController extends Controller
{
    public function index()
    {
        $data['skills'] = Skill::orderBy('id', 'DESC')->paginate(10);
        $data['cats'] = Cat::select('id', 'name')->get();
        return view('admin.skills.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'img' => 'required|image',
            'cat_id' => 'required|exists:cats,id',

        ]);

        $path = Storage::disk('uploads')->put('skills', $request->img);
        Skill::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'cat_id' => $request->cat_id,
            'img' => $path,
        ]);

        $request->session()->flash('msg', 'row added successfully');
        return back();
    }

    public function delete(Skill $skill, Request $request)
    {
        try {
            $skill->delete();
            Storage::disk('uploads')->delete($skill->img);
            $msg = "row  deleted successfully";
        } catch (Exception $e) {
            $msg = "can't delete this row";
        }

        $request->session()->flash('msg', $msg);

        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:skills,id',
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'img' => 'nullable|image',
            'cat_id' => 'required|exists:cats,id',
        ]);

        $skill = Skill::findOrFail($request->id);
        $path = $skill->img;
        if ($request->hasFile('img')) {
            Storage::disk('uploads')->delete($path);
            $path = Storage::disk('uploads')->put('skills', $request->file('img'));
        }

        $skill->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'cat_id' => $request->cat_id,
            'img' => $path,
        ]);

        $request->session()->flash('msg', 'row updated successfully');

        return back();
    }

    public function toggle(Skill $skill)
    {
        $skill->update([
            'active' => !$skill->active,
        ]);
        return back();
    }

}
