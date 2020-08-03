@extends('layouts.base')
@section('title', ucwords(__('users')))
@section('content')
    <!-- Users -->
    <section id="users">

        <style>

            #example{
                border-radius: 20px;
            }
            #example thead{
                background-color: #36304a;
            }
            #example thead tr th{
                color: white;
                font-size: 15px;
            }
            #example tbody tr {
                text-align: center;
            }
            tr {
                height: 50px;
                font-size: 15px;
            }

        </style>

        <div class="content-box-md">
            <div class="container">
                <div class="row contact-right">
                    <table id="example" class="table  table-striped display">
                        <thead>
                        <tr class="text-center">
                            <th>{{ucwords(__('Name'))}}</th>
                            <th>{{ucwords(__('email address'))}}</th>
                            <th>{{ucwords(__('Email verified at'))}}</th>
                            <th>{{ucwords(__('Phone'))}}</th>
                            <th>{{ucwords(__('Address'))}}</th>
                            <th>{{ucwords(__('status'))}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="clickable-row" data-href="{{ route('users.edit',encrypt($user->id))}}">
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if(!$user->email_verified_at) Not Verified @else {{$user->email_verified_at}} @endif</td>
                                <td>@if ($user->phone){{$user->phone}} @else &nbsp; @endif</td>
                                <td>@if ($user->address){{$user->address}} @else &nbsp; @endif</td>
                                <td>@if($user->is_active==1) Active @else Closed @endif</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

        <!--         add icon-->
        <a href="{{route('register') }}" id="add-icon" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" title="{{__('add user')}}" role="button">
            <i class="fa fa-plus"></i>
        </a>
    </section>
    {{--dataTables--}}
    <script src="{{ asset('js/dataTables/jquery-3.2.1.slim.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables/dataTables.bootstrap4.min.js') }}" defer></script>
    <script>

        $(document).ready(function() {
            $('#example').DataTable({
                responsive:{
                    details:false
                }
            });
        } );
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
