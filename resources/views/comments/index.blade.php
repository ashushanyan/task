@extends('layouts.app')

@section('content')
    <div>
        <h4>Filter</h4>
        <form action="{{'/comments'}}" class="row" method="GET">
            <input type="number" class="col-sm-3" placeholder = 'user id' name="user_id">
            <input type="number" class="col-sm-3" placeholder = 'post user id' name="post_user_id">
            <input type="text" class="col-sm-3" placeholder = 'post title' name="post_title">
            <input type="comment" class="col-sm-3" placeholder = 'comment' name="comment">
            <button type="submit" class="btn btn-success pull-right">search</button>
        </form>
    </div>
    <h3>All Comments</h3>
{{--    {{dd($comments)}}--}}
    @if (count($comments) > 0)
        @foreach($comments as $comment)
            <div class="well section">
                <form action="{{url('/comments/'.$comment['id'])}}" method="POST" class="pull-right">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-link">Delete comment <i class="fa fa-trash-o"></i></button>
                </form>
                <form action="{{url('/comments/'.$comment['id'].'/edit')}}" method="GET" class="pull-right">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{$comment['id']}}">
                    <input type="hidden" name="body" value="{{$comment['body']}}">
                    <button type="submit" class="btn btn-link">Edit comment <i class="fa fa-edit"></i></button>
                </form>
                <p>{!!$comment['body']!!}</p><hr>
                <p><small>Comment -user id ->  {{$comment['user']['id']}}</small></p>
                <p><small>Post title -> {{$comment['post']['title']}}</small></p>
                <p><small>Post user id -> {{$comment['post']['user_id']}}</small></p>
                <small class="pull-right">{{$comment['created_at']}}</small></br></hr>
            </div>
        @endforeach
    @else
        <p>No search found</p>
    @endif
@endsection

