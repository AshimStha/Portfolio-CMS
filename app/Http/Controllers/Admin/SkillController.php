<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
   
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('admin.skills.list', compact('skills'));
    }
    public function add(){
        return view('admin.skills.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:skills,title',
            'percentage' => 'required|min:1|max:100',
        ]);

        $skill = new Skill();
        $skill->title = $request->title;
        $skill->percentage=$request->percentage;
        $skill->display=$request->display?'1':'0';
        $skill->save();

        return to_route('admin.skills.index')->with('status', 'Skill created successfully!');
    }
    public function edit($id)
    {
        $skill = Skill::find(base64_decode($id));
        if (is_null($skill) || empty($skill)) {
            return to_route('admin.skills.index')->with('error', 'Skill Not Found');
        }
        return view('admin.skills.edit')->with('skill', $skill);
    }
    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);

        if (is_null($skill) || empty($skill)) {
            return back()->with('error', 'Skill Not Found');
        }

        $request->validate([
            'title' => 'required',
            'percentage' => 'required|min:1|max:100',
        ]);

        $skill->percentage = $request->percentage;

        $skill->display=$request->display?'1':'0';
        $skill->title = $request->title;

        $skill->update();

        return to_route('admin.skills.index')->with('status', 'skill Updated successfully!');
    }

    public function destroy(Request $request)
    {
        $skill = Skill::where('id', $request->id)->firstOrFail();

        $skill->delete();
    }
}
