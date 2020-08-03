@extends('layouts.base')
@section('title', 'Show Question')
@section('content')

    <!-- Page Content -->

    <section id="edit-equipment">

        <div class="content-box-md">

            <div class="container">


                <div class="row" style="display:{!! $errors->hasBag('update') ? 'inline;' : 'none;' !!}">
                    <div class="alert alert-danger" role = "alert">
                        {{ __('Could not complete your request, make sure your input is valid.') }}
                    </div>
                </div>

                <div class="row">

                    <!-- Post Content Column -->
                    <div class="col-md-8">
                        <!-- Title -->
                        <h3>{{$forum->title}}</h3>
                        <!-- Author -->
                        by
                        <span class="username">{{$forum->user->name}}</span>
                        <!-- Date/Time -->
                        <p class="text-muted">{{ __('Posted on')." ".$forum->created_at }}</p>

                        <hr>
                        <!-- Post Content -->
                        <div id="before-recommend" class="row">
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
                                @if(Auth::user() == $forum->user)
                                    <div class="pull-right">
                                        <button class="link-button editFsAndAs-1" data-toggle="modal" data-id="{{-$forum->id}}" data-target="#EditFsAndAsModal" role="button">{{ __('Edit')." question" }}</button>
                                    </div>
                                    <br>
                                    <div class="pull-right">
                                        <button class="link-button" onclick="getSimilar({{$forum->id}})">{{ __('Find me an answer') }}</button>
                                    </div>
                                @endif
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
                                            <textarea id="body" name="body" style="margin: 5px 20px; padding: 5px 20px; border-radius: 5px;" class="form-control" value="{{ old('body') }}" required placeholder="{{ __('You can answer here...') }}" rows="5"></textarea>
                                        </div>
                                        <div class="row pull-right">
                                            <button style="margin: 5px 20px;" class="btn btn-outline-primary" type="submit">{{ __('Submit answer') }}</button>
                                        </div>
                                    {!! Form::close() !!}
                                    <div class="clearfix"></div>
                                    <hr>
                                    <ul class="media-list">
                                        <div class="answers">
                                            {{$number = $forum->answers->count()}} @if($number != 1) {{ ucfirst(__('answer'))."s" }} @else {{ ucfirst(__('answer')) }} @endif
                                        </div>
                                        @foreach($forum->answers as $answer)
                                            <div class="answer-box">
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
                                                        <span class="username">{{$answer->user->name}}</span>
                                                        <p id="{{$answer->id}}">
                                                            {{$answer->body}}
                                                        </p>
                                                        @if(Auth::user() == $answer->user)
                                                        <div class="pull-right">
                                                            <button class="link-button editFsAndAs-1" data-toggle="modal" data-id="{{$answer->id}}" data-target="#EditFsAndAsModal" role="button"> {{__('Edit')." ".__('answer')}}</button>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div>

                        </div>

                    </div>

                    <!-- Sidebar Widgets Column -->
                    <div class="col-md-4 justify-content-center">

                        <div id="fix-div" class="position-fixed">
                            @include('forums.sideBar')
                        </div>

                    </div>

                </div>
                <!-- /.row -->

            </div>

        </div>
        <!-- /.container -->


        <div class="modal fade" id="EditFsAndAsModal" tabindex="-1" role="dialog" aria-labelledby="EditFsAndAs" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content editFsAndAs-2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditFsAndAs"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT"/>
                        <div class="modal-body">
                            <div class="form-group forum-title">
                                {!! Form::label('title', __('title').":",['class'=>'label_padding']) !!}
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('body', __('content').":",['class'=>'label_padding']) !!}
                                <textarea id="Modalbody" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required rows="5"></textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('Edit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>

    <script>

         $(document).ready(function($) {

             let $window = $(window);
             let $div = $('#fix-div');

             function checkWidth() {
                 let window_size = $window.width();
                 if (window_size > 768) {
                     $div.addClass('position-fixed');
                 }else{
                     $div.removeClass('position-fixed');
                 }
             }
             checkWidth();
             $(window).resize(checkWidth);

            $(document).on("click", ".editFsAndAs-1", function () {
                let target;
                let Id = $(this).data('id');
                if(Id < 0){
                    $(".forum-title").show();
                    $("#EditFsAndAs").html("Edit Question");
                    $("#title").val($("h2.mt-4").html().trim());
                    $("textarea#Modalbody").val($("p.lead").html().trim());
                    Id = -Id;
                    target = '/forums/';
                }else{
                    $(".forum-title").hide();
                    $("#EditFsAndAs").html("Edit Answer");
                    $("#title").val("no title");
                    $("textarea#Modalbody").val($("#"+Id).html().trim());
                    target = '/answers/';
                }
                $(".editFsAndAs-2 form").attr('action', '/en' + target + Id);
            });
        });

        function updateVotes(type, up, id){
            let forumOrAnswer = (type === 1) ? '/en/forums/' : '/en/answers/';
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
                    if(forumOrAnswer === '/en/forums/') {
                        $("#votesBoxF" + id).html(data.msg);
                        if(up === 1)
                            if($("#1votesBoxF" + id).css("color") === "rgb(244, 198, 19)")
                                $("#1votesBoxF" + id).css("color", "#555");
                            else {
                                $("#1votesBoxF" + id).css("color", "#f4c613");
                                $("#2votesBoxF" + id).css("color", "#555");
                            }
                        else
                            if($("#2votesBoxF" + id).css("color") === "rgb(0, 123, 255)")
                                $("#2votesBoxF" + id).css("color", "#555");
                            else {
                                $("#2votesBoxF" + id).css("color", "#007bff");
                                $("#1votesBoxF" + id).css("color", "#555");
                            }
                    }
                    else {
                        $("#votesBoxA" + id).html(data.msg);
                        if(up === 1)
                            if($("#1votesBoxA" + id).css("color") === "rgb(244, 198, 19)")
                                $("#1votesBoxA" + id).css("color", "#555");
                            else {
                                $("#1votesBoxA" + id).css("color", "#f4c613");
                                $("#2votesBoxA" + id).css("color", "#555");
                            }
                        else
                        if($("#2votesBoxA" + id).css("color") === "rgb(0, 123, 255)")
                            $("#2votesBoxA" + id).css("color", "#555");
                        else {
                            $("#2votesBoxA" + id).css("color", "#007bff");
                            $("#1votesBoxA" + id).css("color", "#555");
                        }
                    }
                }
            });
        }

		var done = false;
        function getSimilar(id){
            $.ajax({
                type:'GET',
                url:'http://127.0.0.1:8000/sim/forums/'+id+"/",
                success:function(data) {
                    if(data.length == 0)
                        alert("we couldn't find answers to your question.");
                    else if(!done){
						done = true;
                        $("#before-recommend").after($("<div>").addClass('alert-dismissible').addClass('alert-success').text("these forums could be helpful:"));
                        for(i = 0; i < data.length; i++){
                            $(".alert-dismissible").append($("<a href='"+data[i].id+"' style='display:block;'>").addClass("alert-link").text(data[i].title));
                        }
                    }
                },
                error: function(data) {
					if(data.status == 409)
						alert("working on it, this may take some time");
					else
						alert("some error occurred while looking for an answer");
                }
            });
        }
    </script>

@endsection
