@extends('layouts.without_footer')
@section('title', __('Account Settings'))
@section('content')
<!-- Account -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="form-alert-header" style="text-transform:capitalize"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'PATCH', 'id'=>'submit_modal','action'=>['AccountController@update','id'=>Auth()->user(),'language'=>app()->getLocale()]]) !!}
                @csrf
                {{ Form::hidden('field',null,['id'=>'field_hidden']) }}
                <h4 ></h4>
                <div class="row">
                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group ">
                            {!! Form::label('name', __("Name").':',['class'=>'label_padding']) !!}
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" required
                                   placeholder="{{__("Name")}}">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('email', __("email address").':',['class'=>'label_padding']) !!}
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" required  autocomplete="email"
                                   placeholder="{{__("email address")}}">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('password', __('Password').':',['class'=>'label_padding']) !!}
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
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
                            {!! Form::label('phone', __('Phone').':',['class'=>'label_padding']) !!}
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" value=''  autocomplete="phone"
                                   placeholder="{{__('Phone')}}">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button class="btn  btn-yellow" type="submit"  title="Submit" role="button" onclick="form_submit('submit_modal')" >{{__('Update')}}</button>

            </div>
                {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="DeleteEquipment" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteEquipment">{{__('Are you sure you want to close your')}} <br>{{__('account1')}} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['method'=>'POST','id'=>'delete_modal','action'=>['AccountController@close','language'=>app()->getLocale()]]) !!}
            @csrf
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                <button type="submit" class="btn btn-danger">{{__('Close')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<section id="account">
    <div class="content-box-md">
        <div class="container">
            <br><br>
            <div class="row  col-md-12 col-sm-12 col-xs-12 align-items-start ">
                <div class="col-lg-7 offset-lg-1 col-md-8">
                    @if($errors->any())
                        <div class="alert alert-danger ">
                            <h4>{{$errors->first()}}</h4>
                        </div>
                    @endif
                </div>
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                    <h3>{{__('Account')}}</h3>
                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <label>{{__('Name')}}</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail " data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field('name','{{app()->getLocale()}}')">
                                    {{Auth()->user()->name}}
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
                                      onclick="fill_field('email','{{app()->getLocale()}}')">
                                {{Auth()->user()->email}}
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
                                      onclick="fill_field('password','{{app()->getLocale()}}')">
                                ••••••••
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
                                <span class="credential-detail " data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field('phone','{{app()->getLocale()}}')"
                                      style="@if(Auth()->user()->phone==null) display:none @endif">
                                    {{Auth()->user()->phone}}
                                    <span class="edit"><i class="fa fa-pencil "></i>  </span>
                                </span>&nbsp;&nbsp;&nbsp;
                                @if(Auth()->user()->phone==null)
                                <button class="btn  btn-primary" style="margin-left: 30px" data-toggle="modal" data-target="#exampleModalCenter"
                                        onclick="fill_field('phone+add','{{app()->getLocale()}}')">{{__('Add')}} {{__('Phone')}}
                                </button>
                                @else
                                {!! Form::open(['method'=>'POST','id'=>'remove_form','action'=>
                                ['AccountController@removePhone','language'=>app()->getLocale()]]) !!}

                                @csrf
                                <span>
                                        {!! Form::submit(__('Remove'), ['class'=>'btn btn-danger','style'=>'margin-left: 30px']) !!}
                                {!! Form::close() !!}
                                    </span>

                                @endif

                            </div>
                        </div>
                    </div>

                    <h3>{{__('Address')}}</h3>

                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <label>{{__('Address')}}</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail" data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field('address','{{app()->getLocale()}}')"
                                      style="@if(Auth()->user()->address==null) display:none @endif">
                                    {{Auth()->user()->address}}
                                    <span class="edit"><i class="fa fa-pencil "></i>  </span>
                                </span>&nbsp;&nbsp;
                                @if(Auth()->user()->address==null)
                                <button class="btn  btn-primary" style="margin-left: 30px" data-toggle="modal" data-target="#exampleModalCenter"
                                        onclick="fill_field('address+add','{{app()->getLocale()}}')">{{__('Add')}} {{__('Address')}}
                                </button>
                                @else
                                {!! Form::open(['method'=>'POST','id'=>'remove_form','action'=>
                                ['AccountController@removeAddress','language'=>app()->getLocale()]]) !!}

                                @csrf
                                <span>
                                        {!! Form::submit(__('Remove'), ['class'=>'btn btn-danger','style'=>'margin-left: 30px']) !!}
                                {!! Form::close() !!}
                                    </span>

                                @endif
                            </div>

                        </div>
                    </div>

                    <br>
                    <h3>{{__('Deactivate Your Account')}}</h3>

                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label id="delete-message">{{__('If you want to close your account just click to the button bellow')}} <br>
                                    {{__('Note that your account still be closed untill you logged in next time')}}
                                </label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <span>
                                    <button class="btn  btn-danger" style="margin-left: 40px ;"
                                            data-toggle="modal" data-target="#exampleModal">{{__('Close')}}</button>
                                </span>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>
<!-- account Ends -->


@endSection
