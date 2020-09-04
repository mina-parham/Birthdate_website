@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Eventori Menu</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-md-6 container-fluid">
                            <div class="row">
                                <a class="btn btn-primary col-sm-5" href="/profile">
                                    My profile
                                </a>
                            </div>
                            <div class="row pt-1">
                                <a class="btn btn-primary col-sm-5" href="/profile/search">
                                    Find a friend
                                </a>
                            </div>
                            <div class="row pt-1">
                                <a class="btn btn-primary col-sm-5" href="/wishlist">
                                    My wishlist
                                </a>
                            </div>
                        </div>
                        @if(count($users) > 0)
                            <div class="row">
                                <table>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{$user->username}}
                                            </td>
                                            <td>
                                                <form method="get" action="/accept/{{$user->id}}">
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-primary">
                                                        accept request
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
