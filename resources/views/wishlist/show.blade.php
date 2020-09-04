@extends('layout.layout')


@section('content')
    <div class="container">
        <div>
            @if(count($wishlists) > 0)
                <table class="row table table-responsive table-striped">
                    <th>title</th>
                    <th>content</th>
                    <th></th>
                    <th></th>
                    @foreach($wishlists as $wishlist)

                        <tr class="container-fluid">
                            <td>{{$wishlist->title}}</td>
                            <td>{{$wishlist->content}}</td>
                            <td>
                                <button class="btn btn-warning" id="Edit" data-toggle="modal" data-target="#modalEdit"
                                        data-id="{{$wishlist->id}}" data-title="{{$wishlist->title}}"
                                        data-content="{{$wishlist->content}}">
                                    Edit
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger" id="del" data-toggle="modal" data-target="#modalForm"
                                        data-id="{{$wishlist->id}}">
                                    Delete
                                </button>
                            </td>
                        </tr>

                    @endforeach
                </table>
            @endif
        </div>
        <div class="row">
            <button class="btn btn-success col-md-3" data-toggle="modal" data-target="#modalFormAdd">
                Add wish Item
            </button>
        </div>
        <div class="row pt-1">
            <a class="btn btn-success col-md-3" href="{{route('home')}}">
                Back
            </a>
        </div>
    </div>
    <div class="modal fade" id="modalFormAdd" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">add</h5>
                    <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter title"/>
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea class="form-control" id="content" placeholder="Enter Content"></textarea>
                        </div>

                        <input type="hidden" name="textID">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submitBtn" onclick="submitForm()">SUBMIT</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalForm" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Delete</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <h3>Really want to delete?!</h3>
                    {{--<form role="form">--}}
                    {{--<div class="form-group">--}}
                    {{--<label for="inputName">Name</label>--}}
                    {{--<input type="text" class="form-control" id="inputName" placeholder="Enter your name"/>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                    {{--<label for="inputEmail">Email</label>--}}
                    {{--<input type="email" class="form-control" id="inputEmail" placeholder="Enter your email"/>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                    {{--<label for="inputMessage">Message</label>--}}
                    {{--<textarea class="form-control" id="inputMessage" placeholder="Enter your message"></textarea>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger submitBtn" onclick="deleteItem()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title-edit" id="myModalLabel">Edit</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control title" id="title" placeholder="Enter title"/>
                    </div>
                    <div class="form-group">
                        <label for="content" class="content">content</label>
                        <textarea class="form-control content" id="content" placeholder="Enter Content"></textarea>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success submitBtn" onclick="updateItem()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <meta id="token" name="token" content="{ { csrf_token() } }">

    <script>
        $('#modalEdit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
//
            var recipient = button.data('title')
            console.log(recipient);

            var team = button.data('team')
//

            var modal = $(this)

            modal.find('.modal-title').text(recipient)

        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteItem() {
            var id = $('#del').attr('data-id');
            $.ajax({
                type: 'DELETE',
                url: 'api/wishlist/' + id,
                data: id,
                success: function (data, textStatus, xhr) {
                    window.location.reload();
                },
                error: function (xhr, textStatus, errorThrown) {

                }
            });
        };
        function updateItem() {
            var title = $('#title').val();
            var content = $('#content').val();
            if (title.trim() == '') {
                alert('Please enter your title.');
                $('#title').focus();
                return false;
            } else if (content.trim() == '') {
                alert('Please enter your content.');
                $('#content').focus();
                return false;
            } else {
                $.ajax({
                    type: 'Get',
                    url: '/wishListEdit/' + title + '/' + content,
                    success: function (data, textStatus, xhr) {
                        console.log('derakht');
                        window.location.reload();
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON;
                        console.log(errors);
                    }
                });
            }
        };
            function submitForm() {
                var title = $('#title').val();
                var content = $('#content').val();
                if (title.trim() == '') {
                    alert('Please enter your title.');
                    $('#title').focus();
                    return false;
                } else if (content.trim() == '') {
                    alert('Please enter your content.');
                    $('#content').focus();
                    return false;
                } else {
                    $.ajax({
                        type: 'Get',
                        url: '/wishListAdd/' + title + '/' + content,
                        success: function (data, textStatus, xhr) {
                            console.log('derakht');
                            window.location.reload();
                        },
                        error: function (xhr) {
                            var errors = xhr.responseJSON;
                            console.log(errors);
                        }
                    });
                }
            }
    </script>
@endsection
