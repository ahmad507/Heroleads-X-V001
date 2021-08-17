
require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue'
import Vuetify from '../plugins/vuetify'
import VueRouter from 'vue-router'
import routes from './routes'
import store from './store'



Vue.use(VueRouter)


Vue.component('app-component', require('./components/App.vue').default)

const app = new Vue({
    vuetify: Vuetify,
    router: new VueRouter(routes),
    store,
    el: '#app',
});
