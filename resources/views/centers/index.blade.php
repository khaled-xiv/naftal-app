@extends('layouts.without_footer')
@section('title', 'Centers')
@section('content')
    <!-- Centers -->
    <section id="users">

        <div class="content-box-md">

            <div class="limiter">
                <div class="container">
                    {!! Form::open(['method'=>'GET', 'action'=> ['CenterController@create']]) !!}
                    <div class="row">
                        <div id="submit-btn" class="pull-right" style="margin:10px 7px 7px 7px;">
                            <button class="btn btn-general btn-yellow" type="submit" role="button">Add Center</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <hr>
                    <div class="container">
                    @foreach($centers->chunk(3) as $chunk)
                        <div class="row">
                            @foreach($chunk as $center)
                                <div class="col-md-4">
                                    <div class="box">
                                        <div class="imgBx">
                                            <img src="{{ asset('img/1.png') }}" class="card-img-top" alt="..." height="300px">
                                        </div>
                                        <div class="content">
                                            <h4><a href="{{url('centers/'.$center->id)}}" style="color : black; text-decoration: underline"><em>{{$center->location}}</em></a></h4>
                                            <br>
                                            <p>
                                                <b>Code:</b> {{$center->code}}<br>
                                                <b>Phone number:</b> {{$center->phone}}
                                            </p>
                                            {!! Form::open(['method'=>'GET', 'action'=> ['CenterController@edit', $center->id]]) !!}
                                                <button style="color: #069;text-decoration: underline;cursor: pointer;" role="button">edit center</button>
                                            {!! Form::close() !!}
                                            <button class="center-del" data-toggle="modal" data-target="#DeleteCenterModal" data-center-id="{{$center->id}}" style="color: #ff3333;text-decoration: underline;cursor: pointer;" role="button">delete center</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="modal fade" id="DeleteCenterModal" tabindex="-1" role="dialog" aria-labelledby="DeleteCenter" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content center-del-2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DeleteCenter">Are you sure you want to delete this center?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE"/>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete center</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Centers Ends -->
@endSection
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function($) {
            $(document).on("click", ".center-del", function () {
                let Id = $(this).data('center-id');
                $(".center-del-2 form").attr('action', '/centers/' + Id);
            });
    });
</script>
