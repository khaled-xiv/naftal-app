@extends('layouts.without_footer')
@section('title', 'User Settings')
@section('content')
<!-- Edit User -->
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
                {!! Form::open(['method'=>'PATCH', 'id'=>'submit_modal','action'=> ['UsersController@update',$user->id]]) !!}

                @csrf
                {{ Form::hidden('field',null,['id'=>'field_hidden']) }}
                <h4 id="form-alert-header" style="text-transform:capitalize;"></h4>
                <div class="row">

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group ">
                            {!! Form::label('name', 'Name:',['class'=>'label_padding']) !!}
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value='' required
                                   placeholder="Name">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('email', 'Email:',['class'=>'label_padding']) !!}
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="" required autocomplete="email"
                                   placeholder="Email Address">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('password', 'Password:',['class'=>'label_padding']) !!}
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password" placeholder="Password">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('password-confirm', 'Password-confirm:',['class'=>'label_padding']) !!}
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone:',['class'=>'label_padding']) !!}
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" value='' required autocomplete="phone"
                                   placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('center_id', 'Center:',['class'=>'label_padding']) !!}
                            {!! Form::select('center_id', $centers , null, ['class'=>'form-control','id'=>'center_id','placeholder'=>'select a center'])!!}
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('role_id', 'Role:',['class'=>'label_padding']) !!}
                            {!! Form::select('role_id', $roles , null, ['class'=>'form-control','id'=>'role_id','placeholder'=>'select a role'])!!}
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            {!! Form::label('address', 'Address:',['class'=>'label_padding']) !!}
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                   name="address" value='' required autocomplete="address"
                                   placeholder="Address">
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-yellow"onclick="form_submit('submit_modal')">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="DeleteEquipment" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteEquipment">Are you sure you want to close this <br>account ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                {!! Form::open(['method'=>'POST','id'=>'delete_modal','action'=>['UsersController@close',$user->id]]) !!}
                @csrf
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Close</button>
                {!! Form::close() !!}
            </div>

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
                    <h3>Account</h3>

                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <label>Name</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail " data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('name')">
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
                                      onclick="fill_field1('email')">
                                {{$user->email}}
                                <span class="edit"><i class="fa fa-pencil "></i> </span>
                            </span>
                            </div>
                        </div>

                        <div class="credential row">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <label>Password</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail" data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('password')">
                                ••••••••
                                <span class="edit"><i class="fa fa-pencil "></i></span>
                            </span>
                            </div>
                        </div>
                        <div class="break"></div>

                        <div class="credential row">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <label>Center</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail" data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('center_id')">
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
                                      onclick="fill_field1('role_id')">
                                {{$user->role->name}}
                                <span class="edit"><i class="fa fa-pencil "></i></span>
                            </span>
                            </div>
                        </div>

                    </div>

                    <h3>Phone</h3>

                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail " data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('phone')" style="@if($user->phone==null) display:none @endif">
                                    {{$user->phone}}
                                    <span class="edit"><i class="fa fa-pencil "></i>  </span>
                                </span>&nbsp;&nbsp;&nbsp;
                                @if($user->phone==null)
                                <button class="btn  btn-primary" style="margin-left: 30px" data-toggle="modal" data-target="#exampleModalCenter"
                                        onclick="fill_field1('phone+add')">Add Phone</button>
                                @else
                                {!! Form::open(['method'=>'POST','id'=>'remove_form','action'=> ['UsersController@removePhone',$user->id]]) !!}

                                @csrf
                                <span>
                                        {!! Form::submit('Remove', ['class'=>'btn btn-danger','style'=>'margin-left: 30px']) !!}
                                {!! Form::close() !!}
                                    </span>

                                @endif

                            </div>
                        </div>
                    </div>

                    <h3>Address</h3>

                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <label>Address</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <span class="credential-detail"  data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('address')" style="@if($user->address==null) display:none @endif">
                                    {{$user->address}}
                                    <span class="edit"><i class="fa fa-pencil "></i>  </span>
                                </span>&nbsp;&nbsp;
                                @if($user->address==null)
                                <button class="btn  btn-primary" style="margin-left: 30px" data-toggle="modal" data-target="#exampleModalCenter"
                                        onclick="fill_field1('address+add')">Add Address</button>
                                @else
                                {!! Form::open(['method'=>'POST','id'=>'remove_form','action'=> ['UsersController@removeAddress',$user->id]]) !!}

                                @csrf
                                <span>
                                        {!! Form::submit('Remove', ['class'=>'btn btn-danger','style'=>'margin-left: 30px']) !!}
                                {!! Form::close() !!}
                                    </span>

                                @endif
                            </div>

                        </div>
                    </div>

                    <h3>Deactivate Account</h3>

                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label id="delete-message">If you want to close the account this click to the button
                                    bellow <br>
                                    Note that the account still be closed untill next logged in
                                </label>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <span>

                                    <button class="btn  btn-danger" style="margin-left: 40px ;"
                                            data-toggle="modal" data-target="#exampleModal">Close</button>
                                </span>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>
<!-- Edit User Ends -->

@endSection
