@extends('layouts.without_footer')
@section('title', 'Add user')
@section('content')
<!-- Add User -->
<br>
<section id="req_inter">

    <div class="content-box-md">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-md-offset-4">

                    <div id="contact-right">

                        {!! Form::open(['method'=>'POST', 'action'=> 'Auth\RegisterController@register']) !!}
                            @csrf
                            <h4>Add User</h4>
                        <br><br>


                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::select('role_id', $roles , null, ['class'=>'form-control','placeholder'=>'Select a role'])!!}
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::select('center_id', $roles , null, ['class'=>'form-control','placeholder'=>'select a center'])!!}
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div id="submit-btn" class="pull-right">
                                        <button class="btn btn-general btn-yellow" type="submit"  title="Submit" role="button">Add User</button>
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
<!-- Add User Ends -->
@endsection
