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


                <div class="row" style="display:{!! $errors->hasBag('components') ? 'inline;' : 'none;' !!}">
                    <div class="alert alert-danger" role = "alert">
                        component not added, make sure that the reference is unique.
                    </div>
                </div>

                <div class="row">
                    <!-- col-md-offset-3 -->
                    <div class="col-md-6">

                        <div class="contact-right">
                            {!! Form::model($equipment, ['method'=>'PUT', 'action'=> ['EquipmentController@update', $equipment->id]]) !!}
                            @csrf
                            <h4>Edit {{substr($temp, 0, -1)}}</h4>
                            <br><br>


                            <div class="row">
                                <div class="col-md-6 col-sm-6">
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
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('type', 'Type:',['class'=>'label_padding']) !!}
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
                                        {!! Form::label('mark', 'Mark:',['class'=>'label_padding']) !!}
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
                                        {!! Form::label('model', 'Model:',['class'=>'label_padding']) !!}
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
                                                {!! Form::label('product', 'Product:',['class'=>'label_padding']) !!}
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
                                                {!! Form::label('rate', 'Rate:',['class'=>'label_padding']) !!}
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
                                                {!! Form::label('product', 'Product:',['class'=>'label_padding']) !!}
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
                                                {!! Form::label('capacity', 'Capacity:',['class'=>'label_padding']) !!}
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
                                                {!! Form::label('height', 'Height:',['class'=>'label_padding']) !!}
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
                                                {!! Form::label('diameter', 'Diameter:',['class'=>'label_padding']) !!}
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
                                                {!! Form::label('category', 'Category:',['class'=>'label_padding']) !!}
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
                                        {!! Form::label('state', 'State:',['class'=>'label_padding']) !!}
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

                            <div class="row">
                                <div id="submit-btn" class="pull-right" style="margin-top:5px;">
                                    <button class="btn btn-general btn-danger" data-toggle="modal" data-target="#DeleteEquipModal" role="button">Delete {{substr($temp, 0, -1)}}</button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="contact-right">
                            <h4>Components:</h4>
                            <hr>
                            @foreach($components as $component)
                                    <div class="card border-dark mb-3" style="max-width: 23rem;">
                                        <div class="card-header">
                                            <em>{{$component->designation}}</em>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <b>mark:</b> {{$component->mark}}<br>
                                                <b>reference:</b> {{$component->reference}}
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    {!! Form::open(['method'=>'GET', 'action'=> ['ComponentController@edit', $component->id]]) !!}
                                                        <button style="color: #069;text-decoration: underline;cursor: pointer;" type="submit" role="button">Edit Component</button>
                                                    {!! Form::close() !!}
                                                </div>
                                                <div class="col-md-6">
                                                        <button class="component-del" style="color: #ff3333;text-decoration: underline;cursor: pointer;" data-toggle="modal" data-target="#DeleteCompModal" data-comp-id="{{$component->id}}" role="button">Delete Component</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><hr>
                            @endforeach
                                <button class="btn btn-yellow" data-toggle="modal" data-target="#ComponentModal" role="button">Add Component</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="ComponentModal" tabindex="-1" role="dialog" aria-labelledby="addComponent" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addComponent">Add new component</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['method'=>'POST', 'action'=> 'ComponentController@store']) !!}
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="equipment" value="{{$equipment->id}}"/>
                                    {!! Form::label('designation', 'Designation:',['class'=>'label_padding']) !!}
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
                                    {!! Form::label('mark', 'Mark:',['class'=>'label_padding']) !!}
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
                                    {!! Form::label('reference', 'Reference:',['class'=>'label_padding']) !!}
                                    <input id="reference" type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{ old('reference') }}" required autocomplete="reference" placeholder="Reference">
                                    @error('reference')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('commissioned_on', 'Commissioned on:',['class'=>'label_padding']) !!}
                                    <input id="commissioned_on" type="date" class="form-control" name="commissioned_on" required autocomplete="commissioned_on">
                                    @error('commissioned_on')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-yellow">Add this component</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="modal fade" id="DeleteEquipModal" tabindex="-1" role="dialog" aria-labelledby="DeleteEquipment" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DeleteEquipment">Are you sure you want to delete this equipment?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['EquipmentController@destroy', $equipment->id]]) !!}
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete equipment</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="modal fade" id="DeleteCompModal" tabindex="-1" role="dialog" aria-labelledby="DeleteComponent" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content component-del-2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DeleteComponent">Are you sure you want to delete this component?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE"/>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete component</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function($) {
            $(document).on("click", ".component-del", function () {
                let Id = $(this).data('comp-id');
                $(".component-del-2 form").attr('action', '/components/' + Id);
            });
        });
    </script>
    <!-- Edit Equipment Ends -->
@endsection
