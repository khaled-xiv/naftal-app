<?php
use App\Tag;
$tags = Tag::withCount('forums')->orderBy('forums_count', 'desc')->take(6)->get();
$limit = count($tags);
?>

<div class="input-group mb-3">
    <input type="text" style="border-radius:5px 0px 0px 5px;" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="button-addon2">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
    </div>
</div>
<br>
<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Popular tags</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @for($i = 0; $i < 3; $i++)
                        @if($i < $limit)
                            <li>
                                <form method="GET" action="/tags/{{$tags[$i]->id}}/search">
                                    <button class="link-button" style="text-decoration: none;" type="submit">{{$tags[$i]->content}}</button>
                                </form>
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @for($i = 3; $i < 6; $i++)
                        @if($i < $limit)
                            <li>
                                <form method="GET" action="/tags/{{$tags[$i]->id}}/search">
                                    <button class="link-button" style="text-decoration: none;" type="submit">{{$tags[$i]->content}}</button>
                                </form>
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Side Widget -->
<div class="card my-4">
    <h5 class="card-header">Side Widget</h5>
    <div class="card-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
    </div>
</div>
