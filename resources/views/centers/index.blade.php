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
                                        @if(Auth::user()->is_admin())
                                            {!! Form::open(['method'=>'GET', 'route' =>'center.create' ]) !!}
                                            <button class="btn btn-general btn-yellow">{{__('Create new')}}</button>
                                            {!! Form::close() !!}
                                        @endif
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
												@if(Auth::user()->is_admin())
													<th style="min-width:100px;">Action</th>
												@endif
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($centers as $center)
                                            <tr>
                                                <td>{{$center->code}}</td>
                                                <td>{{$center->location}}</td>
                                                <td>{{$center->phone}}</td>
												@if(Auth::user()->is_admin())
                                                <td class="actions" style="height: 50px">
                                                    <span class="actionCust">
														@if(!$center->deleted_at)
                                                        <a href="{{ route('center.edit',encrypt($center->id))}}"><i class="fa fa-pencil-square-o"></i></a>
														@endif
                                                    </span>
                                                    <span class="actionCust">
														@if(!$center->deleted_at)
														<button class="center-del" data-toggle="modal" data-id="{{$center->id}}" data-target="#DeleteCenterModal" role="button"><i class="fa fa-trash"></i></button>
														@else
														<button class="center-res" data-toggle="modal" data-id="{{$center->id}}" data-target="#RestoreCenterModal" role="button"><i class="fa fa-check"></i></button>
														@endif
                                                    </span>
                                                </td>
												@endif
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
			
			<div class="modal fade" id="DeleteCenterModal" tabindex="-1" role="dialog" aria-labelledby="DeleteCenter" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="DeleteCenter">{{__('Are you sure you want to delete this center?')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="center-del-form" method="POST">
							@csrf
							<input type="hidden" name="_method" value="DELETE"/>
							<div class="modal-footer">
								<button type="button" class="btn btn-general btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
								<button type="submit" class="btn btn-general btn-danger">{{ __('Delete') }}</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="RestoreCenterModal" tabindex="-1" role="dialog" aria-labelledby="RestoreCenter" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="RestoreCenter">{{__('Are you sure you want to restore this center?')}}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="center-res-form" method="POST">
							@csrf
							<input type="hidden" name="_method" value="PUT"/>
							<div class="modal-footer">
								<button type="button" class="btn btn-general btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
								<button type="submit" class="btn btn-general btn-yellow">{{ __('Restore') }}</button>
							</div>
						</form>
					</div>
				</div>
			</div>

    </section>
	
	<?php
		$lang = \Illuminate\Support\Facades\App::getLocale()=='fr';
	?>

    <script>
        $(document).ready(function() {
			var url = 'centers/';
			var rest = '/restore';
			@if($lang)
				url = 'centres/';
				rest = '/restorer';
			@endif
			$(document).on("click", ".center-del", function () {
                let Id = $(this).data('id');
                $("#center-del-form").attr('action', url + Id);
            });
			$(document).on("click", ".center-res", function () {
                let Id = $(this).data('id');
                $("#center-res-form").attr('action', url + Id + rest);
            });
			
            var dataTable = $('#filtertable').DataTable({
                @if(App::getLocale()=='fr')
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                @endif
                "pageLength":10,
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
            
        } );
    </script>

    <!-- Users Ends -->
@endSection

