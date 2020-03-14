@extends('layouts.without_footer')
@section('title', 'Add center')
@section('content')
    <!-- Add Center -->
    <br>
    <section id="add-user">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-md-offset-4">

                        <div id="contact-right">

                            {!! Form::open(['method'=>'POST', 'action'=> 'CenterController@store']) !!}
                            @csrf
                            <h4>Add Center</h4>
                            <br><br>


                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="name" placeholder="Code">
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
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
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="storage_capacity" type="number" class="form-control @error('number') is-invalid @enderror" name="storage_capacity" value="{{ old('storage_capacity') }}" required autocomplete="new-password" placeholder="Storage Capacity">

                                        @error('storage_capacity')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number">

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
                                    <button class="btn btn-general btn-yellow" type="submit"  title="Submit" role="button">Add Center</button>
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
