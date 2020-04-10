@extends('layouts.without_footer')
@section('title', 'Centers')
@section('content')
    <!-- Centers -->
    <section id="center">

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
            <a href="/centers/create" id="add-icon" class="btn btn-sm btn-yellow btn-back-to-top smooth-scroll hidden-sm hidden-xs" title="home" role="button">
                <i class="fa fa-plus"></i>
            </a>

        </div>


    </section>

    <!-- Centers Ends -->
@endSection
<script>
    $(document).ready(function($) {
            $(document).on("click", ".center-del", function () {
                let Id = $(this).data('center-id');
                $(".center-del-2 form").attr('action', '/centers/' + Id);
            });
    });
</script>
