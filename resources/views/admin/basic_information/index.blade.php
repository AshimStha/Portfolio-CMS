@extends('layouts.app')
@section('content')
   <div class="container">
      <div class="row">
        
   
        <form method="POST" action="{{ route('admin.personal-info.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="body">
            
                    <div class="card border mb-2">
                        <div class="card-header mb-2">
                            <label class="title mb-0">
                                <h6 class="custom-heading custom-color mb-0 p-1"><i class="fa fa-info-circle" aria-hidden="true"></i>
                                Basic information</h6>
                            </label>
                        </div>
            
                        <div class="info-wrapper p-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                &nbsp;Full Name <span class="text-danger">*</span>
                                            </span>
                                        </div>
                                        <input type="text" name="full_name" class="form-control" placeholder="Enter Full Name"
                                            value=" {{ old('full_name', $user->name) }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>&nbsp;Email <span class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="email" required readonly class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" placeholder="Enter Display Email"
                                            value="{{ old('email', $user->email) }}">
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-phone"
                                                    aria-hidden="true"></i>&nbsp;Primary Phone <span class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" name="primary_phone" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" placeholder="977 01xxxxxxx"
                                            value="{{ old('primary_phone', $user->user_detail->phone_number) }}">
                                    </div>
                                </div>
            
                            
            
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-whatsapp"
                                                    aria-hidden="true"></i>&nbsp;Phone
                                                (Whatsapp no)</span>
                                        </div>
                                        <input type="text" name="whatsapp_no" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" placeholder="977 98xxxxxxxx"
                                            value="{{ old('whatsapp_no', $user->user_detail->whatsapp_no) }}">
                                    </div>
                                </div>
            
                            
                                <div class="col-sm-12">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i>&nbsp;Address</span>
                                        </div>
                                        <textarea class="form-control" name="address" aria-label="With textarea" rows="4" placeholder="Address">{{ old('address', $user->user_detail->address) }}</textarea>
            
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i>&nbsp;Description</span>
                                        </div>
                                        <textarea class="form-control" name="description" aria-label="With textarea" rows="4" placeholder="Description">{{ old('description', $user->user_detail->description) }}</textarea>
            
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend mb-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i
                                                    class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;Image</span>
                                        </div>
                                        <input type="file" name="image"
                                            data-default-file="{{ asset('storage/personal-info/' . $user->user_detail->image) }}"
                                            class="dropify" data-show-remove="false" data-allowed-file-extensions="jpeg png jpg">
                                    </div>
                                    <div style="font-size: 12px; color: gray;">
                                        <small>File Size : <strong>Smaller than or Equal to 9MB
                                                ( ≤ 9MB)</strong></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
               
                    <div class="card border mb-2">
                        <div class="card-header mb-2">
                            <label class="title mb-0">
                                <h6 class="custom-heading custom-color mb-0 p-1"><i class="fa fa-info-circle" aria-hidden="true"></i>
                                Social Media Handle</h6>
                            </label>
                        </div>
            
                        <div class="info-wrapper p-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i>&nbsp;Facebook
                                                Url</span>
                                        </div>
                                        <input type="text" name="facebook_url" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" placeholder="https://facebook.com"
                                            value="{{ old('facebook_url', $user->user_detail->fb_url) }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i>&nbsp;Instagram
                                                Url</span>
                                        </div>
                                        <input type="text" name="instagram_url" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" placeholder="https://instagram.com"
                                            value="{{ old('instagram_url', $user->user_detail->insta_url) }}">
                                    </div>
                                </div>
                            
            
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend custom-input-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-linkedin"
                                                    aria-hidden="true"></i>&nbsp;LinkedIn
                                                Url</span>
                                        </div>
                                        <input type="text" name="linkedin_url" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" placeholder="https://linkedin.com"
                                            value="{{ old('linkedin_url', $user->user_detail->linkedin_url) }}">
                                    </div>
            
                                </div>
                            
                            </div>
                        </div>
                    </div>
                
            
            </div>
            <div class="card-footer">
                <div class="col-md-12">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-danger">Cancel</a>
                    <button style="float: right" type="submit" class="btn btn-outline-success">Save</button>
                </div>
            </div>
       </form>
      </div>
   </div>
@endsection