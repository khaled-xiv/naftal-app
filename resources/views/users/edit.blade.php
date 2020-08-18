@extends('layouts.base')
@section('title', __('User settings'))
@section('content')
<!-- Edit User -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="form-alert-header"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'PATCH', 'id'=>'submit_modal','action'=> ['UsersController@update',encrypt($user->id)]]) !!}

                @csrf
                {{ Form::hidden('field',null,['id'=>'field_hidden']) }}
                <h4 id="form-alert-header" style="text-transform:capitalize;"></h4>
                <div class="row">

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group ">
                            {!! Form::label('Name', __('Name').':',['class'=>'label_padding']) !!}
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value='' required
                                   placeholder="{{__("Name")}}">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('email', __("email address").':',['class'=>'label_padding']) !!}
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="" required autocomplete="email"
                                   placeholder="{{__("email address")}}">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('password',  __('Password').':',['class'=>'label_padding']) !!}
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password" placeholder="{{__('Password')}}">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('password-confirm', __('Confirm Password').':',['class'=>'label_padding']) !!}
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation"  autocomplete="new-password"
                                   placeholder="{{__('Confirm Password')}}">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('phone',  __('Phone').':',['class'=>'label_padding']) !!}
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" value='' required autocomplete="phone"
                                   placeholder="{{__('Phone')}}">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('center_id', __('center').':',['class'=>'label_padding']) !!}
                            {!! Form::select('center_id', $centers , null, ['class'=>'form-control','id'=>'center_id','placeholder'=>__('select a center')])!!}
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('role_id', 'Role:',['class'=>'label_padding']) !!}
                            {!! Form::select('role_id', $roles , null, ['class'=>'form-control','id'=>'role_id','placeholder'=>__('select a role')])!!}
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('address', __('Address').':',['class'=>'label_padding']) !!}
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                   name="address" value=''  autocomplete="address"
                                   placeholder="{{__('Address')}}">
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-general btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button type="submit" class="btn btn-general btn-yellow"onclick="form_submit('submit_modal')">{{__('Update')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="DeleteEquipment" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteEquipment">{{__('Are you sure you want to close this')}} <br>{{__('account1')}} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                {!! Form::open(['method'=>'POST','id'=>'delete_modal','action'=>['UsersController@close',encrypt($user->id)]]) !!}
                @csrf
                <button type="button" class="btn btn-general btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                <button type="submit" class="btn btn-general btn-danger">{{__('Close')}}</button>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>

<section id="account">

    <div class="content-box-md">
        <div class="container">

            <br><br>
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 " align="center" >
                    <div class="row"><br><br></div>

                    <div class="picture" >
                        <form enctype="multipart/form-data" action="upload-image/{{$user->id}}" id="upload-form" method="post">
                            @csrf
                            <input id="upload" style="display: none" accept="image/x-png,image/gif,image/jpeg" name="photo" type="file"/>
                        </form>
                        @if(is_null($user->photo))
                            <i class="fa fa-upload" id="upload-icon"></i>

                        @else
                            <img src="{{asset('img/users/'.$user->photo)}}" alt="Upload photo" class="img-thumbnail img-responsive">

                            <div class="team-member-overlay" id="upload_link">
                                <div class="team-member-info text-center">
                                    <ul class="img-icons">
                                        <li><a href="#" ><i id="edit-icon" class="fa fa-pencil"></i></a></li>
                                        <li><a href="remove-image" ><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 align-items-start ">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                        <h3>{{__('Account+')}}</h3>

                        <div class="account-settings ">
                            <div class="credential row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <label>{{__('Name')}}</label>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail " data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('name','{{app()->getLocale()}}')">
                                    {{$user->name}}
                                    <span class="edit"><i class="fa fa-pencil "></i>  </span>
                                </span>
                                </div>
                            </div>

                            <div class="credential row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail" data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('email','{{app()->getLocale()}}')">
                                {{$user->email}}
                                <span class="edit"><i class="fa fa-pencil "></i> </span>
                            </span>
                                </div>
                            </div>

                            <div class="credential row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <label>{{__('Password')}}</label>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail" data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('password','{{app()->getLocale()}}')">
                                ••••••••
                                <span class="edit"><i class="fa fa-pencil "></i></span>
                            </span>
                                </div>
                            </div>
                            <div class="break"></div>

                            <div class="credential row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <label>{{__('Center')}}</label>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail" data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('center_id','{{app()->getLocale()}}')">
                                {{$user->center->code}}
                                <span class="edit"><i class="fa fa-pencil "></i></span>
                            </span>
                                </div>
                            </div>

                            <div class="credential row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <label>Role</label>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail" data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('role_id','{{app()->getLocale()}}')">
                                {{__($user->role->name)}}
                                <span class="edit"><i class="fa fa-pencil "></i></span>
                            </span>
                                </div>
                            </div>

                        </div>

                        <br>
                        <h3>{{__('Phone')}}</h3>

                        <div class="account-settings ">
                            <div class="credential row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <label>{{__('Phone')}}</label>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail "
                                      onclick="fill_field1('phone','{{app()->getLocale()}}')" style="@if($user->phone==null) display:none @endif">
                                    {{$user->phone}}
                                </span>&nbsp;&nbsp;&nbsp;


                                </div>
                            </div>
                        </div>
                        <br>
                        <h3>{{__('Address')}}</h3>

                        <div class="account-settings ">
                            <div class="credential row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <label>{{__('Address')}}</label>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail"
                                      onclick="fill_field1('address','{{app()->getLocale()}}')" style="@if($user->address==null) display:none @endif">
                                    {{$user->address}}
                                </span>&nbsp;&nbsp;

                                </div>

                            </div>
                        </div>

                        <br>
                        <h3>{{__('Deactivate Account')}}</h3>

                        <div class="account-settings ">
                            <div class="credential row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label id="delete-message">{{__('If you want to close the account this click to the button bellow')}} <br>
                                        {{__('Note that the account still be closed untill next logged in')}}
                                    </label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <span>

                                    <button class="btn btn-general  btn-danger" style="margin-left: 40px ;"
                                            data-toggle="modal" data-target="#exampleModal">{{__('Close')}}</button>
                                </span>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>

</section>
<!-- Edit User Ends -->


<script>
    @if($errors->any())
    $.toast({

        text : "{{$errors->first()}}",
        showHideTransition : 'slide',
        bgColor : '#CA0B00',
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
