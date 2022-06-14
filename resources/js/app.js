import { createApp } from "vue";
import App from './App.vue'
import axios from "axios";
import router from "./router";

require('./bootstrap')


const app = createApp(App);
app.config.globalProperties.$axios = axios
app.use(router)
app.mount('#app')
