@extends('layouts.without_footer')
@section('title', 'User Settings')
@section('content')
<!-- Edit User -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value='' required
                                   placeholder="Name">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="" required autocomplete="email"
                                   placeholder="Email Address">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password" placeholder="Password">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" value='' required autocomplete="phone"
                                   placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 hide-form">
                        <div class="form-group">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                   name="address" value='' required autocomplete="address"
                                   placeholder="Address">
                        </div>
                    </div>


                    <div id="submit-btn" class="text-center">
                        <button class="btn btn-general btn-yellow" id="submitForm" type="button" onclick="form_submit()">Update
                        </button>
                    </div>

                </div>
                <!--                </form>-->
                {!! Form::close() !!}
                <!--                        </form>-->
            </div>
        </div>
    </div>
</div>

<section id="account">

    <div class="content-box-md">
        <div class="container">

            <div class="row"><br><br></div>
            <div class="row col-md-10 col-md-offset-1">

                <div class="col-md-4 col-sm-4">
                    <div class="row"><br></div>
                    <div id="contact-right" style="border-radius: 8px">
                        <p style="font-size: 25px; line-height: 0px">{{$user->name}}</p>
                        <p style="font-size: 20px; line-height: 0px">{{$user->email}}</p>

                    </div>

                </div>
                <div class="col-md-1 col-sm-1"></div>
                <div class="col-md-7 col-sm-7">
                    @if($errors->any())
                    <div class="alert alert-danger text-center">
                        <h3>{{$errors->first()}}</h3>
                    </div>
                    @endif
                    <h3>Account</h3>

                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-3">
                                <label>Name</label>
                            </div>
                            <div class="col-md-9">
                                <span class="credential-detail " data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('name')">
                                    {{$user->name}}
                                    <span class="edit"><i class="fa fa-pencil "></i>  </span>
                                </span>
                            </div>
                        </div>

                        <div class="credential row">
                            <div class="col-md-3">
                                <label>Email</label>
                            </div>
                            <div class="col-md-9">
                                <span class="credential-detail" data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('email')">
                                {{$user->email}}
                                <span class="edit"><i class="fa fa-pencil "></i> </span>
                            </span>
                            </div>
                        </div>

                        <div class="credential row">
                            <div class="col-md-3">
                                <label>Password</label>
                            </div>
                            <div class="col-md-9">
                                <span class="credential-detail" data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('password')">
                                ••••••••
                                <span class="edit"><i class="fa fa-pencil "></i></span>
                            </span>
                            </div>
                        </div>


                    </div>

                    <h3>Phone</h3>

                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-3">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-9">
                                <span class="credential-detail " data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('phone')" style="@if($user->phone==null) display:none @endif">
                                    {{$user->phone}}
                                    <span class="edit"><i class="fa fa-pencil "></i>  </span>
                                </span>&nbsp;&nbsp;&nbsp;
                                @if($user->phone==null)
                                <button class="btn  btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                                        onclick="fill_field1('phone+add')">Add Phone</button>
                                @else
                                {!! Form::open(['method'=>'POST','id'=>'remove_form','action'=> ['UsersController@removePhone',$user->id]]) !!}

                                @csrf
                                <span>
                                        {!! Form::submit('Remove', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                    </span>

                                @endif

                            </div>
                        </div>
                    </div>

                    <h3>Address</h3>

                    <div class="account-settings ">
                        <div class="credential row">
                            <div class="col-md-3">
                                <label>Address</label>
                            </div>
                            <div class="col-md-9">
                                <span class="credential-detail"  data-toggle="modal" data-target="#exampleModalCenter"
                                      onclick="fill_field1('address')" style="@if($user->address==null) display:none @endif">
                                    {{$user->address}}
                                    <span class="edit"><i class="fa fa-pencil "></i>  </span>
                                </span>&nbsp;&nbsp;
                                @if($user->address==null)
                                <button class="btn  btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                                        onclick="fill_field1('address+add')">Add Address</button>
                                @else
                                {!! Form::open(['method'=>'POST','id'=>'remove_form','action'=> ['UsersController@removeAddress',$user->id]]) !!}

                                @csrf
                                <span>
                                        {!! Form::submit('Remove', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                    </span>

                                @endif
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
