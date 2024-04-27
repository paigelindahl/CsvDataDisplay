import './bootstrap';
import '../css/app.css';
import {createApp} from 'vue';
import { ZiggyVue } from 'ziggy-js';
import App from './App.vue'

createApp(App)
    .use(ZiggyVue)
    .mount("#app");
