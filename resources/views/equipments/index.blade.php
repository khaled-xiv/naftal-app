@extends('layouts.base')
@section('title', __('Equipments'))
@section('content')

    <!-- Services -->
    <section id="services">
        <!-- Services 02 -->
        <div id="services-02">
            <div class="content-box-md">

                <div id="services-tabs">
                    <ul class="text-center">
                        <li class="equipment active"><a href="#pumps">{{ __('Pumps') }}</a></li>
                        <li class="equipment"><a href="#tanks">{{ __('Tanks') }}</a></li>
                        <li class="equipment"><a href="#loadingArms">{{ __('Loading Arms') }}</a></li>
                        <li class="equipment"><a href="#generators">{{ __('Generators') }}</a></li>
                        <li class="equipment"><a href="#fuelMeters">{{ __('Fuel Meters') }}</a></li>
                    </ul>

                    <!-- Service Tab 01 -->
                    <div id="pumps" class="service-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 main-datatable">
                                    <div class="card_body">
                                        <div class="row d-flex">
                                            <div class="col-sm-4">
                                                {!! Form::open(['method'=>'GET', 'route' =>'equipment-create' ]) !!}
                                                <button class="btn btn-general btn-yellow"></button>
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="col-sm-8  add_flex">
                                                <div class="form-group searchInput">
                                                    <label for="filterbox1">{{__('Search')}}:</label>
                                                    <input type="search" class="form-control" id="filterbox1" placeholder=" ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overflow-x">
                                            <table style="width:100%;" id="filtertable1" class="table cust-datatable dataTable no-footer">
                                                <thead>
                                                <tr>
                                                    <th style="min-width:50px;">code</th>
                                                    <th style="min-width:100px;">{{ __('mark') }}</th>
                                                    <th style="min-width:100px;">{{ __('model') }}</th>
                                                    <th style="min-width:100px;">{{ __('product') }}</th>
                                                    <th style="min-width:100px;">{{ __('rate') }}</th>
                                                    <th style="min-width:100px;">{{ __('state') }}</th>
                                                    <th style="min-width:80px;">{{ __('center') }}</th>
                                                    <th style="min-width:100px;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pumps as $pump)
                                                    <tr>
                                                        <td>{{$pump->equipment->code}}</td>
                                                        <td>{{$pump->equipment->mark}}</td>
                                                        <td>{{$pump->equipment->model}}</td>
                                                        <td>{{$pump->product}}</td>
                                                        <td>{{$pump->rate}}</td>
                                                        <td><span class="mode mode_on"> {{$pump->equipment->state}}</span> </td>
                                                        <td>{{$pump->equipment->center->code}}</td>
                                                        <td class="actions" style="height: 50px">
                                                            <span class="actionCust">
                                                                <a href="{{str_replace('{id}', $pump->equipment->id,
                                                                             LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(),
                                                                              'routes.equipment-edit'))}}"><i class="fa fa-pencil-square-o"></i></a>
                                                            </span>
                                                                <span class="actionCust" >
                                                                <a href="#"><i class="fa fa-trash"></i></a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Service Tab 02 -->
                    <div id="tanks" class="service-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 main-datatable">
                                    <div class="card_body">
                                        <div class="row d-flex">
                                            <div class="col-sm-4">
                                                {!! Form::open(['method'=>'GET', 'route' =>'equipment-create' ]) !!}
                                                <button class="btn btn-general btn-yellow">{{__('Create new')}}</button>
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="col-sm-8  add_flex">
                                                <div class="form-group searchInput">
                                                    <label for="filterbox2">{{__('Search')}}:</label>
                                                    <input type="search" class="form-control" id="filterbox2" placeholder=" ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overflow-x">
                                            <table style="width:100%;" id="filtertable2" class="table cust-datatable dataTable no-footer">
                                                <thead>
                                                <tr>
                                                    <th style="min-width:50px;">code</th>
                                                    <th style="min-width:100px;">{{ __('mark') }}</th>
                                                    <th style="min-width:100px;">{{ __('model') }}</th>
                                                    <th style="min-width:100px;">{{ __('product') }}</th>
                                                    <th style="min-width:100px;">{{ __('capacity') }}</th>
                                                    <th style="min-width:100px;">{{ __('state') }}</th>
                                                    <th style="min-width:80px;">{{ __('center') }}</th>
                                                    <th style="min-width:100px;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($tanks as $tank)
                                                    <tr>
                                                        <td>{{$tank->equipment->code}}</td>
                                                        <td>{{$tank->equipment->mark}}</td>
                                                        <td>{{$tank->equipment->model}}</td>
                                                        <td>{{$tank->product}}</td>
                                                        <td>{{$tank->capacity}}</td>
                                                        <td><span class="mode mode_on"> {{$tank->equipment->state}}</span> </td>
														<td>{{$tank->equipment->center->code}}</td>
                                                        <td class="actions" style="height: 50px">
                                                            <span class="actionCust">
                                                                <a href="{{str_replace('{id}', $tank->equipment->id,
                                                                             LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(),
                                                                              'routes.equipment-edit'))}}"><i class="fa fa-pencil-square-o"></i></a>
                                                            </span>
                                                            <span class="actionCust" >
                                                                <a href="#"><i class="fa fa-trash"></i></a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Service Tab 03 -->

                    <div id="loadingArms" class="service-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 main-datatable">
                                    <div class="card_body">
                                        <div class="row d-flex">
                                            <div class="col-sm-4">
                                                {!! Form::open(['method'=>'GET', 'route' =>'equipment-create' ]) !!}
                                                <button class="btn btn-general btn-yellow">{{__('Create new')}}</button>
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="col-sm-8  add_flex">
                                                <div class="form-group searchInput">
                                                    <label for="filterbox3">{{__('Search')}}:</label>
                                                    <input type="search" class="form-control" id="filterbox3" placeholder=" ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overflow-x">
                                            <table style="width:100%;" id="filtertable3" class="table cust-datatable dataTable no-footer">
                                                <thead>
                                                <tr>
                                                    <th style="min-width:50px;">code</th>
                                                    <th style="min-width:100px;">{{ __('mark') }}</th>
                                                    <th style="min-width:100px;">{{ __('model') }}</th>
                                                    <th style="min-width:100px;">{{ __('product') }}</th>
                                                    <th style="min-width:100px;">{{ __('rate') }}</th>
                                                    <th style="min-width:100px;">{{ __('state') }}</th>
                                                    <th style="min-width:80px;">{{ __('center') }}</th>
                                                    <th style="min-width:100px;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($loadingArms as $loadingArm)
                                                    <tr>
                                                        <td>{{$loadingArm->equipment->code}}</td>
                                                        <td>{{$loadingArm->equipment->mark}}</td>
                                                        <td>{{$loadingArm->equipment->model}}</td>
                                                        <td>{{$loadingArm->product}}</td>
                                                        <td>{{$loadingArm->rate}}</td>
                                                        <td><span class="mode mode_on"> {{$loadingArm->equipment->state}}</span> </td>
														<td>{{$loadingArm->equipment->center->code}}</td>
                                                        <td class="actions" style="height: 50px">
                                                            <span class="actionCust">
                                                                <a href="{{str_replace('{id}', $loadingArm->equipment->id,
                                                                             LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(),
                                                                              'routes.equipment-edit'))}}"><i class="fa fa-pencil-square-o"></i></a>
                                                            </span>
                                                            <span class="actionCust" >
                                                                <a href="#"><i class="fa fa-trash"></i></a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Service Tab 04 -->
                    <div id="generators" class="service-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 main-datatable">
                                    <div class="card_body">
                                        <div class="row d-flex">
                                            <div class="col-sm-4">
                                                {!! Form::open(['method'=>'GET', 'route' =>'equipment-create' ]) !!}
                                                <button class="btn btn-general btn-yellow">{{__('Create new')}}</button>
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="col-sm-8  add_flex">
                                                <div class="form-group searchInput">
                                                    <label for="filterbox4">{{__('Search')}}:</label>
                                                    <input type="search" class="form-control" id="filterbox4" placeholder=" ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overflow-x">
                                            <table style="width:100%;" id="filtertable4" class="table cust-datatable dataTable no-footer">
                                                <thead>
                                                <tr>
                                                    <th style="min-width:50px;">code</th>
                                                    <th style="min-width:100px;">{{ __('mark') }}</th>
                                                    <th style="min-width:100px;">{{ __('model') }}</th>
                                                    <th style="min-width:100px;">{{ __('state') }}</th>
                                                    <th style="min-width:80px;">{{ __('center') }}</th>
                                                    <th style="min-width:100px;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($generators as $generator)
                                                    <tr>
                                                        <td>{{$generator->equipment->code}}</td>
                                                        <td>{{$generator->equipment->mark}}</td>
                                                        <td>{{$generator->equipment->model}}</td>
                                                        <td><span class="mode mode_on"> {{$generator->equipment->state}}</span> </td>
														<td>{{$generator->equipment->center->code}}</td>
                                                        <td class="actions" style="height: 50px">
                                                            <span class="actionCust">
                                                                <a href="{{str_replace('{id}', $generator->equipment->id,
                                                                             LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(),
                                                                              'routes.equipment-edit'))}}"><i class="fa fa-pencil-square-o"></i></a>
                                                            </span>
                                                            <span class="actionCust" >
                                                                <a href="#"><i class="fa fa-trash"></i></a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Service Tab 05 -->
                    <div id="fuelMeters" class="service-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 main-datatable">
                                    <div class="card_body">
                                        <div class="row d-flex">
                                            <div class="col-sm-4">
                                                {!! Form::open(['method'=>'GET', 'route' =>'equipment-create' ]) !!}
                                                <button class="btn btn-general btn-yellow">{{__('Create new')}}</button>
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="col-sm-8  add_flex">
                                                <div class="form-group searchInput">
                                                    <label for="filterbox5">{{__('Search')}}:</label>
                                                    <input type="search" class="form-control" id="filterbox5" placeholder=" ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overflow-x">
                                            <table style="width:100%;" id="filtertable5" class="table cust-datatable dataTable no-footer">
                                                <thead>
                                                <tr>
                                                    <th style="min-width:50px;">code</th>
                                                    <th style="min-width:100px;">{{ __('mark') }}</th>
                                                    <th style="min-width:100px;">{{ __('model') }}</th>
                                                    <th style="min-width:100px;">{{ __('category') }}</th>
                                                    <th style="min-width:100px;">{{ __('state') }}</th>
                                                    <th style="min-width:80px;">{{ __('center') }}</th>
                                                    <th style="min-width:100px;">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($fuelMeters as $fuelMeter)
                                                    <tr>
                                                        <td>{{$fuelMeter->equipment->code}}</td>
                                                        <td>{{$fuelMeter->equipment->mark}}</td>
                                                        <td>{{$fuelMeter->equipment->model}}</td>
                                                        <td>{{$fuelMeter->category}}</td>
                                                        <td><span class="mode mode_on"> {{$fuelMeter->equipment->state}}</span> </td>
														<td>{{$fuelMeter->equipment->center->code}}</td>
                                                        <td class="actions" style="height: 50px">
                                                            <span class="actionCust">
                                                                <a href="{{str_replace('{id}', $fuelMeter->equipment->id,
                                                                             LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(),
                                                                              'routes.equipment-edit'))}}"><i class="fa fa-pencil-square-o"></i></a>
                                                            </span>
                                                            <span class="actionCust" >
                                                                <a href="#"><i class="fa fa-trash"></i></a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Services 02 Ends -->
        </div>

    </section>
    <!-- Services Ends -->
	
	<?php
		$lang = \Illuminate\Support\Facades\App::getLocale()=='fr';
	?>
    <script>
        $(document).ready(function() {
			tableList = [];
			for(var i = 1; i <= 5; i++){
				var list = [];
				var size = 8;
				if(i == 4)
					size = 6;
				if(i == 5)
					size = 7;
				for(var j = 0; j < size; j++)
					list.push(null);
				var dataTable = $('#filtertable'+i).DataTable({
					@if($lang)
					"language": {
						"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
					},
					@endif
					"pageLength":5,
					'aoColumnDefs':[{
						'bSortable':false,
						'aTargets':['nosort'],
					}],
					columnDefs:[
						{type:'date-dd-mm-yyyy',aTargets:[5]}
					],
					"aoColumns":list,
					"bLengthChange":false,
					"dom":'<"top">ct<"top"p><"clear">',
				});
				tableList.push(dataTable);
				$("#filterbox"+i).keyup(function(){
					tableList[this.id.substr(9, 1) - 1].search(this.value).draw();
				});
			}
        });

        $(document).ready(function($) {
			var add = "add ";
			@if($lang)
				add = "ajouter ";
			@endif
            let equipment = $("ul li.active a").html();
            $('#add-icon').attr('title',add + equipment);

            $("button.btn-general").html(add + equipment);
            document.cookie='equip =' + equipment;
            $("li.equipment > a").click(function() {
                let equipment = $(this).html();
                $("button.btn-general").html(add + equipment);
                document.cookie='equip =' + equipment;
            });
        });
    </script>
@endSection


