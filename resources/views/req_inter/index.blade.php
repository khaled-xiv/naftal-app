@extends('layouts.base')
@section('title', __('request-of-inter'))
@section('content')

<!-- Services -->
<section id="services">
    <!-- Services 02 -->
    <div id="services-02">
        <div class="content-box-md">
            <div id="services-tabs">
                <ul class="text-center">
                    <li><a href="#openned_req">{{__('Opened Request')}}</a></li>
                    <li><a href="#closed_req">{{__('Closed Request')}}</a></li>
                    @if(Auth()->user()->is_district_chief())
                        <li><a href="#received_req">{{__('Received Request')}}</a></li>
                    @endif
                </ul>

                <!-- Service Tab 01 -->
                <div id="openned_req" class="service-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 main-datatable">
                                <div class="card_body">
                                    <div class="row d-flex">
                                        <div class="col-sm-4">
                                            {!! Form::open(['method'=>'GET', 'route' =>'request.create' ]) !!}
                                            <button class="btn btn-general btn-yellow">{{__('Create new')}}</button>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-sm-8  add_flex">
                                            <div class="form-group searchInput">
                                                <label for="filterbox">{{__('Search')}}:</label>
                                                <input type="search" class="form-control" id="filterbox" placeholder=" ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-x">
                                        <table style="width:100%;" id="filtertable1" class="table cust-datatable dataTable no-footer">
                                            <thead>
                                            <tr>
                                                <th style="min-width:50px;">{{ucwords(__('Number'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Equipment'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Equipment code'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Error code'))}}</th>
                                                @if(!Auth()->user()->is_district_chief())
                                                <th style="min-width:100px;">{{ucwords(__('Created at'))}}</th>
                                                @endif
                                                <th style="min-width:150px;">{{ucwords(__('Degree of urgency'))}}</th>
                                                @if(Auth()->user()->is_district_chief())
                                                    <th style="min-width:100px;">{{ucwords(__('Center'))}}</th>
                                                @endif
                                                <th style="min-width:100px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($openned_reqs as $openned_req)

                                                <tr>
                                                    <td>{{$openned_req->number}}</td>
                                                    <td>{{$openned_req->equipment_name}}</td>
                                                    <td>{{$openned_req->code}} </td>
                                                    <td>{{$openned_req->error_code}} </td>
                                                    @if(!Auth()->user()->is_district_chief())
                                                    <td>{{$openned_req->created_at}}</td>
                                                    @endif
                                                    <td>{{$openned_req->degree_urgency}}</td>
                                                    @if(Auth()->user()->is_district_chief())
                                                        <td>{{$openned_req->center}}</td>
                                                    @endif

                                                    <td class="actions" style="height: 50px">
                                                        <span class="actionCust">
                                                            <a href="{{route('request.edit',encrypt($openned_req->id))}}"><i class="fa fa-pencil-square-o"></i></a>
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
                    <!-- Service Tab 02 -->
                <div id="closed_req" class="service-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 main-datatable">
                                <div class="card_body">
                                    <div class="row d-flex">
                                        <div class="col-sm-4">
                                            {!! Form::open(['method'=>'GET', 'route' =>'request.create' ]) !!}
                                            <button class="btn btn-general btn-yellow">{{__('Create new')}}</button>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-sm-8  add_flex">
                                            <div class="form-group searchInput">
                                                <label for="filterbox">{{__('Search')}}:</label>
                                                <input type="search" class="form-control" id="filterbox2" placeholder=" ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-x">
                                        <table style="width:100%;" id="filtertable2" class="table cust-datatable dataTable no-footer">
                                            <thead>
                                            <tr>
                                                <th style="min-width:50px;">{{ucwords(__('Number'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Equipment'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Equipment code'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Error code'))}}</th>
                                                @if(!Auth()->user()->is_district_chief())
                                                    <th style="min-width:100px;">{{ucwords(__('Created at'))}}</th>
                                                @endif
                                                <th style="min-width:150px;">{{ucwords(__('Degree of urgency'))}}</th>
                                                @if(Auth()->user()->is_district_chief())
                                                    <th style="min-width:100px;">{{ucwords(__('Center'))}}</th>
                                                @endif
                                                <th style="min-width:100px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($closed_reqs as $closed_req)

                                                <tr>
                                                    <td>{{$closed_req->number}}</td>
                                                    <td>{{$closed_req->equipment_name}}</td>
                                                    <td>{{$closed_req->code}} </td>
                                                    <td>{{$closed_req->error_code}} </td>
                                                    @if(!Auth()->user()->is_district_chief())
                                                        <td>{{$closed_req->created_at}}</td>
                                                    @endif
                                                    <td>{{$closed_req->degree_urgency}}</td>
                                                    @if(Auth()->user()->is_district_chief())
                                                        <td>{{$closed_req->center}}</td>
                                                    @endif

                                                    <td class="actions" style="height: 50px">
                                                        <span class="actionCust">
                                                            <a href="{{route('request.edit',encrypt($closed_req->id))}}"><i class="fa fa-pencil-square-o"></i></a>
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

            @if(Auth()->user()->is_district_chief())
                <!-- Service Tab 03 -->
                <div id="received_req" class="service-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 main-datatable">
                                <div class="card_body">
                                    <div class="row d-flex">
                                        <div class="col-sm-4">
                                            {!! Form::open(['method'=>'GET', 'route' =>'request.create' ]) !!}
                                            <button class="btn btn-general btn-yellow">{{__('Create new')}}</button>
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-sm-8  add_flex">
                                            <div class="form-group searchInput">
                                                <label for="filterbox">{{__('Search')}}:</label>
                                                <input type="search" class="form-control" id="filterbox3" placeholder=" ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-x">
                                        <table style="width:100%;" id="filtertable3" class="table cust-datatable dataTable no-footer">
                                            <thead>
                                            <tr>
                                                <th style="min-width:50px;">{{ucwords(__('Number'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Equipment'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Equipment code'))}}</th>
                                                <th style="min-width:100px;">{{ucwords(__('Created at'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Degree of urgency'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('Center'))}}</th>
                                                <th style="min-width:100px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($received_reqs as $received_req)
                                                <tr>
                                                    <td class="column1">{{$received_req->number}}</td>
                                                    <td class="column6">{{$received_req->equipment_name}}</td>
                                                    <td class="column4">{{$received_req->code}}</td>
                                                    <td class="column2">{{$received_req->created_at}}</td>
                                                    <td class="column3">{{$received_req->degree_urgency}}</td>
                                                    <td class="column5">{{$received_req->center}}</td>
                                                    <td class="actions" style="height: 50px">
                                                        <span class="actionCust">
                                                            <a href="{{route('request.edit',encrypt($openned_req->id))}}"><i class="fa fa-pencil-square-o"></i></a>
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
            @endif
            </div>
        </div>
    </div>

</section>
<!-- Services Ends -->

<script>

    $(document).ready(function() {
        var dataTable1 = $('#filtertable1').DataTable({
            @if(App::getLocale()=='fr')
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
            "aoColumns":[
                null, null,null, null, null, null, null
            ],
            "bLengthChange":false,
            "dom":'<"top">ct<"top"p><"clear">',

        });
        $("#filterbox").keyup(function(){
            dataTable1.search(this.value).draw();
        });

        var dataTable2 = $('#filtertable2').DataTable({
            @if(App::getLocale()=='fr')
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
            "aoColumns":[
                null, null,null, null, null, null, null
            ],
            "bLengthChange":false,
            "dom":'<"top">ct<"top"p><"clear">',

        });
        $("#filterbox2").keyup(function(){
            dataTable2.search(this.value).draw();
        });

        var dataTable3 = $('#filtertable3').DataTable({
            @if(App::getLocale()=='fr')
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
            "aoColumns":[
                null, null,null, null, null, null, null
            ],
            "bLengthChange":false,
            "dom":'<"top">ct<"top"p><"clear">',

        });
        $("#filterbox3").keyup(function(){
            dataTable3.search(this.value).draw();
        });
    } );


    @if (Session::has('status'))
    $.toast({

        text : "{{Session::get('status')}}",
        showHideTransition : 'slide',
        bgColor : 'green',
        textColor : '#eee',
        allowToastClose : true,
        hideAfter : 3000,
        stack : 5,
        textAlign : 'center',
        position : 'bottom-center',
        width:"100%"
    })
    @endif

</script>
@endSection


