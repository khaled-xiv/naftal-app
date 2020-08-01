@extends('layouts.base')
@section('title', ucwords(__('users')))
@section('content')
    <!-- Users -->
    <section id="dashboard">

        <div class="content-box-md">
            <div class="container">
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
                <div class="ro">
                    <div class="col-md-6">
                        <div class="panel panel-default contact-right">
                            <div class="panel-heading"><b>Failures history</b></div>
                            <div class="panel-body">
                                <canvas id="failures" height="350" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
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
                                        label: 'number of this errors occured',
                                        data: counts,
                                        borderWidth: 1
                                    }]
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
                                type: 'bar',
                                data: {
                                    labels:comps,
                                    datasets: [{
                                        label: 'number of maintenances',
                                        data: counts2,
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

