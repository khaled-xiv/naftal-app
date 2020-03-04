@extends('layouts.without_footer')
@section('title', 'Centers')
@section('content')
    <!-- Centers -->
    <section id="users">

        <div class="content-box-md">

            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="pull-left">
                            {!! Form::open(['method'=>'GET', 'action'=> ['CenterController@create']]) !!}

                            <div class="row">
                                <div id="submit-btn" class="pull-right" style="margin:10px 7px 7px 7px;">
                                    <button class="btn btn-general btn-yellow" type="submit" role="button">Add Center</button>
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>

                        <div class="table100">
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column1">Code</th>
                                    <th class="column2">Location</th>
                                    <th class="column3">Storage Capacity</th>
                                    <th class="column4">Phone</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($centers as $center)
                                    <tr class="clickable-row" data-href="centers/{{$center->id}}">
                                        <td class="column1">{{$center->code}}</td>
                                        <td class="column2">{{$center->location}}</td>
                                        <td class="column3">{{$center->storage_capacity}}</td>
                                        <td class="column4">{{$center->phone}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="text-center">
                    {{$centers->render()}}
                </div>
            </div>

        </div>
    </section>

    <!-- Centers Ends -->
@endSection
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
