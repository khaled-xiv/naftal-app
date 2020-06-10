@extends('layouts.without_footer')
@section('title', __('Centers'))
@section('content')
    <!-- Users -->
    <?php
    echo "<body style='background-color:#f4f4f4'>";
    ?>
    <section id="users">

        <div id="center-01">

            <div class="content-box-md">

                <div class="container">
                    <br><br><br>
                    <div class="owl-carousel owl-theme" id="center-items">

                        @foreach($centers as $center)
                            <div class="wow ">
                                <!-- center items -->
                                <div class="center-item text-center" style="margin-right:10px ">
                                    <i class="fa fa-home"></i>
                                    <h3>{{$center->code}}</h3>
                                    <hr>
                                    <h4>{{$center->location}}</h4>
                                    <h4>{{$center->phone}}</h4>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

            <!--         add icon-->
            <a href="{{LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.center-create')}}" id="add-icon" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" title="home" role="button">
                <i class="fa fa-plus"></i>
            </a>

        </div>

        <!--         add icon-->
        <a href="{{LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.center-create')}}" id="add-icon" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" title="Add Center" role="button">
            <i class="fa fa-plus"></i>
        </a>
    </section>


    <script>
        $(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>

    <!-- Users Ends -->
@endSection

