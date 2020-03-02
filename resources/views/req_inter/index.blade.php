@extends('layouts.without_footer')
@section('title', 'Request of intervention')
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
                                <th class="column1">Number</th>
                                <th class="column2">Equipement</th>
                                <th class="column3">Description</th>
                                <th class="column4">Degree of urgency</th>
                                <th class="column5">Created at</th>
                                <th class="column6">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($req_inters as $req_inter)
                            <tr>
                                <td class="column1">{{$req_inter->number}}</td>
                                <td class="column2">{{$req_inter->equipement->designation}}</td>
                                <td class="column3">{{$req_inter->description}}</td>
                                <td class="column4">{{$req_inter->degree_urgency}}</td>
                                <td class="column5">{{$req_inter->created_at}}</td>
                                <td class="column6"></td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

<!-- Users Ends -->
@endSection



