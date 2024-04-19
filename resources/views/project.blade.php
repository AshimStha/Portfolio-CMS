@extends('layouts.app')
@section('content')
   <div class="container">
      <div class="row">
        <h1>My Projects</h1>
        @foreach ($projects as $project)
        
         <div class="col-md-4 mb-2">
            <div class="card">
                <img src="{{asset('storage/project/'.$project->image)}}" class="card-img-top" alt="{{$project->title}}">
                <div class="card-body">
                  <h5 class="card-title">{{$project->title}}</h5>
                  <div class="card-text">
                    {!!$project->description!!}
                  </div>
                </div>
              </div>
         </div>
           
        @endforeach
      </div>
   </div>
@endsection