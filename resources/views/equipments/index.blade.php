@extends('layouts.without_footer')
@section('title', 'Request of intervention')
@section('content')

    <!-- Services -->
    <section id="services">
        <!-- Services 02 -->
        <div id="services-02">
            <div class="content-box-md">

                <div id="services-tabs">
                    <ul class="text-center">
                        <li class="equipment active"><a href="#service-tab-1">Pumps</a></li>
                        <li class="equipment"><a href="#service-tab-2">Tanks</a></li>
                        <li class="equipment"><a href="#service-tab-3">Loading Arms</a></li>
                        <li class="equipment"><a href="#service-tab-4">Generators</a></li>
                        <li class="equipment"><a href="#service-tab-5">Fuel Meters</a></li>
                    </ul>

                    <!-- Service Tab 01 -->
                    <div id="service-tab-1" class="service-tab">
                        <div class="container">
                            <div class="row">
                                <table class="js-sort-table">
                                    <thead>
                                    <tr class="table100-head">
                                        <th>code</th>
                                        <th>mark</th>
                                        <th>type</th>
                                        <th>model</th>
                                        <th>product</th>
                                        <th class="js-sort-number">rate</th>
                                        <th>state</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pumps as $pump)
                                        <tr class="clickable-row" data-href="equipments/{{$pump->equipment->id}}/edit">
                                            <td>{{$pump->equipment->code}}</td>
                                            <td>{{$pump->equipment->mark}}</td>
                                            <td>{{$pump->equipment->type}}</td>
                                            <td>{{$pump->equipment->model}}</td>
                                            <td>{{$pump->product}}</td>
                                            <td>{{$pump->rate}}</td>
                                            <td>{{$pump->equipment->state}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- Service Tab 02 -->
                    <div id="service-tab-2" class="service-tab">
                        <div class="container">
                            <div class="row">
                                <table>
                                    <thead>
                                    <tr class="table100-head">
                                        <th>code</th>
                                        <th>mark</th>
                                        <th>type</th>
                                        <th>model</th>
                                        <th>product</th>
                                        <th>height</th>
                                        <th>diameter</th>
                                        <th>capacity</th>
                                        <th>state</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tanks as $tank)
                                        <tr class="clickable-row" data-href="equipments/{{$tank->equipment->id}}/edit">
                                            <td>{{$tank->equipment->code}}</td>
                                            <td>{{$tank->equipment->mark}}</td>
                                            <td>{{$tank->equipment->model}}</td>
                                            <td>{{$tank->equipment->type}}</td>
                                            <td>{{$tank->product}}</td>
                                            <td>{{$tank->height}}</td>
                                            <td>{{$tank->diameter}}</td>
                                            <td>{{$tank->capacity}}</td>
                                            <td>{{$tank->equipment->state}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- Service Tab 03 -->
                    <div id="service-tab-3" class="service-tab">
                        <div class="container">
                            <div class="row">
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
                                    @foreach($loadingArms as $loadingArm)
                                        <tr class="clickable-row" data-href="equipments/{{$loadingArm->equipment->id}}/edit">
                                            <td>{{$loadingArm->equipment->code}}</td>
                                            <td>{{$loadingArm->equipment->mark}}</td>
                                            <td>{{$loadingArm->equipment->type}}</td>
                                            <td>{{$loadingArm->equipment->model}}</td>
                                            <td>{{$loadingArm->product}}</td>
                                            <td>{{$loadingArm->rate}}</td>
                                            <td>{{$loadingArm->equipment->state}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- Service Tab 04 -->
                    <div id="service-tab-4" class="service-tab">
                        <div class="container">
                            <div class="row">
                                <table>
                                    <thead>
                                    <tr class="table100-head">
                                        <th>code</th>
                                        <th>mark</th>
                                        <th>type</th>
                                        <th>model</th>
                                        <th>state</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($generators as $generator)
                                        <tr class="clickable-row" data-href="equipments/{{$generator->equipment->id}}/edit">
                                            <td>{{$generator->equipment->code}}</td>
                                            <td>{{$generator->equipment->mark}}</td>
                                            <td>{{$generator->equipment->type}}</td>
                                            <td>{{$generator->equipment->model}}</td>
                                            <td>{{$generator->equipment->state}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- Service Tab 05 -->
                    <div id="service-tab-5" class="service-tab">
                        <div class="container">
                            <div class="row">
                                <table>
                                    <thead>
                                    <tr class="table100-head">
                                        <th>code</th>
                                        <th>mark</th>
                                        <th>type</th>
                                        <th>model</th>
                                        <th>category</th>
                                        <th>state</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fuelMeters as $fuelMeter)
                                        <tr class="clickable-row" data-href="equipments/{{$fuelMeter->equipment->id}}/edit">
                                            <td>{{$fuelMeter->equipment->code}}</td>
                                            <td>{{$fuelMeter->equipment->mark}}</td>
                                            <td>{{$fuelMeter->equipment->type}}</td>
                                            <td>{{$fuelMeter->equipment->model}}</td>
                                            <td>{{$fuelMeter->category}}</td>
                                            <td>{{$fuelMeter->equipment->state}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Services 02 Ends -->
        </div>

        <!--         add icon-->
        <a href="/equipments/create" id="add-icon" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" role="button">
            <i class="fa fa-plus"></i>
        </a>
    </section>
    <!-- Services Ends -->


    <script>
        $(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
            let equipment = $("ul li.active a").html();
            $('#add-icon').attr('title',"Add "+equipment);
            
            $("button.btn-primary").html("add " + equipment);
            document.cookie='equip =' + equipment;
            $("li.equipment").click(function() {
                let equipment = $("a", this).html();
                $("button.btn-primary").html("add " + equipment);
                document.cookie='equip =' + equipment;
            });

        });
    </script>
@endSection


