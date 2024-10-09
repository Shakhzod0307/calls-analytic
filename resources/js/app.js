// import '../css/app.css';
import './bootstrap';
import { createApp } from 'vue';
import router from './router.js';
import App from './App.vue';
import VueTailwindDatepicker from "vue-tailwind-datepicker";

// const app = createApp(App);
// app.use(VueTailwindDatepicker);
createApp(App).use(router).use(VueTailwindDatepicker).mount('#app');
