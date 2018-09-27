@extends('layouts.app')

@section('content')
    <div>
        <form action="{{'/posts'}}" class="form-group post-form-group" method="GET">
            <div class="form-group form-input-tagName">
                <label for="search_post">Post search</label>
                <input type="text" name="search_key" id="search_post" class="form-control" placeholder = 'title or body' value={{$request->search_key}}>
            </div>
            <div class="form-input-tagName">
                <label for="drop_posts">Filter Tags</label>
                <select class="form-control" id="drop_posts" name="tag_ids[]" multiple>
                    @foreach ($allTags->all() as $tag)
                         <option value={{$tag->id}}>#{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success createTag_form_btn">search</button>
        </form>
    </div>
    <div>
        <a href="/comments" class="btn btn-default">All Comments</a>
    </div>
    <h1>Posts</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="well">
                <h3>
                    <a href="/posts/{{$post->id}}"> {{$post->title}} </a>
                    @foreach($post->tags as $tag)
                        <span>#{{$tag->name}}</span>
                    @endforeach
                </h3>
                <p class="pull-left">description - {{$post->body}}</p>
                <small class="pull-right">Written on {{$post->created_at}} by <b>{{$post->user->name}}</b></small><br>
            </div>
        @endforeach
    @else
        <p>No posts found</p>
    @endif
@endsection