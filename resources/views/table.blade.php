@extends('layouts.base')
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

