require('./bootstrap');

import Vue from 'vue'
import Axios from 'axios'

window.Vue = require('vue');
window.axios = require('axios');

window.axios.defaults.headers.common = {
  'X-Requested-With' : 'XMLHttpRequest',
  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
};

// Vue.component('welcome', require('./components/welcome.vue').default);
Vue.component('chat', require('./components/Chat.vue').default);
Vue.component('userrolessystem', require('./components/UserAndRoles.vue').default);

const app = new Vue(
  {
    el:'#app'

  });
