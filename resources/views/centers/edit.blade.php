@extends('layouts.without_footer')
@section('title', __('Edit Center'))
@section('content')
    <!-- Edit Center -->
    <br>
    <section id="add-user">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-8 offset-xs-1">

                        <div class="contact-right">

                            {!! Form::model($center, ['method'=>'PUT', 'action'=> ['CenterController@update', $center->id]]) !!}
                            @csrf
                            <h4>{{__('Edit Center')}}</h4>
                            <br>


                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('code', 'Code:',['class'=>'label_padding']) !!}
                                        {!! Form::text('code', old('code'), ['class'=> $errors->get('code') ? 'form-control is-invalid' : 'form-control']) !!}
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
                                        {!! Form::text('location', old('location'), ['class'=> $errors->get('location') ? 'form-control is-invalid' : 'form-control']) !!}
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
                                        {!! Form::number('storage_capacity', old('storage_capacity'), ['class'=> $errors->get('storage_capacity') ? 'form-control is-invalid' : 'form-control']) !!}
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
                                        {!! Form::text('phone', old('phone'), ['class'=> $errors->get('phone') ? 'form-control is-invalid' : 'form-control']) !!}
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
                                    <button role="button" class="btn  btn-danger" data-toggle="modal" data-target="#DeleteCenterModal">{{ __('Delete Center') }}</button>
                                    <button class="btn  btn-yellow" type="submit"  title="Submit" role="button">{{ __('Edit Center') }}</button>
                                </div>
                            </div>

                        {!! Form::close() !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="DeleteCenterModal" tabindex="-1" role="dialog" aria-labelledby="DeleteCenter" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DeleteCenter">{{ __('Are you sure you want to delete this center?') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['CenterController@destroy', $center->id]]) !!}
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Delete Center') }}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>
    <!-- Edit Center Ends -->
@endsection
