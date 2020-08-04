<?php
    use App\Tag;
    $tags = Tag::withCount('forums')->orderBy('forums_count', 'desc')->take(6)->get();
    $limit = count($tags);
?>
{{--<form method="GET" action="{{LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.search')}}">--}}
<form method="GET" action="/search/results">
    <div class="input-group mb-3">
        <input type="text" style="border-radius:5px 0px 0px 5px;" class="form-control" name="search_query" placeholder="{{__('Search')."..."}}" aria-label="search" aria-describedby="button-addon2" required>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">{{ __('Search') }}</button>
        </div>
    </div>
</form>
<br>
<!-- Categories Widget -->
<div class="widget-card">
    <h5 class="widget-title">{{ __('Popular tags') }}</h5>
    <div class="widget-body">
        <ul class="list-unstyled">
            @for($i = 0; $i < 3; $i++)
                @if($i < $limit)
                    <li>
                        <form method="GET" action="/tags/{{$tags[$i]->id}}/search">
                            <button class="tag-button link-button" style="text-decoration: none;" type="submit">{{$tags[$i]->content}}</button>
                        </form>
                    </li>
                @endif
            @endfor
        </ul>
        <ul class="list-unstyled">
            @for($i = 3; $i < 6; $i++)
                @if($i < $limit)
                    <li>
{{--                        <form method="GET" action="{{str_replace('{id}', $tags[$i]->id, LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.tag-search'))}}">--}}
                        <form method="GET" action="/tags/{{$tags[$i]->id}}/search">
                            <button class="tag-button link-button" style="text-decoration: none;" type="submit">{{$tags[$i]->content}}</button>
                        </form>
                    </li>
                @endif
            @endfor
        </ul>
    </div>
</div>
<br>
<!-- Side Widget -->
<div class="widget-card">
    <h5 class="widget-title">Side Widget</h5>
    <div class="widget-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
    </div>
</div>
