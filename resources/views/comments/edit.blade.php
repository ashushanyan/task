@extends('layouts.app')

@section('content')

    <form action="{{url('/comments/'.$comment['id'])}}" method="POST" >
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{csrf_field()}}
        <div class="form-group">
            <label for="body"><h3>edit a comment</h3></label>
            <textarea name="body" id="article-ckeditor" placeholder = 'body text'  class="form-control" rows="10">
                {!!$comment['body']!!}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-right">Submit</button>
    </form>

    {{--Sctipt--}}

    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection

