@extends('layouts.without_footer')
@section('title', 'Request of intervention')
@section('content')
<!-- Request of intervention -->
<section id="req_inter">
    <div class="content-box-md">
        <div class="container">
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <ul class="nav nav-tabs">
                                <li class="active equipment"><a data-toggle="tab" href="#opened_request">Opened
                                        Request</a></li>
                                <li class="equipment"><a data-toggle="tab" href="#closed_request">Closed Request</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">

                </div>
            </div>

            {{-- Tab Elements--}}

            <div class="tab-content">
                <div id="opened_request" class="tab-pane fade in active">
                    {!! Form::open(['method'=>'GET', 'action'=> ['Req_interController@create']]) !!}
                    <div class="row">
                        <div id="submit-btn" class="pull-right" style="margin:10px 7px 0px 0px;">
                            <button class="btn btn-general btn-primary" type="submit" role="button">Add Request</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th>Number</th>
                            <th>Equipment</th>
                            <th>Equipment code</th>
                            <th>Discription</th>
                            <th>Degree of urgency</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($openned_req as $openned_req)
                        <tr class="clickable-row" >
                            <td>{{$openned_req->number}}</td>
{{--                            <td>{{$openned_req->equipment}}</td>--}}
                            <td>{{$openned_req->equipment_code->code}}</td>
                            <td>{{$openned_req->description}}</td>
                            <td>{{$openned_req->degree_urgency}}</td>
                            <td>{{$openned_req->created_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="closed_request" class="tab-pane fade">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th>Number</th>
                            <th>Equipement</th>
                            <th>Discription</th>
                            <th>Degree of urgency</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Tab Elements End --}}
    </div>
</section>

<!-- Request of intervention Ends -->
@endSection
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>



