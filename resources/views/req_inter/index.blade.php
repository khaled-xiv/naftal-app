@extends('layouts.without_footer')
@section('title', __('request-of-inter'))
@section('content')

<!-- Services -->
<section id="services">
    <!-- Services 02 -->
    <div id="services-02">
        <div class="content-box-md">
            <div id="services-tabs">
                <ul class="text-center">
                    <li><a href="#service-tab-1">{{__('Opened Request')}}</a></li>
                    <li><a href="#service-tab-2">{{__('Closed Request')}}</a></li>
                    @if(Auth()->user()->is_district_chief())
                        <li><a href="#service-tab-3">{{__('Received Request')}}</a></li>
                    @endif
                </ul>

                <!-- Service Tab 01 -->
                <div id="service-tab-1" class="service-tab">
                    <div class="container">
                        <div class="row">
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column1">Number</th>
                                    <th class="column6">Equipment</th>
                                    <th class="column4">Equipment code</th>
                                    <th class="column2">Created at</th>
                                    <th class="column3 ">Degree of urgency</th>
                                    <th class="column5">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($openned_reqs as $openned_req)
                                    <tr class="clickable-row" data-href="request-of-intervention/{{$openned_req->id}}/edit">
                                        <td class="column1">{{$openned_req->number}}</td>
                                        <td class="column6">{{$openned_req->equipment_name}}</td>
                                        <td class="column4">{{$openned_req->code}}</td>
                                        <td class="column2">{{$openned_req->created_at}}</td>
                                        <td class="column3 ">{{$openned_req->degree_urgency}}</td>
                                        <td class="column5">{{$openned_req->description}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <!-- Service Tab 02 -->
                <div id="service-tab-2" class="service-tab">
                    <div class="container">
                        <div class="row">
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column1">Number</th>
                                    <th class="column6">Equipment</th>
                                    <th class="column4">Equipment code</th>
                                    <th class="column2">Created at</th>
                                    <th class="column3 ">Degree of urgency</th>
                                    <th class="column5">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($closed_reqs as $closed_req)
                                    <tr class="clickable-row"
                                        data-href="request-of-intervention/{{$closed_req->id}}/edit">
                                        <td class="column1">{{$closed_req->number}}</td>
                                        <td class="column6">{{$closed_req->equipment_name}}</td>
                                        <td class="column4">{{$closed_req->code}}</td>
                                        <td class="column2">{{$closed_req->created_at}}</td>
                                        <td class="column3">{{$closed_req->degree_urgency}}</td>
                                        <td class="column5">{{$closed_req->description}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @if(Auth()->user()->is_district_chief())
                <!-- Service Tab 03 -->
                <div id="service-tab-3" class="service-tab">
                    <div class="container">
                        <div class="row">
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column1">Number</th>
                                    <th class="column6">Equipment</th>
                                    <th class="column4">Equipment code</th>
                                    <th class="column2">Created at</th>
                                    <th class="column3 ">Degree of urgency</th>
                                    <th class="column5">Center</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($received_reqs as $received_req)
                                    <tr class="clickable-row"
                                        data-href="request-of-intervention/{{$received_req->id}}/edit">
                                        <td class="column1">{{$received_req->number}}</td>
                                        <td class="column6">{{$received_req->equipment_name}}</td>
                                        <td class="column4">{{$received_req->code}}</td>
                                        <td class="column2">{{$received_req->created_at}}</td>
                                        <td class="column3">{{$received_req->degree_urgency}}</td>
                                        <td class="column5">{{$received_req->center}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
            <!-- Services 02 Ends -->
    </div>

    <!--         add icon-->
    <a href="{{url(app()->getLocale().'/'.__('request-of-intervention').'/'.__('create'))}}" id="add-icon" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" title="home" role="button">
        <i class="fa fa-plus"></i>
    </a>
</section>
<!-- Services Ends -->

<script>

    $(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>
@endSection


