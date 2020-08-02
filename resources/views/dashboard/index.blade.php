@extends('layouts.base')
@section('title', ucwords(__('users')))
@section('content')
    <!-- Users -->
    <section id="dashboard">

        <div class="content-box-md">
            <div class="container">


                <div id="stats-items" class="row wow fadeInUp owl-carousel owl-theme" data-wow-duration="2s">

                    <div class="stats-item text-center">
                        <i class="fa fa-building-o"></i>
                        <h3 class="counter">{{$count['centers']}}</h3>
                        <p>Centers</p>
                    </div>

                    <div class="stats-item text-center">
                        <i class="fa fa-gears"></i>
                        <h3 class="counter">{{$count['equipments']}}</h3>
                        <p>Equipments</p>
                    </div>

                    <div class="stats-item text-center">
                        <i class="fa fa-users"></i>
                        <h3 class="counter">{{$count['users']}}</h3>
                        <p>New Users</p>
                    </div>

                    <div class="stats-item text-center">
                        <i class="fa fa-newspaper-o"></i>
                        <h3 class="counter">{{$count['posts']}}</h3>
                        <p>New posts</p>
                    </div>

                    <div class="stats-item text-center">
                        <i class="fa fa-comments"></i>
                        <h3 class="counter">{{$count['comments']}}</h3>
                        <p>New comments</p>
                    </div>

                </div>
                <!-- Stats Ends -->
                <div class="row">
                    <br/>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default contact-right">
                            <div class="panel-heading"><b>Errors history</b></div>
                            <div class="panel-body">
                                <canvas id="errors" height="350" width="600"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default contact-right">
                            <div class="panel-heading"><b>Maintenances history</b></div>
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
                    <div class="col-md-6">
                        <div class="panel panel-default contact-right">
                            <div class="panel-heading"><b>Failures history</b></div>
                            <div class="panel-body">
                                <canvas id="failures" height="350" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="{{asset('js/chart/Chart.min.js')}}"></script>
                <script>
                    var url = "{{url('dashboard/errors')}}";
                    var error_codes = new Array();
                    var Labels = new Array();
                    var counts = new Array();
                    $(document).ready(function(){
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
                                        label: "total number of errors occured",
                                        data: counts,
                                        borderWidth: 1,
                                        barPercentage: 0.5,
                                        barThickness: 6,
                                        maxBarThickness: 8,
                                        minBarLength: 2,
                                        backgroundColor: ["#4e73df",'#1cc88a','#36b9cc','rgb(255, 99, 132)'],
                                    }],
                                },
                                options: {
                                    scales: {
                                        xAxes: [{
                                            scaleLabel: {
                                                display: true,
                                                labelString: 'Errors'
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            },
                                            scaleLabel: {
                                                display: true,
                                                labelString: 'Count'
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
                                type: 'doughnut',
                                data: {
                                    labels:comps,
                                    datasets: [{
                                        label: 'number of maintenances',
                                        data: counts2,
                                        borderWidth: 1,
                                        backgroundColor: ["#4e73df",'#1cc88a','#36b9cc','rgb(255, 99, 132)'],
                                    }]
                                },
                                options: {

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
                                        label: 'number of failures',
                                        data: counts3,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        xAxes: [{
                                            scaleLabel: {
                                                display: true,
                                                labelString: 'Components'
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            },
                                            scaleLabel: {
                                                display: true,
                                                labelString: 'Count'
                                            }
                                        }]
                                    }
                                }
                            });
                        });
                    });
                </script>

            </div>


        </div>

    </section>

@endSection

