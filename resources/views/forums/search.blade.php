@extends('layouts.base')
@section('title', 'Most upvoted questions')
@section('content')

    <!-- Page Content -->

    <section>

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-8">
					
						<form class="forum-search small-scr-search" method="GET" action="/search/results">
							<input type="search" class="searchbox" name="search_query" placeholder="{{__('Search').'...'}}" required>
							<input title="Search" value="" type="submit" class="search-button">
						</form>
						
						<div class="forum-index-header">
							<h2 class="forum-index-title">
								@if(isset($tag))
									{{ __('Forums tagged with') }}
									<small> "{{$tag->content}}"</small>
								@else
									{{ __('Search results') }}
								@endif
							</h2>
							{!! Form::open(['method'=>'GET', 'action'=>'ForumController@create']) !!}
								<button class="btn btn-yellow btn-general pull-right">{{__('Ask a')." question"}}</button>
							{!! Form::close() !!}
						</div>
                        <!-- Blog Post -->
                        @if(count($forums) === 0)
						<div class="empty-result">
							{{ __('No results were found') }}
						</div>
                        @else
						<div class="forums-holder">
							@foreach($forums as $forum)
								<div class="forum-box">
									<div class="forum-box-body">
										<h3 class="forum-box-title">
										{!! Form::open(['method'=>'GET', 'action'=> ['ForumController@show', $forum->id]]) !!}
											<button>{{$forum->title}}</button>
										{!! Form::close() !!}
										</h3>
										<p class="forum-box-body">
										@if(strlen($forum->body) < 200)
											{{$forum->body}}
										@else()
											{{substr($forum->body, 0, 200).'...'}}
										@endif
										</p>
									</div>
									<div class="forum-box-footer">
										<div>
											<span class="box question-score @if($forum->votes > 0) good-result @elseif($forum->votes < 0) bad-result @endif">
												@if($forum->votes > 0) {{ "+".$forum->votes }} @else {{ $forum->votes }} @endif
											</span>
										</div>
										<div>
											{{ __('Posted on')." ".$forum->created_at." ".__('by')}}
											&nbsp;<span class="username">{{$forum->user->name}}</span>
										</div>
										<div>
											<span class="box answer-count">{{ $forum->answers->count()." ".__('answer')."(s)" }}</span>
										</div>									
									</div>
								</div>
							@endforeach
						</div>
                        @endif
                    </div>

                    <div class="col-md-4 justify-content-center">

                        <div id="fix-div" class="position-fixed">
                            @include('forums.sideBar')
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="text-center" style="margin-left : 15px;">
                        {{$forums->render()}}
                    </div>
                </div>
            </div>

        </div>

    </section>

    @include('forums.tags')

    <script>

        $(document).ready(function($) {

            let $window = $(window);
            let $div = $('#fix-div');

            function checkWidth() {
                let window_size = $window.width();
                if (window_size > 768) {
                    $div.addClass('position-fixed');
                } else {
                    $div.removeClass('position-fixed');
                }
            }

            checkWidth();
            $(window).resize(checkWidth);
        });

    </script>

@endsection
