@extends('layouts.base')
@section('title', 'Edit Component')
@section('content')
    <!-- Edit Component -->
    <br>
    <section id="add-user">
        <div class="content-box-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="contact-right">
                            {!! Form::model($component, ['method'=>'PUT', 'action'=> ['ComponentController@update', $component->id]]) !!}
                            @csrf
                            <h4>{{ __('Edit')." ".ucfirst(__('component')) }}</h4>
                            <br><br>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('designation', ucfirst(__('designation')).":",['class'=>'label_padding']) !!}
                                        {!! Form::text('designation', old('designation'), ['class'=> $errors->get('designation') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('mark', ucfirst(__('mark')).":",['class'=>'label_padding']) !!}
                                        {!! Form::text('mark', old('mark'), ['class'=> $errors->get('mark') ? 'form-control is-invalid' : 'form-control']) !!}
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
                                        {!! Form::label('reference', ucfirst(__('reference')).":",['class'=>'label_padding']) !!}
                                        {!! Form::text('reference', old('reference'), ['class'=> $errors->get('reference') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('commissioned_on', ucfirst(__('commissioned on')).":",['class'=>'label_padding']) !!}
                                        {!! Form::date('commissioned_on', old('commissioned_on'), ['class'=> $errors->get('commissioned_on') ? 'form-control is-invalid' : 'form-control']) !!}
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
                                    <button class="btn btn-general btn-yellow" type="submit"  title="Submit" role="button">{{ __('Edit')." ".ucfirst(__('component')) }}</button>
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
    <!-- Edit Component Ends -->
@endsection
