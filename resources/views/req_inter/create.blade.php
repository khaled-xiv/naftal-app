@extends('layouts.without_footer')
@section('title', 'Create request of intervention')
@section('content')
<!-- Add Request -->
<br>
<section id="req_inter">

    <div class="content-box-md">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-md-offset-4">

                    <div id="contact-right">

                        {!! Form::open(['method'=>'POST', 'action'=> 'Req_interController@store']) !!}
                        @csrf
                        <h4>Create Request of Intervention</h4>
                        <br>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('number', 'Request number:',['class'=>'label_padding']) !!}
                                    <input id="number" type="text"
                                           class="form-control @error('number') is-invalid @enderror" name="number"
                                           value="{{ old('number') }}" required autocomplete="number"
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

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('created_at', 'Date of creation:',['class'=>'label_padding']) !!}
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

                            <div class="col-md-6 col-sm-6">
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

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group" id="equipment_id_code" style="display: none">
                                    {!! Form::label('equipment_id', 'Select the equipment code:',['class'=>'label_padding']) !!}
                                    {!! Form::select('equipment_id',[], null,
                                    ['class'=>'form-control','id'=>'equipment_id'])!!}
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
                            <textarea class="form-control" id="description" required name="description" placeholder="Enter a description"></textarea>
                            @error('description')
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
<!--  Add Request Ends -->
@endsection

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>


    $(window).on('load', function () { // makes sure that whole site is loaded
        if($("select[name='equipment']").val()){
            change_code();
        }
    });

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
