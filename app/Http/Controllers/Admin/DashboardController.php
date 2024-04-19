<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     //$this->middleware(['web','auth']);
    // }
    public function __construct()
    {
        $this->folderPath = 'public/personal-info';
        $this->path = public_path('storage/personal-info');
        if (!file_exists($this->path)) {
            Storage::makeDirectory($this->folderPath);
            chmod($this->path, 0755);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function personal_info(){
        $user=User::find(1);
       return view('admin.basic_information.index',compact('user'));
    }

    public function personal_info_update(Request $request){
       // dd($request->all());
        $this->validate($request, [
            'full_name' => 'required|max:255',
            'email' => 'required|email',
            'primary_phone' => 'bail|required|max:15',
            'whatsapp_no' => 'nullable|max:15',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'x_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'address' => 'required',
            'description' => 'nullable',
            'logo' => 'bail|nullable|image|mimes:jpg,jpeg,png',
        ]);

       $user = User::first();
       $user->name = $request->full_name;
       $user->email = $request->email;
       $user->user_detail->phone_number = $request->primary_phone;
       $user->user_detail->whatsapp_no = $request->whatsapp_no;
       $user->user_detail->fb_url = $request->facebook_url;
       $user->user_detail->insta_url = $request->instagram_url;
       $user->user_detail->linkedin_url = $request->linkedin_url;
       $user->user_detail->address = $request->address;
       $user->user_detail->description = $request->description;

        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $filename = 'logo' . time() . '.' . $logo->extension();
            $oldlogo =$user->user_detail->image;

            Storage::putFileAs($this->folderPath, $logo, $filename);

            if ($oldlogo != null) {
                Storage::delete('public/personal-info/' . $oldlogo);
            }

           $user->user_detail->image = $filename;
        }

        $user->save();
        $user->user_detail->save();
        return back()->with('status','User Information Updated Successfully!!');
    }
}
