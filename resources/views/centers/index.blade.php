@extends('layouts.base')
@section('title', __('Centers'))
@section('content')
    <!-- Users -->
    <section id="users">
            <div class="content-box-md">
                <div class="container p-30">
                    <div class="row">

                        <div class="col-md-12 main-datatable">
                            <div class="card_body">
                                <div class="row d-flex">
                                    <div class="col-sm-4">
                                        {!! Form::open(['method'=>'GET', 'route' =>'center.create' ]) !!}
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
                                    <table id="filtertable" class="table cust-datatable dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th style="min-width:50px;">{{ucwords(__('code'))}}</th>
                                                <th style="min-width:100px;">{{ucwords(__('location'))}}</th>
                                                <th style="min-width:150px;">{{ucwords(__('phone'))}}</th>
                                                <th style="min-width:100px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($centers as $center)
                                            <tr>
                                                <td>{{$center->code}}</td>
                                                <td>{{$center->location}}</td>
                                                <td>{{$center->phone}}</td>
                                                <td class="actions" style="height: 50px">
                                                    <span class="actionCust">
                                                        <a href="{{ route('center.edit',encrypt($center->id))}}"><i class="fa fa-pencil-square-o"></i></a>
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

    </section>


    <script>
        $(document).ready(function() {
            var dataTable = $('#filtertable').DataTable({
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
                // columnDefs:[
                //     {type:'date-dd-mm-yyyy',aTargets:[5]}
                // ],
                "aoColumns":[
                    null, null,null, null,
                ],
                "bLengthChange":false,
                "dom":'<"top">ct<"top"p><"clear">',

            });
            $("#filterbox").keyup(function(){
                dataTable.search(this.value).draw();
            });
        } );
    </script>

    <!-- Users Ends -->
@endSection

