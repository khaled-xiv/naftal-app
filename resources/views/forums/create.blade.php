@extends('layouts.without_footer')
@section('title', 'Ask a question')
@section('content')

    <!-- Page Content -->

    <section id="edit-equipment">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <!-- Post Content Column -->
                    <div class="col-lg-8 col-md-8">

                        <div class="contact-right" style="overflow: hidden;">

                            {!! Form::open(['method'=>'POST', 'action'=> 'ForumController@store']) !!}
                            @csrf
                            <h4>Ask a Question</h4>
                            <br>
                            <div class="form-group">
                                {!! Form::label('title', 'Title:',['class'=>'label_padding']) !!}
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" placeholder="Specify a title to your problem...">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('body', 'Content:',['class'=>'label_padding']) !!}
                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required placeholder="Type your problem here..."></textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('tags', 'Tags:',['class'=>'label_padding']) !!}
                                <input type = "text" id="content" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" placeholder="Enter a few tags here...">
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div id="submit-btn" class="pull-right">
                                <button class="btn btn-yellow" type="submit"  title="Submit" role="button">Ask question</button>
                            </div>

                        {!! Form::close() !!}
                        <!--                        </form>-->
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
        });

    </script>

@endsection
