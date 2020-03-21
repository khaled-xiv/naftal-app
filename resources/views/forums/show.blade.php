@extends('layouts.without_footer')
@section('title', 'Show Question')
@section('content')

    <!-- Page Content -->

    <section id="edit-equipment">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <!-- Post Content Column -->
                    <div class="col-md-8">
                        <!-- Title -->
                        <h2 class="mt-4">{{$forum->title}}</h2>
                        <!-- Author -->
                        by
                        <a href="#">{{$forum->user->name}}</a>
                        <!-- Date/Time -->
                        <p class="text-muted">Posted on {{$forum->created_at}}</p>

                        <hr>
                        <!-- Post Content -->
                        <div class="row">
                            <div class="col-1">
                                <div>
                                    <div class="vote">
                                        <button onclick="updateVotes(1, 1, {{$forum->id}})">
                                            <i id="1votesBoxF{{$forum->id}}" @if(Auth::user()->liked_forums()->where([['likable_id','=',$forum->id],['up','=', 1]])->exists()) style="color : #f4c613;" @endif class="fa fa-2x fa-caret-up"></i>
                                        </button>
                                    </div>
                                    <div id="votesBoxF{{$forum->id}}" class="vote">
                                        {{$forum->votes}}
                                    </div>
                                    <div class="vote">
                                        <button onclick="updateVotes(1, 2, {{$forum->id}})">
                                            <i id="2votesBoxF{{$forum->id}}" @if(Auth::user()->liked_forums()->where([['likable_id','=',$forum->id],['up','=', 0]])->exists()) style="color : #007bff;" @endif class="fa fa-2x fa-caret-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-11">
                                <p class="lead">
                                    {{$forum->body}}
                                </p>
                            </div>
                        </div>
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
                                        <div class="answers">
                                            {{$number = $forum->answers->count()}} @if($number != 1) Answers @else Answer @endif
                                        </div>
                                        @foreach($forum->answers as $answer)
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="row">
                                                    <div class="col-1">
                                                        <div>
                                                            <div class="vote">
                                                                <button onclick="updateVotes(2, 1, {{$answer->id}})">
                                                                    <i id="1votesBoxA{{$answer->id}}" @if(Auth::user()->liked_answers()->where([['likable_id','=',$answer->id],['up','=', 1]])->exists()) style="color : #f4c613;" @endif class="fa fa-2x fa-caret-up"></i>
                                                                </button>
                                                            </div>
                                                            <div id="votesBoxA{{$answer->id}}" class="vote">
                                                                {{$answer->votes}}
                                                            </div>
                                                            <div class="vote">
                                                                <button onclick="updateVotes(2, 2, {{$answer->id}})">
                                                                    <i id="2votesBoxA{{$answer->id}}" @if(Auth::user()->liked_answers()->where([['likable_id','=',$answer->id],['up','=', 0]])->exists()) style="color : #007bff;" @endif class="fa fa-2x fa-caret-down"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-11">
                                                        <span class="text-muted pull-right">
                                                            <small class="text-muted">{{ \Carbon\Carbon::parse($answer->created_at)->diffForHumans() }}</small>
                                                        </span>
                                                        <strong style="color: #f4c613;">{{$answer->user->name}}</strong>
                                                        <p>
                                                            {{$answer->body}}
                                                        </p>
                                                        @if(Auth::user() == $answer->user)
                                                        <div class="pull-right">
                                                            <button style="color: #069;text-decoration: underline;cursor: pointer;">Edit answer</button>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
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

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>


        function updateVotes(type, up, id){
            let forumOrAnswer = (type === 1) ? '/forums/' : '/answers/';
            let upOrDown = (up === 1) ? '/upvote':'/downvote';
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content')
                },
                url:forumOrAnswer + id + upOrDown,
                success:function(data) {
                    if(forumOrAnswer === '/forums/') {
                        $("#votesBoxF" + id).html(data.msg);
                        if(up === 1)
                            if($("#1votesBoxF" + id).css("color") === "rgb(244, 198, 19)")
                                $("#1votesBoxF" + id).css("color", "black");
                            else {
                                $("#1votesBoxF" + id).css("color", "#f4c613");
                                $("#2votesBoxF" + id).css("color", "black");
                            }
                        else
                            if($("#2votesBoxF" + id).css("color") === "rgb(0, 123, 255)")
                                $("#2votesBoxF" + id).css("color", "black");
                            else {
                                $("#2votesBoxF" + id).css("color", "#007bff");
                                $("#1votesBoxF" + id).css("color", "black");
                            }
                    }
                    else {
                        $("#votesBoxA" + id).html(data.msg);
                        if(up === 1)
                            if($("#1votesBoxA" + id).css("color") === "rgb(244, 198, 19)")
                                $("#1votesBoxA" + id).css("color", "black");
                            else {
                                $("#1votesBoxA" + id).css("color", "#f4c613");
                                $("#2votesBoxA" + id).css("color", "black");
                            }
                        else
                        if($("#2votesBoxA" + id).css("color") === "rgb(0, 123, 255)")
                            $("#2votesBoxA" + id).css("color", "black");
                        else {
                            $("#2votesBoxA" + id).css("color", "#007bff");
                            $("#1votesBoxA" + id).css("color", "black");
                        }
                    }
                }
            });
        }
    </script>

@endsection
