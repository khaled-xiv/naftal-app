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
                                <li class = "nav-item active equipment">
                                    <a class="nav-link" id="openned-request-tab" data-toggle="tab" href="#opened-request" role="tab" aria-controls="pumps" aria-selected="true">Openned Request</a>
                                </li>
                                <li class = "nav-item equipment">
                                    <a class="nav-link" id="closed-request-tab" data-toggle="tab" href="#closed-request" role="tab" aria-controls="tanks" aria-selected="false">Closed Request</a>
                                </li>
                                <li class = "nav-item equipment">
                                    <a class="nav-link" id="received-request-tab" data-toggle="tab" href="#received-request" role="tab" aria-controls="tanks" aria-selected="false">Received Request</a>
                                </li>
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
                                <td>{{$openned_req->equipment->code}}</td>
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
                            <th>Number</th>
                            <th>Equipment</th>
                            <th>Equipment code</th>
                            <th>Degree of urgency</th>
                            <th>Description</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($closed_reqs as $closed_req)
                            <tr class="clickable-row" data-href="request-of-intervention/{{$closed_req->id}}/edit">
                                <td>{{$closed_req->number}}</td>
                                <td>{{$closed_req->equipment_name}}</td>
                                <td>{{$closed_req->equipment->code}}</td>
                                <td>{{$closed_req->degree_urgency}}</td>
                                <td>{{$closed_req->description}}</td>
                                <td>{{$closed_req->created_at}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div id="received-request" class="tab-pane fade" role="tabpanel" aria-labelledby="received-request-tab">
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
                        @foreach($received_reqs as $received_req)
                            <tr class="clickable-row" data-href="request-of-intervention/{{$received_req->id}}/edit">
                                <td>{{$received_req->number}}</td>
                                <td>{{$received_req->equipment_name}}</td>
                                <td>{{$received_req->equipment->code}}</td>
                                <td>{{$received_req->degree_urgency}}</td>
                                <td>{{$received_req->description}}</td>
                                <td>{{$received_req->created_at}}</td>
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
@endSection
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>



