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

    // function to display the user details page
    public function user_detail(){
        return view('userdetail');
    }

    // function to display the skills page for the user
    public function skill(){
        $skills=Skill::where('display','1')->get();
        return view('skill',compact('skills'));
    }

    // function to display the projects by the user
    public function project(){
        $projects=Project::where('display','1')->get();
        return view('project',compact('projects'));
    }
}
