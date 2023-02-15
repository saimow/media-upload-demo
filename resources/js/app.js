import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js';

import CreatePost from './layouts/Posts/Create.vue';
import UpdatePost from './layouts/Posts/Update.vue';

const app = createApp({})

app.component('create-post' , CreatePost);
app.component('update-post' , UpdatePost);

app.mount('#app')