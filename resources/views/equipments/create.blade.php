<?php
    $temp = $_COOKIE['equip'];
?>

@extends('layouts.without_footer')
@section('title', 'Add a '.substr($temp, 0, -1))
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
                            <h4>Add {{substr($temp, 0, -1)}}</h4>
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
                                        {!! Form::label('mark', 'Mark:',['class'=>'label_padding']) !!}
                                        <input id="mark" type="text" class="form-control @error('mark') is-invalid @enderror" name="mark" value="{{ old('mark') }}" required autocomplete="mark" placeholder="Mark">

                                        @error('mark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('model', 'Model:',['class'=>'label_padding']) !!}
                                        <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}" required autocomplete="model" placeholder="Model">
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
                                        {!! Form::label('state', 'State:',['class'=>'label_padding']) !!}
                                        {!! Form::select('state',  ['ON' => 'Active', 'OFF' => 'Not Active'], 'ON', ['class'=>'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('centers', 'Centers:',['class'=>'label_padding']) !!}
                                        {!! Form::select('centers', $centers , null, ['class'=>'form-control'])!!}
                                    </div>
                                </div>
                            </div>
                            @if($temp != 'Generators')
                                @if($temp == 'Pumps' || $temp == 'Loading Arms')
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('product', 'Product:',['class'=>'label_padding']) !!}
                                                <input id="product" type="text" class="form-control @error('product') is-invalid @enderror" name="product" value="{{ old('product') }}" required autocomplete="product" placeholder="Product">
                                                @error('product')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('rate', 'Rate:',['class'=>'label_padding']) !!}
                                                <input id="rate" type="number" class="form-control" name="rate" value="{{ old('rate') }}" required autocomplete="rate" placeholder="Rate">
                                                @error('rate')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @elseif($temp == 'Tanks')
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('product', 'Product:',['class'=>'label_padding']) !!}
                                            <input id="product" type="text" class="form-control @error('product') is-invalid @enderror" name="product" value="{{ old('product') }}" required autocomplete="product" placeholder="Product">
                                            @error('product')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('capacity', 'Capacity:',['class'=>'label_padding']) !!}
                                            <input id="capacity" type="number" class="form-control" name="capacity" value="{{ old('capacity') }}" required autocomplete="capacity" placeholder="Capacity">
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
                                            {!! Form::label('height', 'Height:',['class'=>'label_padding']) !!}
                                            <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height" placeholder="Height">
                                            @error('height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('diameter', 'Diameter:',['class'=>'label_padding']) !!}
                                            <input id="diameter" type="number" class="form-control" name="diameter" value="{{ old('diameter') }}" required autocomplete="diameter" placeholder="Diameter">
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
                                                {!! Form::label('category', 'Category:',['class'=>'label_padding']) !!}
                                                <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}" required autocomplete="category" placeholder="Category">
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
                            @endif
                            <div class="row">
                                <div id="submit-btn" class="ml-auto">
                                    <button class="btn  btn-yellow" type="submit"  title="Submit" role="button">Add {{substr($temp, 0, -1)}}</button>
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
