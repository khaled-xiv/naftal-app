@extends('layouts.base')
@section('title', 'Edit Component')
@section('content')
    <!-- Edit Component -->
    <br>
    <section id="add-user">
        <div class="content-box-md">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="contact-right">
                            {!! Form::model($component, ['method'=>'PUT', 'action'=> ['ComponentController@update', $component->id]]) !!}
                            @csrf
                            <h4>{{ __('Edit')." ".ucfirst(__('component')) }}</h4>
                            <br><br>
                                <div class="form-group" style="width:100%;">
                                    {!! Form::label('designation', ucfirst(__('designation')).":",['class'=>'label_padding']) !!}
                                    {!! Form::text('designation', old('designation'), ['class'=> $errors->get('designation') ? 'form-control is-invalid' : 'form-control']) !!}
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group" style="width:100%;">
                                    {!! Form::label('mark', ucfirst(__('mark')).":",['class'=>'label_padding']) !!}
                                    {!! Form::text('mark', old('mark'), ['class'=> $errors->get('mark') ? 'form-control is-invalid' : 'form-control']) !!}
                                    @error('mark')
                                    <span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
                                    @enderror
                                </div>
                                <div class="form-group" style="width:100%;">
                                    {!! Form::label('reference', ucfirst(__('reference')).":",['class'=>'label_padding']) !!}
                                    {!! Form::text('reference', old('reference'), ['class'=> $errors->get('reference') ? 'form-control is-invalid' : 'form-control']) !!}
                                    @error('reference')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div id="submit-btn" style="text-align: right;">
                                    <button class="btn btn-general btn-yellow" type="submit"  title="Submit" role="button">{{ __('Edit')." ".ucfirst(__('component')) }}</button>
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
