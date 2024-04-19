@extends('layouts.app')
@section('content')
<style>
    .pbar-flex-1 {
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: center;
}

.progress {
  flex-grow: 1;
}

.pbar-mr-2 {
  margin-right: .2rem;
  display: block;
  font-weight: 600;
}
</style>
<div class="container">
    <div class="row">
      <div class="col-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7 mx-auto">
        <div class="Myskill py-5">
          <h1>My Skills</h1>
          @foreach($skills as $skill)
           <div class="pbar-flex-1">
              <span class="pbar-mr-2">{{$skill->title}}</span>
                 <div class="progress">
                   <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$skill->percentage}}%;" aria-valuenow="{{$skill->percentage}}" aria-valuemin="0" aria-valuemax="{{$skill->percentage}}">{{$skill->percentage}}%</div>
                 </div>
           </div>  
           @endforeach

      </div>
    </div>
  </div>
@endsection