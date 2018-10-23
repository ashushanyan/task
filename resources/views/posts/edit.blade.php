@extends('layouts.app')

@section('content')
    <h1>Create Post </h1>
    @foreach($post->tags as $tag)
        <h4>#{{$tag->name}}</h4>
    @endforeach
    <form action="{{url('/posts/'.$post->id)}}" method="POST" style="overflow: hidden">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{csrf_field()}}
        <div class="form-group edit-title" >
            <label for="title">Title</label>
            <input type="text" name="post_title" id="title" class="form-control" placeholder = 'Title' value="{{$post->title}}">
        </div>
        <div class="edit-select">
            <label for="title">Add Tag</label>
            <div class="edit-multiple-select">
                <select class="form-control multielect_show" name="tag_ids[]" size="5" multiple>
                    @foreach($tags->all() as $tag)
                        @if($post->tags->contains($tag->id))
                            <option value = {{$tag->id}} selected>#{{$tag->name}}</option>
                        @else
                            <option value = {{$tag->id}}>#{{$tag->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="body" style="margin-top: 50px">Body</label>
            <textarea name="post_body" id="article-ckeditor" placeholder = 'body text' class="form-control" rows="10">{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-right">Submit</button>
    </form>

    {{--Sctipt--}}

    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection

