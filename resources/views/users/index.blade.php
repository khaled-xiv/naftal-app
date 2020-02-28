@extends('layouts.without_footer')
@section('title', 'Users')
@section('content')
<!-- Users -->
<section id="users">

    <div class="content-box-md">

        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                            <tr class="table100-head">
                                <th class="column1">Name</th>
                                <th class="column2">Email</th>
                                <th class="column3">Address</th>
                                <th class="column4">Price</th>
                                <th class="column5">Quantity</th>
                                <th class="column6">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="column1">{{$user->name}}</td>
                                <td class="column2">{{$user->email}}</td>
                                <td class="column3">{{$user->address}}</td>
                                <td class="column4">$999.00</td>
                                <td class="column5">1</td>
                                <td class="column6">$999.00</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{$users->render()}}
            </div>
        </div>

    </div>
</section>



<!-- Users Ends -->
@endSection



