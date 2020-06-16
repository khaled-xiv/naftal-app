@extends('layouts.without_footer')
@section('title', 'Edit request of intervention')
@section('content')
    <!-- Add Request -->
    <br>
    <section id="req_inter">
        <div class="content-box-md">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-8 offset-xs-1">

                        <div class="contact-right">

                            {!! Form::model($openned_req,['method'=>'PUT','id'=>'edit_form', 'action'=> ['Req_interController@update',encrypt($openned_req->id)]]) !!}
                            @csrf
                            <h4>{{__('Edit request of intervention')}}</h4>
                            <br>
                            <input type="hidden" id="is_admin" @if(Auth()->user()->is_district_chief())  value="true" @endif>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('number', __('Request number').':',['class'=>'label_padding']) !!}
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
                                        {!! Form::label('degree_urgency', __('Degree of urgency').':',['class'=>'label_padding']) !!}
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
                                        {!! Form::label('created_at', __('Date of creation').':',['class'=>'label_padding']) !!}
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
                                        {!! Form::label('equipment', __('Select an equipment').':',['class'=>'label_padding']) !!}
                                        {!! Form::select('equipment', $equips , null,
                                        ['class'=>'form-control','onchange="change_code()"','placeholder'=>__('Select an equipment')])!!}
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
                                        {!! Form::label('equipment_id', __('Select the equipment code').':',['class'=>'label_padding']) !!}
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
                                    @if(!$openned_req->intervention_date)
                                    <button class="btn btn-general btn-danger" data-toggle="modal" type="button" data-target="#delete-modal">{{__('Delete')}}</button>
                                    @endif
                                    <button class="btn btn-general btn-yellow" type="submit" title="Submit" role="button">{{__('Update')}}</button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                            <hr>

                            {!! Form::model($openned_req,['method'=>'PUT', 'id'=>'afet_inter_form','action'=> ['Req_interController@update_after_inter',encrypt($openned_req->id)]]) !!}

                            {!!Form::hidden('req_id',encrypt($openned_req->id),['id'=>'req_id'])!!}
                            @csrf
                            <h4>{{__('Details of intervention')}}</h4>
                            <br>

                            <div class="row">

                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('intervention_date', __('Date of intervention').':',['class'=>'label_padding']) !!}
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
                                        {!! Form::label('need_district', __('Send to district').':',['class'=>'label_padding']) !!}
                                        {!! Form::select('need_district', array('1'=>__('Yes'),'0'=>__('No')) , null,
                                        ['class'=>'form-control','required' => 'required'])!!}
                                        @error('need_district')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('component_id', __('Select components').':',['class'=>'label_padding']) !!}
                                        {!! Form::select('component_id[]', $comps, null,
                                        ['class'=>'selectpicker','id'=>'component_id_1','multiple'=>'multiple'])!!}
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
                                        {{__('Update')}}
                                    </button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                            @if($openned_req->need_district)

                            <hr>

                            {!! Form::model($openned_req,['method'=>'PUT', 'action'=> ['Req_interController@update_discrict_inter',encrypt($openned_req->id)]]) !!}

                            {!!Form::hidden('req_id',encrypt($openned_req->id),['id'=>'req_id'])!!}
                            @csrf
                            <h4>{{__('District Intervention')}}</h4>
                            <br>

                            <div class="row">

                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('intervention_date', __('Date of intervention').':',['class'=>'label_padding']) !!}
                                        <input id="intervention_date" type="datetime-local"
                                               class="form-control @error('intervention_date_2')  is-invalid @enderror" name="intervention_date_2"
                                               value="{{$openned_req->intervention_date_2}}" required autocomplete="created_at">
                                        @error('intervention_date_2')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('valide', 'Valide:',['class'=>'label_padding']) !!}
                                        {!! Form::select('valide', array('1'=>__('Yes'),'0'=>__('No')) , null,
                                        ['class'=>'form-control','required' => 'required'])!!}
                                        @error('valide')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('component_id', __('Select components').':',['class'=>'label_padding']) !!}
                                        {!! Form::select('component_id[]', $comps, null,
                                        ['class'=>'selectpicker','id'=>'component_id_2','multiple'=>'multiple'])!!}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                {!! Form::label('description_3', 'Description:',['class'=>'label_padding']) !!}
                                <textarea class="form-control text-left" id="description_2"  required name="description_3" placeholder="Enter a description"> {{$openned_req->description_3}} </textarea>
                                @error('description_3')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div id="submit-btn" class="ml-auto">
                                    <button class="btn btn-general btn-yellow" type="submit" title="Submit" role="button">
                                        {{__('Update')}}
                                    </button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteEquipment" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteEquipment">{{__('Are you sure you want to delete this request?')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['method'=>'delete','id'=>'delete_modal','action'=>['Req_interController@destroy',encrypt($openned_req->id)]]) !!}
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>



<script >

    $('.selectpicker').selectpicker();
    $('.filter-option-inner-inner').text('{{__("Nothing is selected")}}');

    if($('#is_admin').val()=='true'){
        $("#edit_form :input,#afet_inter_form :input").prop("disabled", true);
    }

    $(document).ready(function () {
        $.ajax({
            type:'post',
            url:'/{{app()->getLocale()}}/getSelectedComps',
            data: { id:$('#req_id').val(), _token: '{{csrf_token()}}' },
            success:function(data){
                data=Object.values(data);
                var t="";
                $("#component_id_1 option").each(function(){
                    if (data[0].includes(parseInt($(this).val()))){
                        $(this).attr('selected','selected');
                        t=t+$(this).text()+',';
                    }
                    if (t!="")$('.filter-option-inner-inner').text(t);

                });
                var t="";
                $("#component_id_2 option").each(function(){
                    if (data[0].includes(parseInt($(this).val()))){
                        $(this).attr('selected','selected');
                        t=t+$(this).text()+',';
                    }
                    if (t!="")$('.filter-option-inner-inner').text(t);
                });

            }
        })
    })

    function change_code() {
        $.ajax({
            type:'post',
            url:'/{{app()->getLocale()}}/getequipment',
            data: { name:$("select[name='equipment']").val(), _token: '{{csrf_token()}}' },
            success:function(data){
                $("#equipment_id_code").show();
                console.log(data.msg);
                $("#equipment_id").children().remove();
                for (var i = 0; i < data.msg.length; i++){

                    $("#equipment_id").append('<option value='+data.msg[i].equipment_id+' >' + data.msg[i].code + '</option>');//.val(data.msg[i].equipment_id);
                }

            }
        })
    }

</script>
    <!--  Add Request Ends -->
@endsection
