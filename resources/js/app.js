import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'

import { createApp } from "vue";
import { router } from './router';
// import Vuetify from 'vuetify'
import App from "./App.vue";

const app = createApp(App);

app.use(router).mount("#app");