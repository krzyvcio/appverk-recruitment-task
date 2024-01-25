import {createApp} from 'vue'
import Emitter from 'tiny-emitter'

import App from "./App.vue";

import '../css/reset.css'
import '../css/app.css'

const app = createApp(App)
const emitter = new Emitter();

app.provide('emitter', emitter);


app.mount('#app');


