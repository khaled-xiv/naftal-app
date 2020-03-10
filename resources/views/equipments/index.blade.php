@extends('layouts.without_footer')
@section('title', 'Equipments')
@section('content')
    <!-- Equipments -->
    <section id="users">

        <div class="content-box-md">

            <div class="container">


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
                            <th>code</th>
                            <th>mark</th>
                            <th>type</th>
                            <th>model</th>
                            <th>product</th>
                            <th>rate</th>
                            <th>state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pumps as $pump)
                            <tr class="clickable-row" data-href="pumps/{{$pump->id}}">
                                <td >{{$pump->equipment->code}}</td>
                                <td>{{$pump->equipment->mark}}</td>
                                <td >{{$pump->equipment->type}}</td>
                                <td >{{$pump->equipment->model}}</td>
                                <td >{{$pump->product}}</td>
                                <td >{{$pump->rate}}</td>
                                <td >{{$pump->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="tanks" class="tab-pane fade">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th >code</th>
                            <th >mark</th>
                            <th >type</th>
                            <th >model</th>
                            <th >product</th>
                            <th >height</th>
                            <th >diameter</th>
                            <th >capacity</th>
                            <th >state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tanks as $tank)
                            <tr class="clickable-row" data-href="pumps/{{$tank->id}}">
                                <td >{{$tank->equipment->code}}</td>
                                <td >{{$tank->equipment->mark}}</td>
                                <td >{{$tank->equipment->type}}</td>
                                <td >{{$tank->equipment->model}}</td>
                                <td >{{$tank->product}}</td>
                                <td >{{$tank->height}}</td>
                                <td >{{$tank->diameter}}</td>
                                <td >{{$tank->capacity}}</td>
                                <td >{{$tank->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="loadingArms" class="tab-pane fade">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th >code</th>
                            <th >mark</th>
                            <th >type</th>
                            <th >model</th>
                            <th >product</th>
                            <th >rate</th>
                            <th >state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loadingArms as $loadingArm)
                            <tr class="clickable-row" data-href="pumps/{{$loadingArm->id}}">
                                <td >{{$loadingArm->equipment->code}}</td>
                                <td >{{$loadingArm->equipment->mark}}</td>
                                <td >{{$loadingArm->equipment->type}}</td>
                                <td >{{$loadingArm->equipment->model}}</td>
                                <td >{{$loadingArm->product}}</td>
                                <td >{{$loadingArm->rate}}</td>
                                <td >{{$loadingArm->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="generators" class="tab-pane fade">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th >code</th>
                            <th >mark</th>
                            <th >type</th>
                            <th >model</th>
                            <th >product</th>
                            <th >rate</th>
                            <th >state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($generators as $generator)
                            <tr class="clickable-row" data-href="pumps/{{$generator->id}}">
                                <td >{{$generator->equipment->code}}</td>
                                <td >{{$generator->equipment->mark}}</td>
                                <td>{{$generator->equipment->type}}</td>
                                <td >{{$generator->equipment->model}}</td>
                                <td >{{$generator->product}}</td>
                                <td >{{$generator->rate}}</td>
                                <td >{{$generator->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="fuelMeters" class="tab-pane fade">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th >code</th>
                            <th >mark</th>
                            <th >type</th>
                            <th >model</th>
                            <th >category</th>
                            <th >state</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fuelMeters as $fuelMeter)
                            <tr class="clickable-row" data-href="pumps/{{$fuelMeter->id}}">
                                <td >{{$fuelMeter->equipment->code}}</td>
                                <td >{{$fuelMeter->equipment->mark}}</td>
                                <td >{{$fuelMeter->equipment->type}}</td>
                                <td >{{$fuelMeter->equipment->model}}</td>
                                <td >{{$fuelMeter->category}}</td>
                                <td>{{$fuelMeter->equipment->state}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{--            Tab Elements End --}}

            </div>
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
