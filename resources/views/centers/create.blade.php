@extends('layouts.base')
@section('title', __('Add Center'))
@section('content')
    <!-- Add Center -->
    <br>
    <section id="add-user">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-8 offset-xs-1">

                        <div class="contact-right">

                            {!! Form::open(['method'=>'POST', 'action'=> 'CenterController@store']) !!}
                            @csrf
                            <h4>{{ __('Add Center') }}</h4>
                            <br>


                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('code', 'Code:',['class'=>'label_padding']) !!}
                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="name" placeholder="Code">
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('location', 'Location:',['class'=>'label_padding']) !!}
                                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="email" placeholder="Location">

                                        @error('location')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('storage_capacity', __('Storage capacity').":",['class'=>'label_padding']) !!}
                                        <input id="storage_capacity" type="number" class="form-control @error('number') is-invalid @enderror" name="storage_capacity" value="{{ old('storage_capacity') }}" required autocomplete="new-password" placeholder="{{ __('Storage capacity') }}">
                                        @error('storage_capacity')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('phone', __('Phone number').":",['class'=>'label_padding']) !!}
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="{{ __('Phone number') }}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="submit-btn" class="ml-auto">
                                    <button class="btn  btn-yellow btn-general" type="submit"  title="Submit" role="button">{{ __('Add Center') }}</button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                        <!--                        </form>-->
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Add Center Ends -->
@endsection
