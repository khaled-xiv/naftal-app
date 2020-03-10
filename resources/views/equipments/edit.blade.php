<?php
    $temp = $_COOKIE['equip'];
?>

@extends('layouts.without_footer')
@section('title', 'Edit '.substr($temp, 0, -1))
@section('content')
    <!-- Edit Equipment -->

    <br>
    <section id="edit-equipment">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-md-offset-4">

                        <div id="contact-right">
                            {!! Form::model($equipment, ['method'=>'PUT', 'action'=> ['EquipmentController@update', $equipment->id]]) !!}
                            @csrf
                            <h4>Edit {{substr($temp, 0, -1)}}</h4>
                            <br><br>


                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
{{--                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" placeholder="Code">--}}
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
{{--                                        <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" placeholder="Type">--}}
                                        {!! Form::text('type', old('type'), ['class'=> $errors->get('type') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('type')
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
{{--                                        <input id="mark" type="text" class="form-control @error('mark') is-invalid @enderror" name="mark" required autocomplete="mark" placeholder="Mark">--}}
                                        {!! Form::text('mark', old('mark'), ['class'=> $errors->get('mark') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('mark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
{{--                                        <input id="model" type="text" class="form-control" name="model" required autocomplete="model" placeholder="Model">--}}
                                        {!! Form::text('model', old('model'), ['class'=> $errors->get('model') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('model')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if($temp != 'Generators')
                                @if($temp == 'Pumps' || $temp == 'Loading Arms')
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                {!! Form::text(($temp == 'Pumps') ? 'pump[product]' : 'loading_arm[product]',
                                                               ($temp == 'Pumps') ? old('pump[product]') : old('loading_arm[product]'),
                                                               ['class'=> (($temp == 'Pumps') && $errors->get('pump[product]')) ||
                                                                (($temp == 'Loading Arms') && $errors->get('loading_arm[product]'))
                                                               ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('pump[product]' || 'loading_arm[product]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                {!! Form::number(($temp == 'Pumps') ? 'pump[rate]' : 'loading_arm[rate]',
                                                                ($temp == 'Pumps') ? old('pump[rate]') : old('loading_arm[rate]'),
                                                                ['class'=> (($temp == 'Pumps') && $errors->get('pump[rate]')) ||
                                                                (($temp == 'Loading Arms') && $errors->get('loading_arm[rate]'))
                                                               ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('pump[rate]' || 'loading_arm[rate]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @elseif($temp == 'Tanks')
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                {!! Form::text('tank[product]', old('tank[product]'), ['class'=> $errors->get('tank[product]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('tank[product]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                {!! Form::number('tank[capacity]', old('tank[capacity]'), ['class'=> $errors->get('tank[capacity]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('tank[capacity]')
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
                                                {!! Form::number('tank[height]', old('tank[height]'), ['class'=> $errors->get('tank[height]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('tank[height]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                {!! Form::number('tank[diameter]', old('tank[diameter]'), ['class'=> $errors->get('tank[diameter]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('tank[diameter]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                {!! Form::text('fuel_meter[category]', old('fuel_meter[category]'), ['class'=> $errors->get('fuel_meter[category]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('fuel_meter[category]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::select('state',  ['ON' => 'Active', 'OFF' => 'Not Active'], null, ['class'=>'form-control'])!!}
                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-6">
                                </div>
                            </div>
                            <div class="row">
                                <div id="submit-btn" class="pull-right">
                                    <button class="btn btn-general btn-yellow" type="submit"  title="Submit" role="button">Edit {{substr($temp, 0, -1)}}</button>
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
    <!-- Edit Equipment Ends -->
@endsection
