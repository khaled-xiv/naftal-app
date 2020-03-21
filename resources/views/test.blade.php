@extends('layouts.without_footer')
@section('title', 'Edit request of intervention')
@section('content')

<div class="container">

    <br><br><br><br><br><br><br><br><br><br>
    <h1>Laravel Bootstrap Timepicker</h1>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <select class="selectpicker form-control" multiple>
                    <option>Mustard</option>
                    <option>Ketchup</option>
                    <option>Relish</option>
                </select>
            </div>
        </div>
    </div>



</div>
<script >

    $('select').selectpicker();


</script>
@endsection
