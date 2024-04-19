<?php

namespace App\Http\Controllers\Admin;

use App\Models\CropImg;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    protected $folderPath, $path;
    public function __construct()
    {
        $this->folderPath = 'public/project';
        $this->path = public_path('storage/project');
        if (!file_exists($this->path)) {
            Storage::makeDirectory($this->folderPath);
            chmod($this->path, 0755);
        }
    }
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.list', compact('projects'));
    }
    public function add(){
        return view('admin.projects.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:projects,title',
            'description'=>'bail|max:500',
            'image'=>'required|mimes:png,jpg,jpeg|max:10000',
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description=$request->description;
        $project->display=$request->display?'1':'0';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->extension();

            CropImg::resize_crop_images(600, 600, $image, $this->folderPath . '/' . $filename);
            CropImg::resize_crop_images(200, 200, $image, $this->folderPath . '/thumb_' . $filename);

            $project->image = $filename;
        }
        $project->save();

        return to_route('admin.projects.index')->with('status', 'Project created successfully!');
    }
    public function edit($id)
    {
        $project = Project::find(base64_decode($id));
        if (is_null($project) || empty($project)) {
            return to_route('admin.projects.index')->with('error', 'project Not Found');
        }
        return view('admin.projects.edit')->with('project', $project);
    }
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (is_null($project) || empty($project)) {
            return back()->with('error', 'project Not Found');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'image' => 'bail|mimes:png,jpg,jpeg|max:10000',
        ]);

        $project->description = $request->description;

        $project->display=$request->display?'1':'0';
        $project->title = $request->title;
        if ($request->hasFile('image')) {
            $oldImage=$project->image;
            $image = $request->file('image');
            $filename = time() . '.' . $image->extension();

            CropImg::resize_crop_images(600, 600, $image, $this->folderPath . '/' . $filename);
            CropImg::resize_crop_images(200, 200, $image, $this->folderPath . '/thumb_' . $filename);
            if($oldImage){
                Storage::delete($this->folderPath.'/'.$oldImage);
                Storage::delete($this->folderPath.'/thumb_'.$oldImage);
            }
            $project->image = $filename;
        }
        $project->update();

        return to_route('admin.projects.index')->with('status', 'Project Updated successfully!');
    }

    public function destroy(Request $request)
    {
        $project = Project::where('id', $request->id)->firstOrFail();
        $oldImage=$project->image;
        if($oldImage){
            Storage::delete($this->folderPath.'/'.$oldImage);
            Storage::delete($this->folderPath.'/thumb_'.$oldImage);
        }
        $project->delete();
    }
}
