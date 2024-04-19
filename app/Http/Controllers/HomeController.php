<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function user_detail(){
        return view('userdetail');
    }
    public function skill(){
        $skills=Skill::where('display','1')->get();
        return view('skill',compact('skills'));
    }
    public function project(){
        $projects=Project::where('display','1')->get();
        return view('project',compact('projects'));
    }
}
