<?php
    $temp = $_COOKIE['equip'];
?>

@extends('layouts.without_footer')
@section('title', 'Add a '.substr($temp, 0, -1))
@section('content')

    <section id="add-equipment">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-md-offset-3">
                        This part is optional, you can skip it
                        <div id="contact-right">
                            {!! Form::open(['method'=>'POST', 'action'=> 'ComponentController@store']) !!}
                            @csrf
                            <h4>Add components for {{substr($temp, 0, -1)}}(code : {{$equipment->code}})</h4>
                            <br><br>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="hidden" name="equipment" value="{{$equipment->id}}"/>
                                        <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" placeholder="Designation">
                                        @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="mark" type="text" class="form-control @error('mark') is-invalid @enderror" name="mark" value="{{ old('mark') }}" required autocomplete="mark" placeholder="Mark">
                                        @error('mark')
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
                                        <input id="reference" type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" required autocomplete="reference" placeholder="Reference">
                                        @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="commissioned_on" type="date" class="form-control" name="commissioned_on" required autocomplete="commissioned_on" placeholder="Commissioned_on">
                                        @error('commissioned_on')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="submit-btn" class="pull-right">
                                    <button class="btn btn-general btn-yellow" type="submit"  title="Submit" role="button">Add this component</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
