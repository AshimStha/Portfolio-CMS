@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('admin.skills.update',$skill->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card m-1">
            <div class="card-header">
                <h3>Edit Skills</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-text-width"></i> &nbsp; Title <span class="text-danger">*</span>
                                </span>
                            </div>
                            <input type="text" class="form-control" value="{{ old('title',$skill->title) }}" name="title"
                                placeholder="Skills Title" required />
    
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="col-md-3 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="display" value="1" {{$skill->display==1? 'checked':''}}>
                                </div>
                            </div>
                            <input type="button " class="form-control bg-indigo text-muted" value="Display" disabled>
                        </div>
                        @error('display')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-text-width"></i> &nbsp; Percentage <span class="text-danger">*</span>
                                </span>
                            </div>
                            <input type="number" min="1" max="100" class="form-control" value="{{ old('percentage',$skill->percentage) }}" name="percentage"
                                placeholder="percentage" required />
    
                        </div>
                        @error('percentage')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
       
        
        <div class="clearfix"></div>
        <div class="row card-footer">
            <div class="col-md-12 text-right">
                <a href="{{ route('admin.skills.index') }}" class="btn btn-danger">Cancel</a>
    
                <button type="submit" class="btn btn-primary">
                    Save Change
                </button>
            </div>
        </div>
    </form>
</div>
@endsection