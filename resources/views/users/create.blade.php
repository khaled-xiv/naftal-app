@extends('layouts.base')
@section('title', __('Add user'))
@section('content')
<!-- Add User -->
<br>
<section id="add-user">

    <div class="content-box-md">

        <div class="container">

            <div class="row">

                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-8 offset-xs-1">

                    <div class="contact-right">

                        {!! Form::open(['method'=>'POST', 'action'=>[ 'Auth\RegisterController@register']]) !!}
                            @csrf
                        <input type="hidden" name="languge" value="{{ app()->getLocale() }}">
                            <h4>{{__('Add user')}}</h4>
                            <br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('name', __('Name').':',['class'=>'label_padding']) !!}
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{__('Name')}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('email', __('email address').':',['class'=>'label_padding']) !!}
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Exemple@exemple.com">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('password', __('Password').':',['class'=>'label_padding']) !!}
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{__('Password')}}">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('password-confirm', __('Confirm Password').':',['class'=>'label_padding']) !!}
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{__('Confirm Password')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('role_id', 'Role:',['class'=>'label_padding']) !!}
                                            {!! Form::select('role_id', $roles , null, ['class'=>"form-control" ,"required"=>"required",'placeholder'=>__('select a role')])!!}

                                            @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('center_id', __('Center').':',['class'=>'label_padding']) !!}
                                            {!! Form::select('center_id', $centers , null, ['class'=>'form-control',"required"=>"required",'placeholder'=>__('select a center')])!!}
                                            @error('center_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div id="submit-btn" class="ml-auto">
                                        <button class="btn  btn-general btn-yellow" type="submit"  title="{{__('add user')}}" role="button">{{__('add user')}}</button>
                                    </div>
                                </div>

                        {!! Form::close() !!}
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- Add User Ends -->
@endsection
