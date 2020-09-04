@extends('layout.layout')


@section('content')

    <div class="container">
        <form method="post" action="/saveProfile" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group row ">
                <label for="photo" class="col-md-4 col-form-label">Profile photo : </label>
                <div class="col-md-4">
                    <input type="file" name="photo" class="form-control" accept=".jpg">
                </div>
                <div class="col-md-4 pt-1">
                    @if($userinfo->photo != "")
                        <img id="photo" src="{{$userinfo->photo}}" height="90" width="120"
                             class="thumbnail img-fluid z-depth-1 mx-auto d-block" alt="1">
                    @endif
                </div>
            </div>

            <div class="form-group row">
                {{--            {{$profile->firstName}}--}}
                <label for="username" class="col-sm-4 col-form-label">Username :</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" id="firstName" name="firstName"
                           value="@if($userinfo->firstName == "") {{"-"}} @else {{$userinfo->firstName}} @endif">
                </div>

            </div><div class="form-group row">
                {{--            {{$profile->firstName}}--}}
                <label for="firstName" class="col-sm-4 col-form-label">FirstName :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           value="@if($userinfo->firstName == "") {{"-"}} @else {{$userinfo->firstName}} @endif">
                </div>

            </div>
            <div class="form-group row">
                <label for="lastName" class="col-sm-4 col-form-label">Last Name: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="lastName" name="lastName"
                           value="@if($userinfo->lastName == "") {{"-"}} @else {{$userinfo->lastName}} @endif"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="phone1" class="col-sm-4 col-form-label">Phone Number : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone1" name="phoneNumber"
                           value="@if($userinfo->phone1 == "") {{"-"}} @else {{$userinfo->phone1}} @endif"/>
                </div>
            </div>

            <div class="container-fluid row ">
                <label for="birthdate" class="col-md-3 col-form-label">Birthdate : </label>
                <div class="col-md-9 row">
                    @php
                        $split = explode('/',$userinfo->birthdate);
                        $year = "";
                        $month = "";
                        $day = "";
                        if(count($split) == 3){
                            $year = $split[0];
                            $month = $split[1];
                            $day = $split[2];
                        }
                    @endphp
                    <select class="form-control col-md-2" name="day">
                        @for($i = 1; $i<=31 ; $i++)
                            @if($i == $day)
                                <option value="{{str_pad($i,2,"0",STR_PAD_LEFT)}}"
                                        selected>{{str_pad($i,2,"0",STR_PAD_LEFT)}}</option>
                            @else
                                <option value="{{str_pad($i,2,"0",STR_PAD_LEFT)}}">{{str_pad($i,2,"0",STR_PAD_LEFT)}}</option>
                            @endif
                        @endfor
                    </select>
                    <div class="col-md-1">/</div>
                    <select class="form-control col-md-2" name="month">
                        @for($i = 1; $i<=12 ; $i++)
                            @if($i == $month)
                                <option selected
                                        value="{{str_pad($i,2,"0",STR_PAD_LEFT)}}">{{str_pad($i,2,"0",STR_PAD_LEFT)}}</option>
                            @else
                                <option value="{{str_pad($i,2,"0",STR_PAD_LEFT)}}">{{str_pad($i,2,"0",STR_PAD_LEFT)}}</option>
                            @endif
                        @endfor
                    </select>
                    <div class="col-md-1">/</div>
                    <select class="form-control col-md-2" name="year">
                        @for($i = 1397; $i>=1300 ; $i--)
                            @if($i == $year)
                                <option selected value="{{$i}}">{{$i}}</option>
                            @else
                                <option value="{{$i}}" p>{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                </div>
            </div>

            <div class="text-center p-t-10 row pl-5 pr-5">
                <button type="submit" class="form-btn-2 col-sm-5"> Save</button>
                <div class="col-sm-1"></div>
                <a class="form-btn col-sm-5" href="/profile">
                    Cancel
                </a>
            </div>

        </form>
    </div>
@endsection
