@extends('layouts.without_footer')
@section('title', 'Show Question')
@section('content')

    <!-- Page Content -->

    <section id="edit-equipment">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <!-- Post Content Column -->
                    <div class="col-lg-8">

                        <!-- Title -->
                        <h2 class="mt-4">{{$forum->title}}</h2>

                        <!-- Author -->
                        by
                        <a href="#">{{$forum->user->name}}</a>
                        <!-- Date/Time -->
                        <p class="text-muted">Posted on {{$forum->created_at}}</p>

                        <hr>
                        <!-- Post Content -->
                        <p class="lead">
                            {{$forum->body}}
                        </p>

                        <hr>

                        <!-- Answers -->

                        <div class="comment-wrapper">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <!-- Answers Form -->
                                    {!! Form::open(['method'=>'POST', 'action'=> 'AnswerController@store']) !!}
                                        <input type="hidden" name="forum" value="{{$forum->id}}"/>
                                        <div class="row">
                                            <textarea id="body" name="body" style="margin: 5px 20px; padding: 5px 20px; border-radius: 5px;" class="form-control" value="{{ old('body') }}" required placeholder="You can answer here..." rows="5"></textarea>
                                        </div>
                                        <div class="row pull-right">
                                            <button style="margin: 5px 20px;" class="btn btn-outline-primary" type="submit">Submit answer</button>
                                        </div>
                                    {!! Form::close() !!}
                                    <div class="clearfix"></div>
                                    <hr>
                                    <ul class="media-list">
                                        @foreach($forum->answers as $answer)
                                        <li class="media">
                                            <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted">{{ \Carbon\Carbon::parse($answer->created_at)->diffForHumans() }}</small>
                                                </span>
                                                <strong style="color: #f4c613;">{{$answer->user->name}}</strong>
                                                <p>
                                                    {{$answer->body}}
                                                </p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div>

                        </div>

                    </div>

                    <!-- Sidebar Widgets Column -->
                    <div class="col-md-4">

                        @include('forums.sideBar')

                    </div>

                </div>
                <!-- /.row -->

            </div>

        </div>
        <!-- /.container -->


    </section>



@endsection
