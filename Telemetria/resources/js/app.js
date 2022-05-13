

 require('./bootstrap');

 import Vue from 'vue'
 import VueRouter from 'vue-router'
 import axios from 'axios'
 import Vuetify from './plugins/vuetify'
 import 'material-design-icons-iconfont/dist/material-design-icons.css'

 Vue.use(VueRouter);
 
 Vue.component('App', require('./App.vue').default);
 
 import Login from "./views-vue/Login.vue"
 import Main from "./views-vue/Main.vue"
 
 const router = new VueRouter({
     mode: 'history',
     routes: [{
         path: '/login',
         name: 'Login',
         component: Login
     },
    {
        path: '/',
        name: 'Main',
        component: Main
    }]
 });
 
 const app = new Vue({
    vuetify: Vuetify,
    el: '#app',
    router,

 });