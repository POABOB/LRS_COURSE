import { createApp } from 'vue'
import store from './store'
import router from './router'
import App from './App.vue'

// 引入tailwindcss的樣式
import './index.css'

// 引入SweetAlert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import VueClickAway from "vue3-click-away";


// Google Oauth
import GAuth from 'vue3-google-oauth2'
// config
const gAuthOption = {
    clientId: process.env.VUE_APP_GOOGLE_CLIENT_ID,
    scope: 'profile email',
    prompt: 'consent',
    fetch_basic_profile: true
}

createApp(App)
    .use(VueClickAway)
    // 掛載VueSweetalert2
    .use(VueSweetalert2)
    // 掛載router方便控制組件
    .use(store)
    // 掛載Google Oauth
    .use(router)
    // 掛載Vuex方便管理組件狀態
    .use(GAuth, gAuthOption)
    .mount('#app')