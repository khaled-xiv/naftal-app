@extends('layouts.base')
@section('title', __('Dashboard'))
@section('content')
    <!-- Users -->
    <section id="dashboard">

        <div class="content-box-md">
            <div class="container">

				<div id="notif">
					<div id="notif-dec"></div>
					<div id="notif-content"></div>
				</div>

                <div id="stats-items" class="row wow fadeInUp owl-carousel owl-theme" data-wow-duration="2s">

                    <div class="stats-item text-center">
                        <i class="fa fa-building-o"></i>
                        <h3 class="counter">{{$count['centers']}}</h3>
                        <p>{{__('Centers')}}</p>
                    </div>

                    <div class="stats-item text-center">
                        <i class="fa fa-gears"></i>
                        <h3 class="counter">{{$count['equipments']}}</h3>
                        <p>{{__('Equipments')}}</p>
                    </div>

                    <div class="stats-item text-center">
                        <i class="fa fa-users"></i>
                        <h3 class="counter">{{$count['users']}}</h3>
                        <p>{{__('New users')}}</p>
                    </div>

                    <div class="stats-item text-center">
                        <i class="fa fa-newspaper-o"></i>
                        <h3 class="counter">{{$count['posts']}}</h3>
                        <p>{{__('New posts')}}</p>
                    </div>

                    <div class="stats-item text-center">
                        <i class="fa fa-comments"></i>
                        <h3 class="counter">{{$count['comments']}}</h3>
                        <p>{{__('New comments')}}</p>
                    </div>

                </div>
                <!-- Stats Ends -->
                <div class="row">
                    <br/>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <div class="panel panel-default contact-right">
                            <div class="panel-heading"><b>{{__('Errors history')}}</b></div>
                            <div class="panel-body">
                                <canvas id="errors" height="350" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <div class="panel panel-default contact-right">
                            <div class="panel-heading"><b>{{__('Maintenances history')}}</b></div>
                            <div class="panel-body">
                                <canvas id="maints" height="350" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <div class="panel panel-default contact-right">
                            <div class="panel-heading"><b>{{__('Failures history')}}</b></div>
                            <div class="panel-body">
                                <canvas id="failures" height="350" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="{{asset('js/chart/Chart.min.js')}}"></script>
                <script>

                    function getRandomColor() {
                        var letters = '0123456789ABCDEF'.split('');
                        var color = '#';
                        for (var i = 0; i < 6; i++ ) {
                            color += letters[Math.floor(Math.random() * 16)];
                        }
                        return color;
                    }

					var timeout;
                    var url = "{{url('dashboard/errors')}}";
                    var error_codes = new Array();
                    var Labels = new Array();
                    var counts = new Array();
                    $(document).ready(function(){
						getPredictions();
                        $.get(url, function(response){
                            response.forEach(function(data){
                                error_codes.push(data.error_code);
                                Labels.push(data.stockName);
                                counts.push(data.count);
                            });
                            var ctx = document.getElementById("errors").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels:error_codes,
                                    datasets: [{
                                        label: "{{__('Total number of errors occured')}}",
                                        data: counts,
                                        barThickness: 30,
                                        maxBarThickness: 30,
                                        minBarLength: 10,
                                        backgroundColor:getRandomColor()
                                    }],
                                },
                                options: {
                                    scales: {
                                        xAxes: [{
                                            scaleLabel: {
                                                display: true,
                                                labelString: '{{__('Errors')}}'
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            },
                                            scaleLabel: {
                                                display: true,
                                                labelString: '{{__('Count')}}'
                                            }
                                        }]
                                    }
                                }
                            });
                        });
                    });
                    var url2 = "{{url('dashboard/maints')}}";
                    var comps = new Array();
                    var Labels = new Array();
                    var counts2 = new Array();
                    $(document).ready(function(){
                        $.get(url2, function(response){
                            response.forEach(function(data){
                                comps.push(data.comp);
                                Labels.push(data.stockName);
                                counts2.push(data.count);
                            });
                            var ctx = document.getElementById("maints").getContext('2d');


                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels:comps,
                                    datasets: [{
                                        label: '{{__('Number of maintenances')}}',
                                        data: counts2,
                                        barThickness: 30,
                                        maxBarThickness: 30,
                                        minBarLength: 10,
                                        backgroundColor:getRandomColor()
                                    }]
                                },
                                options: {
                                    scales: {
                                        xAxes: [{
                                            scaleLabel: {
                                                display: true,
                                                labelString: '{{__('Components')}}'
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            },
                                            scaleLabel: {
                                                display: true,
                                                labelString: '{{__('Count')}}'
                                            }
                                        }]
                                    }
                                }
                            });
                        });
                    });

                    var url3 = "{{url('dashboard/failures')}}";
                    var comps3 = new Array();
                    var Labels = new Array();
                    var counts3 = new Array();
                    $(document).ready(function(){
                        $.get(url3, function(response){
                            response.forEach(function(data){
                                comps3.push(data.comp);
                                Labels.push(data.stockName);
                                counts3.push(data.count);
                            });
                            var ctx = document.getElementById("failures").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels:comps3,
                                    datasets: [{
                                        label: '{{__('Number of failures')}}',
                                        data: counts3,
                                        barThickness: 30,
                                        maxBarThickness: 30,
                                        minBarLength: 10,
                                        backgroundColor:getRandomColor()
                                    }]
                                },
                                options: {
                                    scales: {
                                        xAxes: [{
                                            scaleLabel: {
                                                display: true,
                                                labelString: '{{__('Components')}}'
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            },
                                            scaleLabel: {
                                                display: true,
                                                labelString: '{{__('Count')}}'
                                            }
                                        }]
                                    }
                                }
                            });
                        });
                    });
					<?php
						$lang = \Illuminate\Support\Facades\App::getLocale()=='fr';
					?>
					function getPredictions(){
						$("#notif").hide();
						msg = "";
						let error503 = "Couldn't find prediction model";
						let error400 = "Not enough data to make predictions";
						let gotEquips = " might have a problem.";
						@if($lang)
						error503 = "Il y a pas un modèle de prédiction";
						error400 = "Pas assez de données pour faire la prédiction";
						gotEquips = " peuvent avoir un problème";
						@endif
						$.ajax({
							type:'GET',
							url:'http://127.0.0.1:8000/maintenance/equipments/',
							success:function(data) {
								if(data.length !== 0){
									console.log(data);
									Object.keys(data.code).forEach(e => msg += data.code[e] + ", ");
									msg = msg.substr(0, msg.length - 2);
									msg += gotEquips;
									$("#notif-content").html(msg);
									$("#notif").show();
									$("#notif").animate({right: '30px'}, 1000, function(){
										$("#notif").css("position", "fixed");
										$("#notif-dec").animate({right: '0'}, 10000);
										timeout = setTimeout(function(){
											$("#notif").remove();
										}, 10000);
									});

									$("#notif").mouseover( function () {
										$("#notif-dec").stop();
										$("#notif-dec").css("right", "300px");
										clearTimeout(timeout);
									});

									$("#notif").mouseout( function () {
										$("#notif-dec").animate({right: '0'}, 10000);
										timeout = setTimeout(function(){
											$("#notif").remove();
										}, 10000);
									});
								}
							},
							error: function(data) {
								if(data.status == 503)
									alert(erroe503);
								else if(data.status == 400)
									alert(error400);
							}
						});
					}
                </script>

            </div>


        </div>

    </section>

@endSection

