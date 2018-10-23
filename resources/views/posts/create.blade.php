@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form action="{{url('/posts')}}" method="POST" >
        {{csrf_field()}}
        <div class="create-post-section">
            <div class="form-group input-textarea-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder = 'Title'>
                <label for="body">Body</label>
                <textarea name="body" id="article-ckeditor" placeholder = 'body text'  class="form-control" rows="10"></textarea>
            </div>
            <div class="form-input-select-inPost">
                <label for="drop_posts">Add tag</label>
                <select class="form-control" id="drop_posts" name="tag_id">
                    <option></option>
                    @foreach($allTags as $tag)
                        <option value = {{$tag->id}} >#{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-right">Submit</button>
    </form>
    {{--Sctipt--}}

    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection

