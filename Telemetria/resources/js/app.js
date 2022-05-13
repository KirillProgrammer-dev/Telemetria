

 require('./bootstrap');

 import Vue from 'vue'
 import VueRouter from 'vue-router'
 import axios from 'axios'
 import Vuetify from './plugins/vuetify'

 Vue.use(VueRouter);
 
 Vue.component('App', require('./App.vue').default);
// Vue.component('Menu', require('./components/Menu.vue').default);
 
 
 
 /*const router = new VueRouter({
     mode: 'history',
     routes: [{
         path: '/',
         name: 'Home',
         component: Home
     },
 
     {
         path: '/admin',
         name: 'Admin',
         component: Admin
     },

     {
        path: '/login',
        name: 'Login',
        component: Login
    },

    {
        path: '/registration',
        name: 'Registration',
        component: Registration
    },
 ]
 });*/
 
 const app = new Vue({
    vuetify: Vuetify,
    el: '#app',

 });