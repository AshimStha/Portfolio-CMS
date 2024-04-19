@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <img src="https://i.pinimg.com/564x/bd/da/fc/bddafc029d86df72bef91bba70973c71.jpg" class="card-img-top"
                        alt="image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text"> {{ $user->user_detail->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card mb-3">
                    <a href="{{ route('user-details') }}" class="full-link"></a>
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-md-center align-items-center">
                            <i class="ri-file-list-line" style="font-size:36px;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Personal Details</h5>

                                <p class="card-text"> Manage and use your personal details for your portfolio.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <a href="{{ route('skills') }}" class="full-link"></a>
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-md-center align-items-center">
                            <i class="ri-list-check-2" style="font-size:36px;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Skills</h5>

                                <p class="card-text"> Get to know your skills and add them gracefully to your portfolio.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <a href="{{ route('projects') }}" class="full-link"></a>
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-md-center align-items-center">
                            <i class="ri-window-fill" style="font-size:36px;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Projects</h5>

                                <p class="card-text"> Give your finished projects more exposure in a convenient way.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 justify-content-center align-items-center">
                    <div class="d-flex gap-3 social_link">
                        <a href="{{ $user->user_detail->fb_url ?? '#' }}" target="_blank">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="{{ $user->user_detail->insta_url ?? '#' }}" target="_blank">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="{{ $user->user_detail->linkedin_url ?? '#' }}" target="_blank">
                            <i class="ri-linkedin-line"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone={{ $user->user_detail->whatsapp_no ?? '#' }}"
                            target="_blank">
                            <i class="ri-whatsapp-line"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
