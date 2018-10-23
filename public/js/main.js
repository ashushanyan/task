
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: {
        message: {}
    },
    created() {
        Echo.channel('chatroom')
            .listen('MessagePosted', (e) => {
                // console.log(e);
                this.message = e;
            });
    }
});

window.onload = function() {
    var objDiv = document.getElementById("message-section");
    objDiv.scrollTop = objDiv.scrollHeight;
};