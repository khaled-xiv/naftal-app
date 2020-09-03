<?php
    use App\Tag;
    $tags = Tag::withCount('forums')->orderBy('forums_count', 'desc')->get();
?>
<div class="modal fade" id="SeeAll" tabindex="-1" role="dialog" aria-labelledby="SeeAllTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SeeAllTitle">{{__('List of tags')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="tag-list">
                @foreach($tags as $tag)
                    <form class="tag-item" method="GET" action="/tags/{{$tag->id}}/search">
                        <button class="tag-button tag-button-2 link-button" style="text-decoration: none;" type="submit">{{$tag->content}}</button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>