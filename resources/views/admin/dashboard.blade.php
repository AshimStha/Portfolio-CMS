@extends('layouts.app')
@section('content')
   <div class="container">
      <div class="row">
        
        <div class="col-md-4">
            <div class="card mb-3">
                <a href="{{route('admin.personal-info.index')}}" class="full-link"></a>
                <div class="row g-0">
                  <div class="col-md-4 d-flex justify-content-md-center align-items-center">
                    <i class="ri-file-list-line" style="font-size:36px;"></i>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Personal Details</h5>
                                      
                                       
                      
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <a href="{{route('admin.skills.index')}}" class="full-link"></a>
                <div class="row g-0">
                  <div class="col-md-4 d-flex justify-content-md-center align-items-center">
                    <i class="ri-list-check-2" style="font-size:36px;"></i>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{App\Models\Skill::count()}}</h5>
                                      
                                        <p class="card-text">Skills</p>
                      
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <a href="{{route('admin.projects.index')}}" class="full-link"></a>
                <div class="row g-0">
                  <div class="col-md-4 d-flex justify-content-md-center align-items-center">
                    <i class="ri-window-fill" style="font-size:36px;"></i>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{App\Models\Project::count()}}</h5>
                                      
                                        <p class="card-text"> Projects</p>
                      
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
   </div>
@endsection
