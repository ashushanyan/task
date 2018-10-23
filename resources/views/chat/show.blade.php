@extends('layouts.app')

@section('content')
    {{--<example></example>--}}
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
                   <div v-if="message.length || message.user">
                       <div class="users-for-chat-box" >
                           <div class="users-for-chat-name">@{{message.user.name.charAt(0)}}</div>
                           {{--@{{$message->created_at->diffForHumans() }}--}}
                           <div class="users-for-chat-text"> @{{ message.text }}<span>@{{$message.user.name}} </span></div>
                       </div>

                       {{--<div class="users-for-chat">--}}
                           {{--<div class="users-for-chat-name">{{ substr($message->user['name'], 0, 1)}}</div>--}}
                           {{--<div class="users-for-chat-name"> {{ "/img" }}</div>--}}

                       {{--</div>--}}
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

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>--}}
{{--<script>--}}
    {{--// Vue.component('example', require('./components/Example.vue'));--}}

    {{--const app = new Vue({--}}
        {{--el: '#app',--}}
        {{--data: {--}}
            {{--message: {},--}}
            {{--messageGroupChat: {}--}}
        {{--},--}}
        {{--created() {--}}
            {{--Echo.channel('chatroom')--}}
                {{--.listen('MessagePosted', (e) => {--}}
                    {{--this.message = e;--}}
                {{--});--}}
            {{--this.message = {};--}}
            {{--Echo.channel('groupChatRoom')--}}
                {{--.listen('GroupMessagePosted', (e) => {--}}
                    {{--this.messageGroupChat = e;--}}
                {{--});--}}
        {{--},--}}
    {{--});--}}
{{--// </script>--}}
