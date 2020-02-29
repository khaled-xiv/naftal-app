@extends('layouts.without_footer')
@section('title', 'edit center')
@section('content')
    <!-- Edit Center -->
    <br>
    <section id="add-user">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-md-offset-4">

                        <div id="contact-right">

                            {!! Form::model($center, ['method'=>'PUT', 'action'=> ['CenterController@update', $center->id]]) !!}
                            @csrf
                            <h4>Edit Center</h4>
                            <br><br>


                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
{{--                                        <input id="code2" type="text" class="form-control @error('code') is-invalid @enderror" name="code2" value="{{ old('code') }}" required autocomplete="name" placeholder="Code">--}}
                                        {!! Form::text('code', old('code'), ['class'=> $errors->get('code') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
{{--                                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="email" placeholder="Location">--}}
                                        {!! Form::text('location', old('code'), ['class'=> $errors->get('location') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('location')
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
{{--                                        <input id="storage_capacity" type="number" class="form-control @error('number') is-invalid @enderror" name="storage_capacity" required autocomplete="new-password" placeholder="Storage Capacity">--}}
                                        {!! Form::text('storage_capacity', old('code'), ['class'=> $errors->get('storage_capacity') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('storage_capacity')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
{{--                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" placeholder="Phone Number">--}}
                                        {!! Form::text('phone', old('code'), ['class'=> $errors->get('phone') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="submit-btn" class="pull-right">
                                    <button class="btn btn-general btn-yellow" type="submit"  title="Submit" role="button">Edit Center</button>
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
