@extends('layouts.without_footer')
@section('title', 'Equipments')
@section('content')
    <!-- Equipments -->
    <section id="users">

        <div class="content-box-md">

            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <ul class="nav nav-tabs">
                                <li class = "active"><a data-toggle="tab" href="#pumps">Pumps</a></li>
                                <li><a data-toggle="tab" href="#tanks">Tanks</a></li>
                                <li><a data-toggle="tab" href="#loadingArms">Loading Arms</a></li>
                                <li><a data-toggle="tab" href="#generators">Generators</a></li>
                                <li><a data-toggle="tab" href="#fuelMeters">Fuel Meters</a></li>
                            </ul>
                        </div>
                        {!! Form::open(['method'=>'GET', 'action'=> ['EquipmentController@create']]) !!}

                        <div class="row">
                            <div id="submit-btn" class="pull-right" style="margin:10px 7px 0px 0px;">
                                <button class="btn btn-general btn-primary" type="submit" role="button">Add Equipment</button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">

                </div>
            </div>

            {{--            Tab Elements--}}

            <div class="tab-content">
                <div id="pumps" class="tab-pane fade in active">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th class="column1">code</th>
                            <th class="column2">mark</th>
                            <th class="column3">type</th>
                            <th class="column4">model</th>
                            <th class="column5">product</th>
                            <th class="column6">rate</th>
                            <th class="column7">state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pumps as $pump)
                            <tr class="clickable-row" data-href="pumps/{{$pump->id}}">
                                <td class="column1">{{$pump->equipment->code}}</td>
                                <td class="column2">{{$pump->equipment->mark}}</td>
                                <td class="column3">{{$pump->equipment->type}}</td>
                                <td class="column4">{{$pump->equipment->model}}</td>
                                <td class="column5">{{$pump->product}}</td>
                                <td class="column6">{{$pump->rate}}</td>
                                <td class="column7">{{$pump->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="tanks" class="tab-pane fade">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th class="column1">code</th>
                            <th class="column2">mark</th>
                            <th class="column3">type</th>
                            <th class="column4">model</th>
                            <th class="column5">product</th>
                            <th class="column6">height</th>
                            <th class="column7">diameter</th>
                            <th class="column8">capacity</th>
                            <th class="column9">state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tanks as $tank)
                            <tr class="clickable-row" data-href="pumps/{{$tank->id}}">
                                <td class="column1">{{$tank->equipment->code}}</td>
                                <td class="column2">{{$tank->equipment->mark}}</td>
                                <td class="column3">{{$tank->equipment->type}}</td>
                                <td class="column4">{{$tank->equipment->model}}</td>
                                <td class="column1">{{$tank->product}}</td>
                                <td class="column2">{{$tank->height}}</td>
                                <td class="column2">{{$tank->diameter}}</td>
                                <td class="column2">{{$tank->capacity}}</td>
                                <td class="column4">{{$tank->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="loadingArms" class="tab-pane fade">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th class="column1">code</th>
                            <th class="column2">mark</th>
                            <th class="column3">type</th>
                            <th class="column4">model</th>
                            <th class="column5">product</th>
                            <th class="column6">rate</th>
                            <th class="column7">state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loadingArms as $loadingArm)
                            <tr class="clickable-row" data-href="pumps/{{$loadingArm->id}}">
                                <td class="column1">{{$loadingArm->equipment->code}}</td>
                                <td class="column2">{{$loadingArm->equipment->mark}}</td>
                                <td class="column3">{{$loadingArm->equipment->type}}</td>
                                <td class="column4">{{$loadingArm->equipment->model}}</td>
                                <td class="column5">{{$loadingArm->product}}</td>
                                <td class="column6">{{$loadingArm->rate}}</td>
                                <td class="column7">{{$loadingArm->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="generators" class="tab-pane fade">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th class="column1">code</th>
                            <th class="column2">mark</th>
                            <th class="column3">type</th>
                            <th class="column4">model</th>
                            <th class="column5">product</th>
                            <th class="column6">rate</th>
                            <th class="column7">state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($generators as $generator)
                            <tr class="clickable-row" data-href="pumps/{{$generator->id}}">
                                <td class="column1">{{$generator->equipment->code}}</td>
                                <td class="column2">{{$generator->equipment->mark}}</td>
                                <td class="column3">{{$generator->equipment->type}}</td>
                                <td class="column4">{{$generator->equipment->model}}</td>
                                <td class="column5">{{$generator->product}}</td>
                                <td class="column6">{{$generator->rate}}</td>
                                <td class="column7">{{$generator->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="fuelMeters" class="tab-pane fade">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th class="column1">code</th>
                            <th class="column2">mark</th>
                            <th class="column3">type</th>
                            <th class="column4">model</th>
                            <th class="column5">category</th>
                            <th class="column6">state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fuelMeters as $fuelMeter)
                            <tr class="clickable-row" data-href="pumps/{{$fuelMeter->id}}">
                                <td class="column1">{{$fuelMeter->equipment->code}}</td>
                                <td class="column2">{{$fuelMeter->equipment->mark}}</td>
                                <td class="column3">{{$fuelMeter->equipment->type}}</td>
                                <td class="column4">{{$fuelMeter->equipment->model}}</td>
                                <td class="column5">{{$fuelMeter->category}}</td>
                                <td class="column6">{{$fuelMeter->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{--            Tab Elements End --}}

        </div>
    </section>

    <!-- Centers Ends -->
@endSection
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
