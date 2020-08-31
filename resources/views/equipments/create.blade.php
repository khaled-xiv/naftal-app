<?php
    $temp = __('Equipments');
    if(isset($_COOKIE['equip']))
        $temp = $_COOKIE['equip'];
    if(substr($temp, -1) === 's')
        $temp = substr($temp, 0, -1);
    if($temp === "Groupes Electronique")
        $temp = "Groupe Electronique";
?>

@extends('layouts.base')
@section('title', __('Add')." ".$temp)
@section('content')
    <!-- Add Equipment -->
    <br>
    <section id="add-equipment">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-8 offset-xs-1">

                        <div class="contact-right">
                            {!! Form::open(['method'=>'POST', 'action'=> 'EquipmentController@store']) !!}
                            @csrf
                            <h4>{{ __('Add')." ".$temp }} </h4>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('code', 'Code:',['class'=>'label_padding']) !!}
                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" placeholder="Code">
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('type', 'Type:',['class'=>'label_padding']) !!}
                                        <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" placeholder="Type">

                                        @error('type')
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
                                        {!! Form::label('mark', ucfirst(__('mark')).":",['class'=>'label_padding']) !!}
                                        <input id="mark" type="text" class="form-control @error('mark') is-invalid @enderror" name="mark" value="{{ old('mark') }}" required autocomplete="mark" placeholder="{{ ucfirst(__('mark')) }}">

                                        @error('mark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('model', ucfirst(__('model')).":",['class'=>'label_padding']) !!}
                                        <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}" required autocomplete="model" placeholder="{{ ucfirst(__('model')) }}">
                                        @error('model')
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
                                        {!! Form::label('state', ucfirst(__('state')).":",['class'=>'label_padding']) !!}
                                        {!! Form::select('state',  ['ON' => 'Active', 'OFF' => 'Not Active'], 'ON', ['class'=>'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('centers', __('Center').":", ['class'=>'label_padding']) !!}
                                        {!! Form::select('centers', $centers , null, ['class'=>'form-control'])!!}
                                    </div>
                                </div>
                            </div>
                            @if($temp != 'Generator' && $temp != 'Groupe Electronique')
                                @if($temp == 'Pump' || $temp == 'Loading Arm' || $temp == 'Pompe' || $temp == 'Bras de Chargement')
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('product', ucfirst(__('product')).":",['class'=>'label_padding']) !!}
                                                <input id="product" type="text" class="form-control @error('product') is-invalid @enderror" name="product" value="{{ old('product') }}" required autocomplete="product" placeholder="{{ucfirst(__('product'))}}">
                                                @error('product')
                                                <span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('rate', ucfirst(__('rate')).":",['class'=>'label_padding']) !!}
                                                <input id="rate" type="number" class="form-control" name="rate" value="{{ old('rate') }}" required autocomplete="rate" placeholder="{{ ucfirst(__('rate')) }}">
                                                @error('rate')
                                                <span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @elseif($temp == 'Tank' || $temp == 'Bac')
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('product', ucfirst(__('product')).":",['class'=>'label_padding']) !!}
                                            <input id="product" type="text" class="form-control @error('product') is-invalid @enderror" name="product" value="{{ old('product') }}" required autocomplete="product" placeholder="{{ucfirst(__('product'))}}">
                                            @error('product')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('capacity', ucfirst(__('capacity')).":",['class'=>'label_padding']) !!}
                                            <input id="capacity" type="number" class="form-control" name="capacity" value="{{ old('capacity') }}" required autocomplete="capacity" placeholder="{{ ucfirst(__('capacity')) }}">
                                            @error('capacity')
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
                                            {!! Form::label('height', ucfirst(__('height')).":",['class'=>'label_padding']) !!}
                                            <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height" placeholder="{{ ucfirst(__('height')) }}">
                                            @error('height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('diameter', ucfirst(__('diameter')).":",['class'=>'label_padding']) !!}
                                            <input id="diameter" type="number" class="form-control" name="diameter" value="{{ old('diameter') }}" required autocomplete="diameter" placeholder="{{ucfirst(__('diameter'))}}">
                                            @error('diameter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('category', ucfirst(__('category')).":",['class'=>'label_padding']) !!}
                                                <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}" required autocomplete="category" placeholder="{{ ucfirst(__('category')) }}">
                                                @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												{!! Form::label('comm_on', ucfirst(__('commissioned on')).":",['class'=>'label_padding']) !!}
												<input id="comm_on" type="datetime-local" class="form-control" name="comm_on" value="{{ old('comm_on') }}" required autocomplete="comm_on" placeholder="{{ ucfirst(__('commissioned on')) }}">
												@error('comm_on')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
                                    </div>
                                @endif
								@if($temp != 'Compteur' && $temp != 'Fuel Meter')
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												{!! Form::label('comm_on', ucfirst(__('commissioned on')).":",['class'=>'label_padding']) !!}
												<input id="comm_on" type="datetime-local" class="form-control" name="comm_on" value="{{ old('comm_on') }}" required autocomplete="comm_on" placeholder="{{ ucfirst(__('commissioned on')) }}">
												@error('category')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
										</div>
									</div>
								@endif
							@else
								<div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('comm_on', ucfirst(__('commissioned on')).":",['class'=>'label_padding']) !!}
                                            <input id="comm_on" type="datetime-local" class="form-control" name="comm_on" value="{{ old('comm_on') }}" required autocomplete="comm_on" placeholder="{{ ucfirst(__('commissioned on')) }}">
                                            @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
											@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div id="submit-btn" class="ml-auto">
                                    <button class="btn  btn-yellow btn-general" type="submit"  title="Submit" role="button">{{__('Add')." ".$temp}}</button>
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
    <!-- Add Equipment Ends -->
@endsection
