@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/posts/create" method="GET" class="pull-left">
                        <button type="submit" class="btn btn-primary"> Create Post </button>
                    </form>
                    <form action="/tags/create" method="GET" class="pull-left dashboard-form-tag">
                        <button type="submit" class="btn btn-default"> Create Tag </button>
                    </form><br>

                    {{--<a href="" class=""></a>--}}
                    <h3>You are logged in!</h3>  
                    @if (count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <th><a href="/posts/{{$post->id}}" class="btn">{{$post->title}}</a></th>
                                    <th><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit <i class="fa fa-edit"></i></a></th>
                                    <th>
                                        <form action="{{url('/posts/'.$post['id'])}}" method="POST" class="pull-right">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Delete Post <i class="fa fa-trash"></i></button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </table>        
                    @else
                        <p>Yoy have no posts</p>
                    @endif
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
