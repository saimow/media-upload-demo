import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js';

import Uploader from 'vue-media-upload';

const app = createApp({})

app.component('Uploader' , Uploader);

app.mount('#app')