@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">details</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Full Name</td>
                <td>{{$user->name}}</td>
              
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Email</td>
                <td>{{$user->email}}</td>
               
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>phone</td>
                <td>{{$user->user_detail->phone_number}}</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Address</td>
                <td>{{$user->user_detail->address}}</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Whats App Number</td>
                <td><a href="https://api.whatsapp.com/send?phone={{$user->user_detail->whatsapp_no??'#'}}">{{$user->user_detail->whatsapp_no??'not given'}}</a></td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection