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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class = "nav-item active">
                                    <a class="nav-link" id="openned-request-tab" data-toggle="tab" href="#opened-request" role="tab" aria-controls=openned-request" aria-selected="true">Openned Request</a>
                                </li>
                                <li class = "nav-item ">
                                    <a class="nav-link" id="closed-request-tab" data-toggle="tab" href="#closed-request" role="tab" aria-controls="closed-request" aria-selected="false">Closed Request</a>
                                </li>
                                @if(Auth()->user()->is_district_chief())
                                <li class = "nav-item ">
                                    <a class="nav-link" id="received-request-tab" data-toggle="tab" href="#received-request" role="tab" aria-controls="received-request" aria-selected="false">Received Request</a>
                                </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Tab Elements--}}

            <div class="tab-content" id="myTabContent">
                <div id="opened-request" class="tab-pane fade show active" role="tabpanel" aria-labelledby="openned-request-tab">
                    {!! Form::open(['method'=>'GET', 'action'=> ['Req_interController@create']]) !!}
                    <div class="row">
                        <div id="submit-btn" class="pull-right" style="margin:10px 7px 0px 0px;">
                            <button class="btn btn-general btn-primary" type="submit" role="button">Create request</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th>Number</th>
                            <th>Equipment</th>
                            <th>Equipment code</th>
                            <th>Degree of urgency</th>
                            <th>Description</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($openned_reqs as $openned_req)
                            <tr class="clickable-row" data-href="request-of-intervention/{{$openned_req->id}}/edit">
                                <td>{{$openned_req->number}}</td>
                                <td>{{$openned_req->equipment_name}}</td>
                                <td>{{$openned_req->code}}</td>
                                <td>{{$openned_req->degree_urgency}}</td>
                                <td>{{$openned_req->description}}</td>
                                <td>{{$openned_req->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="closed-request" class="tab-pane fade" role="tabpanel" aria-labelledby="closed-request-tab">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th class="column1">Number</th>
                            <th class="column6">Equipment</th>
                            <th class="column4">Equipment code</th>
                            <th class="column5">Created at</th>
                            <th class="column3">Degree of urgency</th>
                            <th class="column2">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($closed_reqs as $closed_req)
                            <tr class="clickable-row" data-href="request-of-intervention/{{$closed_req->id}}/edit">
                                <td class="column1">{{$closed_req->number}}</td>
                                <td class="column6">{{$closed_req->equipment_name}}</td>
                                <td class="column4">{{$closed_req->code}}</td>
                                <td class="column5">{{$closed_req->created_at}}</td>
                                <td class="column3">{{$closed_req->degree_urgency}}</td>
                                <td class="column2">{{$closed_req->description}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div id="received-request" class="tab-pane fade" role="tabpanel" aria-labelledby="received-request-tab">
                    <table>
                        <thead>
                        <tr class="table100-head">
                            <th class="column1">Number</th>
                            <th class="column2">Equipment</th>
                            <th class="column4">Equipment code</th>
                            <th class="column5">Created at</th>
                            <th class="column3">Degree of urgency</th>
                            <th class="column6">Center</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($received_reqs as $received_req)
                            <tr class="clickable-row" data-href="request-of-intervention/{{$received_req->id}}/edit">
                                <td class="column1">{{$received_req->number}}</td>
                                <td class="column2">{{$received_req->equipment_name}}</td>
                                <td class="column4">{{$received_req->code}}</td>
                                <td class="column5">{{$received_req->created_at}}</td>
                                <td class="column3">{{$received_req->degree_urgency}}</td>
                                <td class="column6">{{$received_req->center}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Tab Elements End --}}
    </div>
</section>

<!-- Request of intervention Ends -->

<script>

    $(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>
@endSection


