@extends('layout.layout2')


@section('content')
    @if(session()->has('success'))
        {{session()->get('success')}}
    @endif
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li class="center-block alert-danger form-control">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="container" >
        <div class="form-group row">
            <div class="col-sm-8">
                <h1 >Search Profile</h1>
            </div>
        </div>
        <form method="post" action="/profile/search" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group row">
                {{--            {{$profile->firstName}}--}}
                <label class="col-sm-4 col-form-label">Username :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="username" name="username"
                           value="" placeholder="username">
                </div>

            </div>


            <div class="text-center p-t-10 row pl-5 pr-5">
                <div class="col-sm-1"></div>
                <button type="submit" class="form-btn col-sm-5"> Search</button>
                <a class="form-btn col-sm-5" href="{{route('home')}}">
                    Back
                </a>
            </div>
        </form>
    </div>
@endsection
