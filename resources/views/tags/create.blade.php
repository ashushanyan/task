@extends('layouts.app')

@section('content')
    {{--{{dd($allTags)}}--}}
    <h1>Create Tag</h1>
    <form action="{{url('/tags')}}" method="POST" class="form_group">
        <input type="hidden" name="type" value="createTagInPost">

        {{csrf_field()}}

        <div class="form-group form-input-tagName">
            <label for="tag_name">Tag Name</label>
            <input type="text" name="tag" id="tag_name" class="form-control" placeholder = 'Title'>
        </div>

        <div class="form-input-tagName">
            <label for="drop_posts">Add Posts</label>
            <select class="form-control" id="drop_posts" name="post_id">
                <option></option>
                @foreach($allPosts as $post)
                    <option value = {{$post->id}} >{{$post->title}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary createTag_form_btn">Submit</button>
    </form>
@endsection

