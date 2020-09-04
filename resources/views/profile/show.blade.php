@extends('layout.layout')


@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="container">
        <div class="form-group row">
            <label for="personal_image" class="col-sm-4 col-form-label">Profile Photo : </label>
            <div class="col-sm-8">
                @if($userinfo->photo == "")
                    <div class="float-left">
                        {{"-"}}
                    </div>
                @else
                    <img id="personal_image" src="{{$userinfo->photo}}" height="90" width="120"
                         class="thumbnail img-fluid z-depth-1 mx-auto d-block" alt="1">
                @endif
            </div>
        </div>

        <div class="form-group row">
            {{--            {{$profile->firstName}}--}}
            <label for="userName" class="col-sm-4 col-form-label">Username :</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="username"
                       value="@if($userinfo->username == "") {{"-"}} @else {{$userinfo->username}} @endif">
            </div>

        </div>

        <div class="form-group row">
            {{--            {{$profile->firstName}}--}}
            <label for="firstName" class="col-sm-4 col-form-label">FirstName :</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="firstName"
                       value="@if($userinfo->firstName == "") {{"-"}} @else {{$userinfo->firstName}} @endif">
            </div>

        </div>
        <div class="form-group row">
            <label for="lastName" class="col-sm-4 col-form-label">Last Name: </label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="lastName"
                       value="@if($userinfo->lastName == "") {{"-"}} @else {{$userinfo->lastName}} @endif"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-sm-4 col-form-label">Phone Number : </label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="phone"
                       value="@if($userinfo->phone1 == "") {{"-"}} @else {{$userinfo->phone1}} @endif"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="birthdate" class="col-sm-4 col-form-label">Birthdate :</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="birthdate"
                       value="@if($userinfo->birthdate == "") {{"//"}} @else {{$userinfo->birthdate}} @endif"/>
            </div>
        </div>
        @if($isMyself == 1)
            <div class="text-center p-t-10 row pl-5 pr-5">
                <div class="col-sm-1"></div>
                <a class="form-btn col-sm-5" href="{{url()->current()."/edit"}}">
                    Edit
                </a>

                <a class="form-btn col-sm-5" href="{{route('home')}}">
                    Back
                </a>
            </div>
        @endif
    </div>
@endsection
