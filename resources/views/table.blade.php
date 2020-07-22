@extends('layouts.without_footer')
@section('title', ucwords(__('users')))
@section('content')
    <!-- Users -->
    <section id="users">

        <div class="content-box-md">
            <div class="container">
                <button type="button" id="show">Show</button>
                <p>{{ Session::get('status') }}</p>
                <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
                    <div class="mdl-snackbar__text"></div>
                    <button class="mdl-snackbar__action" type="button"></button>
                </div>
                <table id="dataTable" class="mdl-data-table mdl-js-data-table dataTable ">
                    <thead>
                    <tr role="row" class="sort-key">
                        <th class="mdl-data-table__cell--non-numeric sort-key">{{ucwords(__('Name'))}}</th>
                        <th class="mdl-data-table__cell--non-numeric sort-key">{{ucwords(__('email address'))}}</th>
                        <th class="mdl-data-table__cell--non-numeric sort-key">{{ucwords(__('Email verified at'))}}</th>
                        <th class="mdl-data-table__cell--non-numeric sort-key">{{ucwords(__('Phone'))}}</th>
                        <th class="mdl-data-table__cell--non-numeric sort-key">{{ucwords(__('Address'))}}</th>
                        <th class="mdl-data-table__cell--non-numeric sort-key">{{ucwords(__('status'))}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)

                        <tr class="rowEditData odd sort-key"  role="row" data-href="{{ route('users.edit',encrypt($user->id))}}">
                            <td class="mdl-data-table__cell--non-numeric">{{$user->name}}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{$user->email}}</td>
                            <td class="mdl-data-table__cell--non-numeric">@if(!$user->email_verified_at) Not Verified @else {{$user->email_verified_at}} @endif</td>
                            <td class="mdl-data-table__cell--non-numeric">@if ($user->phone){{$user->phone}} @else &nbsp; @endif</td>
                            <td class="mdl-data-table__cell--non-numeric">@if ($user->address){{$user->address}} @else &nbsp; @endif</td>
                            <td class="mdl-data-table__cell--non-numeric">@if($user->is_active==1) Active @else Closed @endif</td>
                        </tr>

                    @endforeach



                    </tbody>
                </table>

                <div class="text-center">
                    {{$users->render()}}
                </div>
            </div>


        </div>

        <!--         add icon-->
        <a href="{{route('register') }}" id="add-icon" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" title="{{__('add user')}}" role="button">
            <i class="fa fa-plus"></i>
        </a>
    </section>

    <script>


        $(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });

        // $('#show').on('click',function () {
        @if (Session::has('status'))
        console.log('toast');
        var notification = document.querySelector('.mdl-js-snackbar');
        notification.MaterialSnackbar.showSnackbar(
            {
                {{--message: '{{Session::get("status")}}'--}}
                message: 'welcome'
            }
        );
        @endif

        {{--var notification = document.querySelector('.mdl-js-snackbar');--}}
        {{--var data = {--}}
        {{--    message: '{{Session::get('status')}}',--}}
        {{--    actionHandler: function(event) {},--}}
        {{--    actionText: 'Undo',--}}
        {{--    timeout: 3000--}}
        {{--};--}}
        {{--notification.MaterialSnackbar.showSnackbar(data);--}}
        // })


    </script>

    <!-- Users Ends -->
@endSection

