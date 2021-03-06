@extends('layouts.base')
@section('title', $forum->title)
@section('content')

    <!-- Page Content -->

    <section id="show-question">

        <div class="content-box-md">

            <div id="frm-container">


                <div class="row" style="margin-left: 5px; display:{!! $errors->hasBag('update') ? 'inline-block;' : 'none;' !!}">
                    <div class="alert alert-danger" role = "alert">
                        {{ __('Could not complete your request, make sure your input is valid.') }}
                    </div>
                </div>

                <div class="row">

                    <!-- Post Content Column -->
                    <div class="col-xl-8">
						
						<form class="forum-search small-scr-search" method="GET" action="/search/results">
							<input type="search" class="searchbox" name="search_query" placeholder="{{__('Search').'...'}}" required>
							<input title="Search" value="" type="submit" class="search-button">
						</form>
						
						<div class="contact-right" style="margin-top: 40px;">
                        <!-- Title -->
						
							<h3 class="forum-title">{{$forum->title}}</h3>
							<!-- Author -->
							{{ __('by') }}
							<span class="username">@if($forum->user) {{ $forum->user->name }} @else {{ "[".__('removed')."]" }} @endif</span>
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
									<p style="font-size: 1.2rem; font-weight: 300;">
										{{$forum->body}}
									</p>
									@if(Auth::user()->id == $forum->user->id)
										<div class="pull-right">
											<button style="display: block;" class="link-button editFsAndAs-1" data-toggle="modal" data-id="{{-$forum->id}}" data-target="#EditFsAndAsModal" role="button">{{ __('Edit')." question" }}</button>
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
												<textarea id="body" name="body" style="margin: 5px 20px; padding: 5px 20px; border-radius: 5px;" class="form-control" value="{{ old('body') }}" required placeholder="{{ __('You can answer here...') }}" rows="4"></textarea>
											</div>
											<div class="row pull-right">
												<button style="margin: 5px 20px;" class="btn btn-yellow btn-general" type="submit">{{ __('Submit answer') }}</button>
											</div>
										{!! Form::close() !!}
										<div class="clearfix"></div>
										<hr>
										<div>
											<div class="answers">
												{{$number = $forum->answers->count()}} @if($number != 1) {{ ucfirst(__('answer'))."s" }} @else {{ ucfirst(__('answer')) }} @endif
											</div>
											@foreach($forum->answers as $answer)
												<div class="answer-box">
													@if(Auth::user()->id == $forum->user->id)
													<button title="{{ __('Choose as best answer') }}" class="best-answer-button" onclick="chooseBestAnswer({{$answer->id}})"><i class="fa fa-check"></i></button>
													@endif
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
															<span id="{{'answer'.$answer->id}}" class="@if($answer->best === 1) best-answer @else normal-answer @endif">{{__('Best Answer')}}</span>
															<p id="{{$answer->id}}">
																{{$answer->body}}
															</p>
															@if(Auth::user()->id == $answer->user->id)
															<div class="pull-right">
																<button class="link-button editFsAndAs-1" data-toggle="modal" data-id="{{$answer->id}}" data-target="#EditFsAndAsModal" role="button"> {{__('Edit')." ".__('answer')}}</button>
															</div>
															@endif
														</div>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
                        </div>

                    </div>

                    <!-- Sidebar Widgets Column -->
                    <div class="col-xl-4 justify-content-center">

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
                            <button type="button" class="btn btn-general btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-general btn-danger">{{ __('Edit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        @include('forums.tags')


    </section>
	
	<?php
		$lang = \Illuminate\Support\Facades\App::getLocale()=='fr';
	?>

    <script>

         $(document).ready(function($) {
            $(document).on("click", ".editFsAndAs-1", function () {
                let target;
                let Id = $(this).data('id');
                if(Id < 0){
                    $(".forum-title").show();
					@if(!$lang)
                    $("#EditFsAndAs").html("Edit Question");
					@else
					$("#EditFsAndAs").html("Modifier Question");
					@endif
                    $("#title").val($("h3.forum-title").html().trim());
                    $("textarea#Modalbody").val($("p.lead").html().trim());
                    Id = -Id;
                    target = '/forums/';
                }else{
                    $(".forum-title").hide();
                    @if(!$lang)
                    $("#EditFsAndAs").html("Edit Answer");
					@else
					$("#EditFsAndAs").html("Modifier Réponse");
					@endif
                    $("#title").val("no title");
                    $("textarea#Modalbody").val($("#"+Id).html().trim());
                    target = '/answers/';
                }
                $(".editFsAndAs-2 form").attr('action', '/en' + target + Id);
            });
        });
		
		function chooseBestAnswer(id) {
			$current = $(".best-answer");
			if($current && $current.attr('id') == 'answer'+id)
				return;
			$.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _token : $('meta[name="csrf-token"]').attr('content')
                },
                url:'/en/answers/'+id+'/best',
                success:function(data) {
					console.log(data);
					if($current){
						$current.removeClass("best-answer");
						$current.addClass("normal-answer");
					}
					$("#answer"+id).addClass("best-answer");
					$("#answer"+id).removeClass("normal-answer");
                }
            });
		}

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
		
		<?php
			$lang = \Illuminate\Support\Facades\App::getLocale()=='fr';
		?>

		var done = false;
		var forumText = "these links could be helpful:";
		var alert0 = "we couldn't find answers to your question.";
		var alert1 = "working on it, this may take some time";
		var alert2 = "some error occurred while looking for an answer";
		@if($lang)
			forumText = "ces liens peuvent etre utiles:";
			alert0 = "on n'a pas pu trouver des réponses à votre question";
			alert1 = "ça peut prendre du temps, veuillez patientez";
			alert2 = "il y a eu un problème";
		@endif
		
        function getSimilar(id){
            $.ajax({
                type:'GET',
                url:'http://127.0.0.1:8000/sim/forums/'+id+"/",
                success:function(data) {
                    if(data.length == 0)
                        alert(alert0);
                    else if(!done){
						done = true;
                        $("#before-recommend").after($("<div>").addClass('alert-dismissible').addClass('alert-success').text(forumText));
                        for(i = 0; i < data.length; i++){
                            $(".alert-dismissible").append($("<a href='"+data[i].id+"' style='display:block;'>").addClass("alert-link").text(data[i].title));
                        }
                    }
                },
                error: function(data) {
					if(data.status == 409)
						alert(alert1);
					else
						alert(alert2);
                }
            });
        }
    </script>

@endsection
