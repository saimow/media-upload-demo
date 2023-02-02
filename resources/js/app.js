import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js';

import TestComponent from './components/Posts/TestComponent.vue'

const app = createApp({})

app.component('test-component', TestComponent)

app.mount('#app')