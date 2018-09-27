@extends('layouts.app')

@section('content')
    <h1>Users->posts->comments</h1>
    <div>
        <h4>Filter</h4>
        <form action="{{'/users'}}" class="form-group" style="width: 500px" method="GET">
            <input type="post" class="form-control pull-left" placeholder = 'Post' name="post_title">
            <input type="user" class="form-control pull-left" placeholder = 'user' name="user_name">
            <select name="tag_name" size="4" style="width: 500px">
                <option value="">Not user tags</option>
{{--                @foreach($users as $user)--}}
                    @foreach($allTags as $tag)
                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                    @endforeach
                {{--@endforeach--}}

            </select>
            <button type="submit" class="btn btn-success">search</button>
        </form>
    </div>
{{--    {{dd($users)}}--}}
    @if(count($users) > 0)
        @foreach($users as $user)
{{--            {{dd($user->tags)}}--}}
            <div class="well">
                <h3>user - {{$user->name}}</h3><hr>
                <div class="post-box">
                    @foreach($user->posts as $post)
                        <h4>{{$post->title}} <b> Post id </b> - {{$post->id}} <b> tag </b> - {{($post->tags->first()['name'])}}</h4>
                        <div class="comment-box well">
                            @foreach($post->comments as $comment)
                                <p>{{$comment->body}} <small style="float: right"> written by {{$comment->user->name}}</small></p>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @else
        <p>No user found</p>
    @endif
@endsection