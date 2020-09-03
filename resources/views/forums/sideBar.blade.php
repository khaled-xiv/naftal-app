<?php
    use App\Tag;
    use App\Forum;
    $tags = Tag::withCount('forums')->orderBy('forums_count', 'desc')->take(6)->get();
    $limit = count($tags);
    $latestForums = Forum::orderBy('created_at', 'desc')->take(4)->get();
?>
{{--<form method="GET" action="{{LaravelLocalization::getUrlFromRouteNameTranslated(LaravelLocalization::getCurrentLocale(), 'routes.search')}}">--}}
<form class="forum-search big-scr-search" method="GET" action="/search/results">
    <input type="search" class="searchbox" name="search_query" placeholder="{{__('Search').'...'}}" required>
	<input title="Search" value="" type="submit" class="search-button">
</form>

<form class="forum-search" method="post">
  
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
    <button class="see-more" data-toggle="modal" data-target="#SeeAll" role="button">
        {{ __('See all tags') }}
    </button>
</div>
<br>
<!-- Side Widget -->
<div class="widget-card">
    <h5 class="widget-title">{{ __('Latest Questions') }}</h5>
    <div class="widget-body">
		@foreach($latestForums as $forum)
		<div class="latest-forum"><a href="/forum/{{$forum->id}}">{{$forum->title}}</a></div>
		@endforeach
    </div>
</div>
