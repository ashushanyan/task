
@extends('layouts.app')

@section('content')

    <a href="/posts" class="btn btn-primary">Go back ->/posts</a>
    <div class="show-box-title" style="overflow: hidden;">
        <div class="post_title">
            <h2>
                {{$post->title}}
            </h2>
            @foreach($post->tags as $tag)
                #{{$tag->name}}
            @endforeach
        </div>
        <div class="form-input-postName">
            <form action="{{url('/posts/'.$post->id)}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{csrf_field()}}

                <div class="form-input-select">
                    <input type="hidden" name="post_body"   value="{{$post->body}} ">
                    <input type="hidden" name="post_title"  value="{{$post->title}}">
                    <p>Add tag</p>
                    <select class="form-control multielect_show" name="tag_ids[]" multiple>
                        @foreach($allTags->all() as $tag)
                            @if($post->tags->contains($tag->id))
                                <option value = {{$tag->id}} selected>#{{$tag->name}}</option>
                            @else
                                <option value = {{$tag->id}}>#{{$tag->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-show-post">Add Tag</button>
            </form>
        </div>
    </div>
    <div class="well">
        <h3>{!!$post->body!!}</h3>
        <small class="pull-right">Written on {{$post->created_at}} by <b></b></small>
    </div>

    <hr>
    <div>
        <form action="{{'/posts/'. $post->id.'/edit'}}" method="GET" class="pull-left" style="margin-right: 10px">
            <button type="submit" class="btn">Edit Post <i class="fa fa-edit"></i> </button>
        </form>

        <form action="/posts/{{$post->id}}" method="POST" class="pull-left">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete Post <i class="fa fa-trash"></i></button>
        </form>
    </div>
    <br>
    <section>
        <h2>Comments</h2>
        <div class="well">
            @foreach($post->comments as $comment)
                <div class="well">
                    <form action="/posts/{{$comment->id}}" method="POST" class="pull-right">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-link">Delete comment <i class="fa fa-trash-o"></i></button>
                    </form>
                    <form action="{{'/posts/'. $comment->id.'/edit'}}" method="GET" class="pull-right">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$comment->id}}">
                        <input type="hidden" name="body" value="{{$comment->body}}">
                        <button type="submit" class="btn btn-link">Edit comment <i class="fa fa-edit"></i></button>
                    </form>
                    <p><b>{{$comment->user->name}}</b></p>
                    <p>{!!$comment->body!!}</p>
                    <small class="pull-right">{{$comment->created_at}}</small></br></hr>

                    {{--<div class="text-left replycomm">--}}
                        {{--<h4>Reply</h4>--}}
                        {{--<div>--}}
                            {{--@foreach($comment->replycomments as $reply)--}}
                                {{--<p> <b>{{$reply->name}}</b> - {{$reply->text}}    </p>--}}
                                {{--<small class="pull-right"> {{$reply->created_at}}</small><br><hr>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                        {{--<form action="{{url('/replycomment')}}" method="POST" >--}}
                            {{--{{csrf_field()}}--}}
                            {{--<input type="hidden" name="comment_id" value="{{$comment->id}}">--}}
                            {{--<input type="text" name="text">--}}
                            {{--<button type="submit" class="btn btn-default">Send</button>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                </div>
            @endforeach
        </div>
    </section>
    <form action="{{url('/comments')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="body"><h3>add a comment</h3></label>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <textarea name="body" id="article-ckeditor" placeholder = 'body text'  class="form-control" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-right">Submit</button>
    </form>



@endsection