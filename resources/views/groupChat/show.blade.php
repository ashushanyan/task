@extends('layouts.app')

@section('content')

    {{--<div class="message-user-from">--}}
        {{--<div class="message-user-from-text">--}}
            {{--<h4>{{$auth->name}}</h4>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="message-box">
        <div class="top-contain-chat">
            <form action="{{url('/groupChats/'.$group->id)}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{csrf_field()}}
                <h3 class="well">
                    <input name="group_name" value="{{$group->name}}">
                    <button type="submit" class="btn btn-primary pull-right">Edit Name</button>
                </h3>
            </form>
            <div class="members" style="text-align: center;">
                <ul class="nav nav-pills nav-stacked">
                    <li class="dropdown">
                        <a class="dropdown-toggle well" data-toggle="dropdown" href="#">members <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        @foreach($group->users as $user)
                            @if($user->id !== Illuminate\Support\Facades\Auth::id())
                                <li><a href="/chat/{{$user->id}}" style="text-decoration: none;">{{$user->name}}</a></li>
                            @endif
                        @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="message-box-text">
           @if(!$messages->isEmpty())
               @foreach($messages as $message)
                   @if($message['user_id'] == $auth->id)
                        <div class="my-messages">
                            <div class="my-messages-box">
                                {{$message->message}} <span>{{$message->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                   @else()
                        <div class="users-for-chat">
                            <div class="users-for-chat-name">{{ substr($message->user['name'], 0, 1)}}</div>
                            {{--<div class="users-for-chat-name"> {{ "/img" }}</div>--}}
                            <div class="users-for-chat-text">{{$message->message}}  <span>{{$message->user['name']}} {{$message->created_at->diffForHumans() }}</span></div>
                        </div>
                   @endif
               @endforeach
           @else
               <div style="padding: 14%;text-align: center;">
                   There ara no messages :(
               </div>
           @endif
           <div v-if="messageGroupChat.text" class="users-for-chat">
               <div class="users-for-chat-box" >
                   <div>@{{messageGroupChat.user.name}}</div>
                   @{{ messageGroupChat.text }}
               </div>
           </div>
        </div>
        <div>
            <form action="{{url('/groupMessages')}}" method="POST" >
                {{csrf_field()}}
                <div class="create-post-section">
                    <input type="hidden" name="group_id" value="{{$group->id}}">
                    <textarea type="text" name="message" id="message-input" class="form-control show-textarea" placeholder = 'type a message..' rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-messages-send">Send</button>
            </form>
       </div>
    </div>
    {{--<div class="message-user-to flex-container">--}}
        {{--@foreach($usersForChat as $userForChat)--}}
            {{--<div class="message-user-to-text">--}}
                {{--<h4>{{$userForChat->name}}</h4>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
@endsection