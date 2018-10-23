
require('./bootstrap');

// window.Vue = require('vue');
//
// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app',
//     data: {
//         message: {},
//         messageGroupChat: {}
//     },
//     created() {
//         Echo.channel('chatroom')
//             .listen('MessagePosted', (e) => {
//                 this.message = e;
//             });
//         Echo.channel('groupChatRoom')
//             .listen('GroupMessagePosted', (e) => {
//                 this.messageGroupChat = e;
//             });
//     },
// });

$("textarea").on("keydown", function(e) {
    if(e.keyCode === 13) {
        e.preventDefault();
        e.stopPropagation();
        $(this).parents('form').submit();
    }
});

Echo.channel('chatroom')
    .listen('MessagePosted', (e) => {
        console.log(e)
        document.getElementsByClassName('message-box-text')[0].insertAdjacentHTML( 'beforeend', `<div class='users-for-chat'><div class='users-for-chat-name'>N</div><div class='users-for-chat-text'>${e.text}<span>Nar 13 seconds ago</span></div></div>`)
    });