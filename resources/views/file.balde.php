<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(count($users)>0)
            <h1 class="text-left">Users</h1>

            <table class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Address</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                        <a href="{{url('/users/'.$user->id)}}">Edit User</a>
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['UsersController@destroy', $user->id]])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Delete user', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>

                </tr>
                @endforeach


                </tbody>
            </table>
            @else <h1>No Users</h1>
            @endif
        </div>

    </div>
</div>
