<!-- Styles -->
<style>
    .mainText {
        /*background-color: #fff;*/
        color: #4d0026;
        font-family: 'Raleway', sans-serif;
        font-weight: bold;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 5vw;
        margin: 0;
        position: absolute;
        top: 90%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-top: 30px;
    }
</style>
@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title  mainText">
            Welcome to Eventori :)
        </div>
    </div>
@endsection
