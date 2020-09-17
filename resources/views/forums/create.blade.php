@extends('layouts.base')
@section('title', 'Ask a question')
@section('content')

    <!-- Page Content -->

    <section>

        <div class="content-box-md">

            <div id="frm-container">

                <div class="row">

                    <!-- Post Content Column -->
                    <div class="col-xl-8">
					
						<form class="forum-search small-scr-search" method="GET" action="/search/results">
							<input type="search" class="searchbox" name="search_query" placeholder="{{__('Search').'...'}}" required>
							<input title="Search" value="" type="submit" class="search-button">
						</form>

                        <div class="contact-right" style="margin-top: 20px;overflow: hidden;">

                            {!! Form::open(['method'=>'POST', 'action'=> 'ForumController@store']) !!}
                            @csrf
                            <h4>{{__('Ask a')." question"}}</h4>
                            <br>
                            <div class="form-group">
                                {!! Form::label('title', ucfirst(__('titre')).":",['class'=>'label_padding']) !!}
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" placeholder="{{ __('Specify a title to your problem...') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('body', ucfirst(__('content')).":",['class'=>'label_padding']) !!}
                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required placeholder="{{ __('Type your problem here...') }}"></textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('tags', ucfirst(__('tags')).":",['class'=>'label_padding']) !!}
                                <input type = "text" id="content" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" placeholder="{{ __('Enter a few tags here...') }}">
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div id="submit-btn" class="pull-right">
                                <button class="btn btn-yellow btn-general" type="submit"  title="Submit" role="button">{{ __('Ask question') }}</button>
                            </div>

                        {!! Form::close() !!}
                        <!--                        </form>-->
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
    </section>

    @include('forums.tags')

@endsection
