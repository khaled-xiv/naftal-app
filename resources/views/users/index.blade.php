@extends('layouts.base')
@section('title', ucwords(__('users')))
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
                                    <button class="btn btn-general btn-yellow">{{__('Create new')}}</button>
                                </div>
                                <div class="col-sm-8  add_flex">
                                    <div class="form-group searchInput">
                                        <label for="filterbox">{{__('Search')}}:</label>
                                        <input type="search" class="form-control" id="filterbox" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x">
                                <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                                    <thead>
                                    <tr>
                                        <th style="min-width:50px;">{{ucwords(__('Name'))}}</th>
                                        <th style="min-width:150px;">{{ucwords(__('email address'))}}</th>
                                        <th style="min-width:150px;">{{ucwords(__('Email verified at'))}}</th>
                                        <th style="min-width:100px;">{{ucwords(__('Phone'))}}</th>
                                        <th style="min-width:150px;">{{ucwords(__('Address'))}}</th>
                                        <th style="min-width:150px;">{{ucwords(__('status'))}}</th>
                                        <th style="min-width:100px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)

                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td><span class="mode {{(!$user->email_verified_at)?'mode_process':'mode_done'}}"> @if(!$user->email_verified_at) Not Verified @else {{$user->email_verified_at}} @endif</span></td>
                                            <td>@if ($user->phone){{$user->phone}} @else &nbsp; @endif</td>
                                            <td>@if ($user->address){{$user->address}} @else &nbsp; @endif</td>
                                            <td> <span class="mode {{($user->is_active==1)?'mode_on':'mode_off'}}">@if($user->is_active==1) Active @else Closed @endif</span> </td>
                                            <td class="actions" style="height: 50px">
                                                <span class="actionCust">
                                                    <a href="{{ route('users.edit',encrypt($user->id))}}"><i class="fa fa-pencil-square-o"></i></a>
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
                @if(\Illuminate\Support\Facades\App::getLocale()=='fr')
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
                dataTable.search(this.value).draw();
            });
        } );

    </script>

    <!-- Users Ends -->
@endSection
