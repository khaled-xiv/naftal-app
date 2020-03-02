@extends('layouts.without_footer')
@section('title', 'Edit request of intervention')
@section('content')
<!-- Add User -->
<br>
<section id="req_inter">

    <div class="content-box-md">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-md-offset-4">

                    <div id="contact-right">

                        {!! Form::model($req_inter,['method'=>'PATCH', 'action'=> ['Req_interController@update',$req_inter->id]]) !!}
                        @csrf
                        <h4>Edit Request of Intervention</h4>
                        <br>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input id="number" type="text"
                                           class="form-control @error('number') is-invalid @enderror" name="number"
                                           value="{{ $req_inter->number }}" required autocomplete="number"
                                           placeholder="Enter the request number">
                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::select('equipement_id', $equips , null,
                                    ['class'=>'form-control','placeholder'=>'Select an equipement'])!!}
                                    @error('equipement_id')
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
                                    {!! Form::select('degree_urgency', degree_urgency , null,
                                    ['class'=>'form-control','placeholder'=>'Select the degree of urgency'])!!}
                                    @error('degree_urgency')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input id="created_at" type="datetime-local"
                                           class="form-control @error('created_at')  is-invalid @enderror" name="created_at"
                                           value="{{ old('created_at') }}" required autocomplete="created_at">
                                    @error('created_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <textarea class="form-control" id="description" required name="description" placeholder="description"></textarea>
                            @error('descrption')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div id="submit-btn" class="pull-right">
                                <button class="btn btn-general btn-yellow" type="submit" title="Submit" role="button">
                                    Create
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>


            </div>

        </div>

    </div>

    </div>

</section>
<!-- Add User Ends -->
@endsection
