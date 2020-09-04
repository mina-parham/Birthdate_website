@extends('layout.layout2')


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
        @if($follow_status == '2')
            <div class="form-group row">
                <label for="birthdate" class="col-sm-4 col-form-label">Birthdate :</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" id="birthdate"
                           value="@if($userinfo->birthdate == "") {{"//"}} @else {{$userinfo->birthdate}} @endif"/>
                </div>
            </div>
        @endif
        <div class="text-center p-t-10 row pl-5 pr-5">
            <div class="col-sm-1"></div>
            <a class="form-btn col-sm-5" href="/profile/search">
                Back
            </a>
            @if($follow_status != '2')

                <a class="form-btn col-sm-5" href="/follow/{{$userinfo->username}}">
                    Follow
                </a>
            @endif

        </div>


    </div>
@endsection
