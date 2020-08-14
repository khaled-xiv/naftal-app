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
                                    {!! Form::open(['method'=>'GET', 'route' =>'register' ]) !!}
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
                                                    <a ><i class="fa fa-trash"  data-toggle="modal" data-target="#{{$user->id}}"></i></a>
                                                </span>
                                            </td>

                                        </tr>

                                        <div class="modal fade" id="{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="DeleteEquipment" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="DeleteEquipment">{{__('Are you sure you want to delete this')}} <br>{{__('account1')}} ?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::open(['method'=>'POST','action'=>['UsersController@destroy',encrypt($user->id)]]) !!}
                                                        @csrf
                                                        <button type="button" class="btn btn-general btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                                                        <button type="submit" class="btn btn-general btn-danger">{{__('Close')}}</button>
                                                        {!! Form::close() !!}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

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

    <!-- Users Ends -->
@endSection
