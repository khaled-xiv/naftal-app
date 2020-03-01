@extends('layouts.without_footer')
@section('title', 'Centers')
@section('content')

<div class="container">

    <div class="content-box-md">

        <div class="limiter">

            <ul class="list-group">
                <a href="{{url('centers/'.$center->id.'/edit')}}" class="list-group-item list-group-item-action active">{{$center->code}}</a>
                <li class="list-group-item">{{$center->location}}</li>
                <li class="list-group-item">{{$center->storage_capacity}}</li>
                <li class="list-group-item">{{$center->phone}}</li>
            </ul>

        </div>

    </div>

</div>
