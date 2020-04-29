@extends('layouts.without_footer')
@section('title', 'Most upvoted questions')
@section('content')

<!-- Page Content -->

<section id="edit-equipment">

    <div class="content-box-md">

        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

                    {!! Form::open(['method'=>'GET', 'action'=> ['ForumController@create']]) !!}
                        <button class="btn btn-primary pull-right">Ask Question</button>
                    {!! Form::close() !!}
                    <br><hr>
                    <h2 class="my-4">Most upvoted Questions
                        <small>Secondary Text</small>
                    </h2>

                    <!-- Blog Post -->
                    @foreach($forums as $forum)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title">{{$forum->title}}</h3>
                                <p class="card-text">{{$forum->body}}</p>
                                {!! Form::open(['method'=>'GET', 'action'=> ['ForumController@show', $forum->id]]) !!}
                                    <button class="btn btn-primary">Read More &rarr;</button>
                                {!! Form::close() !!}
                            </div>
                            <div class="card-footer text-muted">
                                Posted on {{$forum->created_at}} by
                                <a href="#">{{$forum->user->name}}</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <!-- Pagination -->
                    <ul class="pagination justify-content-center mb-4">
                        <li class="page-item">
                            <a class="page-link" href="#">&larr; Older</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Newer &rarr;</a>
                        </li>
                    </ul>

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
                <div class="text-center">
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
