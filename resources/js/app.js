require('./bootstrap');

import Vue from 'vue';

// import App from '../js/vue/app.vue';
import Todos from './vue/todos/todos.vue';
// import Modal from '../js/vue/components/modal.vue';

// Vue.component("v-modal", require("./vue/components/modal.vue"));

// const app = new Vue({
//     el: '#app',
//     components: {
//         App,
//         Todos,
//         Modal,
//     },
//     data: {
//         showModal: false,
//     },
// });

const todos = new Vue({
    el: '#todos',
    components: {
        Todos,
    },
});
