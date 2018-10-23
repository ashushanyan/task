@extends('layouts.app')

@section('content')
    <div style="overflow: hidden">
        <div style="float: left; width: 80%; border-radius: 10px;">
            <form action="{{url('/groupChats')}}" method="POST">
                {{csrf_field()}}
            <div class="well" style="overflow: hidden">
                <h3 style="float: left">All Users</h3>
                <div class="input_button_group">
                    <button type="submit" class="btn">Create group chat</button>
                    <input type="text" name="group_name" placeholder="Group name" value="">
                    <i class="fa fa-level-down" aria-hidden="true"></i>
                </div>
                </div>
                @foreach($users as $user)
                    <div class="well" style="display: block; overflow: auto; ">
                        <a href="/chat/{{$user->id}}" style="text-decoration: none; color: #636b6f">
                            <div class="user_photo" >{{substr($user->name, 0, 1)}}</div>
                            <p style = "font-size: 20px; margin: 8px 0 8px 20px; float: left" >{{$user->name}}</p>
                        </a>
                        <input type="checkbox" style="float: right;width: 20px; height: 20px; margin: 15px" value="{{$user->id}}" name="users_ids[]">
                    </div>
                @endforeach

            </form>
        </div>
        <div style="overflow: hidden; float: right; width: 15%; border-bottom: 10px solid silver; border-radius: 5px">
            <div class="well">
                <h5>my Groups</h5>
            </div>
            <div>
            @if(!$groups->isEmpty())
                @foreach($groups as $group)
                    <a href="/groupChats/{{$group->id}}" style="display: inherit; margin: 5px 10px; overflow: auto; color: #636b6f; font-size: 14px" class="btn btn-link">
                        {{$group->name}}
                    </a>
                @endforeach
            @else
                <div style="padding: 16px 15px;text-align: center;font-size: 11px">
                    You haven't a open group
                </div>
            @endif
        </div>
    </div>
@endsection