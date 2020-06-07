@extends('layouts.without_footer')
@section('title', ucwords(__('users')))
@section('content')
<!-- Users -->
<section id="users">

    <div class="content-box-md">

        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table class="js-sort-table">
                            <thead>
                            <tr class="table100-head">
                                <th class="column1 ">{{ucwords(__('Name'))}}</th>
                                <th class="column2">{{ucwords(__('email address'))}}</th>
                                <th class="column3 js-sort-date">{{ucwords(__('Email verified at'))}}</th>
                                <th class="column4">{{ucwords(__('Phone'))}}</th>
                                <th class="column5">{{ucwords(__('Address'))}}</th>
                                <th class="column6">{{ucwords(__('status'))}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr class="clickable-row" data-href="{{ route('users.edit',encrypt($user->id))}}">
                                <td class="column1">{{$user->name}}</td>
                                <td class="column2">{{$user->email}}</td>
                                <td class="column3">@if(!$user->email_verified_at) Not Verified @else {{$user->email_verified_at}} @endif</td>
                                <td class="column4">@if ($user->phone){{$user->phone}} @else &nbsp; @endif</td>
                                <td class="column5">@if ($user->address){{$user->address}} @else &nbsp; @endif</td>
                                <td class="column6">@if($user->is_active==1) Active @else Closed @endif</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



            <div class="text-center">
                {{$users->render()}}
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
        @if (Session::has('status'))
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "500",
            "hideDuration": "300",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "slideDown",
            "hideMethod": "slideUp"
        }

        toastr.success("{{Session::get('status')}}");
        $('.toast-message').css('text-align','center');
        @endif

</script>

<!-- Users Ends -->
@endSection

