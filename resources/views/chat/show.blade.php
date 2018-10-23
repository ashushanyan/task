@extends('layouts.app')

@section('content')
    <div class="message-box">
        <h3 class="well">{{$userForChat->name}}</h3>
        <div class="message-box-text" id="message-section">
            @if(!$messages->isEmpty())
               @foreach($messages as $message)
                   @if($message['from_id'] == $auth->id)
                       <div class="my-messages">
                           <div class="my-messages-box">
                               {{$message->text}} <span>{{$message->created_at->diffForHumans()}}</span>
                           </div>
                       </div>
                   @else()
                       <div class="users-for-chat">
                           <div class="users-for-chat-name">{{ substr($message->user['name'], 0, 1)}}</div>
                           {{--<div class="users-for-chat-name"> {{ "/img" }}</div>--}}
                           <div class="users-for-chat-text">{{$message->text}}<span>{{$message->user['name']}} {{$message->created_at->diffForHumans() }}</span></div>
                       </div>
                   @endif
               @endforeach
                   <div id="message_event_box">
                       <div class="users-for-chat-box" >
                           <div id="chat_user_name" class="users-for-chat-name">A</div>
                           {{--@{{$message->created_at->diffForHumans() }}--}}
                           <div id="chat_user_message_text" class="users-for-chat-text">
                               <span id="chat_user_message_user_name">  asd</span>
                           </div>
                       </div>
                   </div>
            @else
               <div style="padding: 14%;text-align: center;">
                   There ara no messages :(
               </div>
            @endif
        </div>
        <div>
            <form action="{{url('/chat')}}" method="POST" >
                {{csrf_field()}}
                <div class="create-post-section">
                    <input type="hidden" name="to_id" value="{{$userForChat->id}}">
                    <textarea type="text" name="text_message" id="message-input" class="form-control show-textarea" placeholder = 'type a message..' rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-messages-send">Send</button>
            </form>
       </div>
    </div>


@endsection
<script src="{{ asset('js/main.js') }}"></script>