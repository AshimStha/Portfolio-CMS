@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('admin.projects.update',$project->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card m-1">
            <div class="card-header">
                <h3>Edit Projects</h3>
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
                            <input type="text" class="form-control" value="{{ old('title',$project->title) }}" name="title"
                                placeholder="Projects Title" required />
    
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="col-md-3 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="display" value="1" @if($project->display==1) checked @endif>
                                </div>
                            </div>
                            <input type="button " class="form-control bg-indigo text-muted" value="Display" disabled>
                        </div>
                        @error('display')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-image fa-lg"></i> &nbsp;
                                    Image <span class="text-danger">*</span>
                                </span>
                            </div>
                            <input type="file" name="image" class="bg-primary text-white form-control dropify"
                                value="{{ old('image') }}" data-show-remove="false" data-default-file="{{ asset('storage/project/' . $project->image) }}"
                                 accept=".jpg,.jpeg,.png">
                        </div>
                        @error('feature_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div style="font-size: 12px; color: gray;">
                            <small><strong>Recommended Image</strong></small><br>
                            <small>Resolution : <strong>600px X
                                    600px</strong></small><br>
                                    <small>Accept : <strong>png,jpeg,jpg</strong></small><br>
                            <small>File Size : <strong>Smaller than or Equal to 9MB
                                    ( ≤ 9MB)</strong></small>
                        </div>
    
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-file-text-o"></i> &nbsp;Description <span
                                        class="text-danger">*</span>
                                </span>
                            </div>
                            <textarea type="text" class="form-control" id="ckeditor" name="description" placeholder="Short Description" rows="4"
                                required>{{ old('description',$project->description) }}</textarea>
                        </div>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
       
        
        <div class="clearfix"></div>
        <div class="row card-footer">
            <div class="col-md-12 text-right">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Cancel</a>
    
                <button type="submit" class="btn btn-primary">
                    Save Change
                </button>
            </div>
        </div>
    </form>
</div>
@endsection