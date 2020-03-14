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

                    <div class="col-md-6 col-md-offset-3">

                        <div id="contact-right">
                            {!! Form::open(['method'=>'POST', 'action'=> 'EquipmentController@store']) !!}
                            @csrf
                            <h4>Add {{substr($temp, 0, -1)}}</h4>
                            <br><br>


                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" placeholder="Code">
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
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
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="mark" type="text" class="form-control @error('mark') is-invalid @enderror" name="mark" required autocomplete="mark" placeholder="Mark">

                                        @error('mark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="model" type="text" class="form-control" name="model" required autocomplete="model" placeholder="Model">
                                        @error('model')
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
                                        {!! Form::select('state',  ['ON' => 'Active', 'OFF' => 'Not Active'], 'ON', ['class'=>'form-control'])!!}

                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::select('center_id', $centers , null, ['class'=>'form-control', 'placeholder'=>'select a center'])!!}
                                        @error('center_id')
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
                                                <input id="product" type="text" class="form-control @error('product') is-invalid @enderror" name="product" required autocomplete="product" placeholder="Product">
                                                @error('product')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input id="rate" type="number" class="form-control" name="rate" required autocomplete="rate" placeholder="Rate">
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
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input id="product" type="text" class="form-control @error('product') is-invalid @enderror" name="product" required autocomplete="product" placeholder="Product">
                                            @error('product')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input id="capacity" type="number" class="form-control" name="capacity" required autocomplete="capacity" placeholder="Capacity">
                                            @error('capacity')
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
                                            <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" required autocomplete="height" placeholder="Height">
                                            @error('height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input id="diameter" type="number" class="form-control" name="diameter" required autocomplete="diameter" placeholder="Diameter">
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
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input id="category" type="text" class="form-control" name="category" required autocomplete="category" placeholder="Category">
                                                @error('category')
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
                                <div id="submit-btn" class="pull-right">
                                    <button class="btn btn-general btn-yellow" type="submit"  title="Submit" role="button">Add {{substr($temp, 0, -1)}}</button>
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
