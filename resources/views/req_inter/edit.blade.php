@extends('layouts.without_footer')
@section('title', 'Edit request of intervention')
@section('content')
    <!-- Add Request -->
    <br>
    <section id="req_inter">

        <div class="content-box-md">

            <div class="container">

                <div class="row align-items-start " style="border:1px solid red">

                    <div class="col-xl-6  col-lg-8  col-md-10  col-sm-10  col-xs-8 ">

                        <div class="contact-right">

                            {!! Form::model($openned_req,['method'=>'PUT', 'action'=> ['Req_interController@update',$openned_req->id]]) !!}
                            @csrf
                            <h4>Create Request of Intervention</h4>
                            <br>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('number', 'Request number:',['class'=>'label_padding']) !!}
                                        {!! Form::text('number', old('number'), ['class'=> $errors->get('number') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('degree_urgency', 'Degree of urgency:',['class'=>'label_padding']) !!}
                                        {!! Form::select('degree_urgency', array('1'=>'1','2'=>'2','3'=>'3') , null,
                                        ['class'=>'form-control','placeholder'=>'Select the degree of urgency'])!!}
                                        @error('degree_urgency')
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
                                        {!! Form::label('created_at', 'Date of creation:',['class'=>'label_padding']) !!}
                                        <input id="created_at" type="datetime-local"
                                               class="form-control @error('created_at')  is-invalid @enderror" name="created_at"
                                               value="{{ $openned_req->created_at }}" required autocomplete="created_at">
                                        @error('created_at')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('equipment', 'Select an equipment:',['class'=>'label_padding']) !!}
                                        {!! Form::select('equipment', $equips , null,
                                        ['class'=>'form-control','onchange="change_code()"','placeholder'=>'Select an equipment'])!!}
                                        @error('equipment')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group" id="equipment_id_code" >
                                        {!! Form::label('equipment_id', 'Select the equipment code:',['class'=>'label_padding']) !!}
                                        @if($openned_req['equipment_name']=='Pumps')
                                        {!! Form::select('equipment_id',$pumps, null,['class'=>'form-control','id'=>'equipment_id'])!!}
                                        @elseif($openned_req['equipment_name']=='Generators')
                                            {!! Form::select('equipment_id',$generators, null,['class'=>'form-control','id'=>'equipment_id'])!!}
                                        @elseif($openned_req['equipment_name']=='Tanks')
                                            {!! Form::select('equipment_id',$tanks, null,['class'=>'form-control','id'=>'equipment_id'])!!}
                                        @elseif($openned_req['equipment_name']=='Loding arms')
                                            {!! Form::select('equipment_id',$loadingArms, null,['class'=>'form-control','id'=>'equipment_id'])!!}
                                        @elseif($openned_req['equipment_name']=='Fuel meters')
                                            {!! Form::select('equipment_id',$fuelMeters, null,['class'=>'form-control','id'=>'equipment_id'])!!}
                                        @endif
                                        @error('equipment_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                {!! Form::label('description', 'Description:',['class'=>'label_padding']) !!}
                                <textarea class="form-control text-left" id="description"  required name="description" placeholder="Enter a description"> {{$openned_req->description}}

                                </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div id="submit-btn" class="ml-auto">
                                    <button class="btn btn-general btn-yellow" type="submit" title="Submit" role="button">
                                        Update
                                    </button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>

                    </div>
                    <div class="col-xl-6   col-lg-8  col-md-10  col-sm-10  col-xs-8 ">
                        <div class="row">
                            <div class="contact-right">

                                {!! Form::model($openned_req,['method'=>'PUT', 'action'=> ['Req_interController@update_after_inter',$openned_req->id]]) !!}
                                @csrf
                                <h4>After Intervention</h4>
                                <br>

                                <div class="row">

                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('intervention_date', 'Date of intervention:',['class'=>'label_padding']) !!}
                                            <input id="intervention_date" type="datetime-local"
                                                   class="form-control @error('intervention_date')  is-invalid @enderror" name="intervention_date"
                                                   value="{{$openned_req->intervention_date}}" required autocomplete="created_at">
                                            @error('intervention_date')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('need_district', 'Send to district:',['class'=>'label_padding']) !!}
                                            {!! Form::select('need_district', array('1'=>'Yes','0'=>'No') , null,
                                            ['class'=>'form-control','placeholder'=>'Select the degree of urgency','required' => 'required'])!!}
                                            @error('need_district')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group" style="border:  1px solid red " >
                                            <select class="selectpicker form-control">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    {!! Form::label('description_2', 'Description:',['class'=>'label_padding']) !!}
                                    <textarea class="form-control text-left" id="description_2"  required name="description_2" placeholder="Enter a description"> {{$openned_req->description_2}} </textarea>
                                    @error('description_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div id="submit-btn" class="ml-auto">
                                        <button class="btn btn-general btn-yellow" type="submit" title="Submit" role="button">
                                            Update
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


<script >

    $('select').selectpicker();

    function change_code() {
        $.ajax({
            type:'post',
            url:'/getequipment',
            data: { name:$("select[name='equipment']").val(), _token: '{{csrf_token()}}' },
            success:function(data){
                $("#equipment_id_code").show();
                console.log(data);
                $("#equipment_id").children().remove();
                for (var i = 0; i <= data.length; i++) {

                    $("#equipment_id").append('<option value='+data[i].equipment_id+' >' + data[i].code + '</option>').val(data[i].equipment_id);
                }

            }
        })
    }

</script>
    <!--  Add Request Ends -->
@endsection
