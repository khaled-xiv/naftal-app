@extends('layouts.base')
@section('title', 'Most upvoted questions')
@section('content')

<!-- Page Content -->

<section id="edit-equipment">

    <div class="content-box-md">

        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

					<div class="forum-index-header">
						<h2 class="forum-index-title">{{ __('Most upvoted questions') }}</h2>
						{!! Form::open(['method'=>'GET', 'action'=>'ForumController@create']) !!}
							<button class="btn btn-primary pull-right">{{__('Ask a')." question"}}</button>
						{!! Form::close() !!}
					</div>

                    <!-- Blog Post -->
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
                                {{ __('Posted on')." ".$forum->created_at." ".__('by')}}
                                &nbsp;<span class="username">{{$forum->user->name}}</span>
                            </div>
                        </div>
                    @endforeach
					</div>
                </div>

                <!-- Sidebar Widgets Column -->
                <div class="col-md-4 justify-content-center">

                    <!-- Search Widget -->
                    <div id="fix-div" class="position-fixed">
                        @include('forums.sideBar')
                    </div>

                </div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="text-center" style="margin-left : 15px;">
                    {{$forums->render()}}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
</section>

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
