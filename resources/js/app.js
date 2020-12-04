
window.Vue = require('vue')
require('./bootstrap');

require('alpinejs');

const files = require.context('./components', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/* eslint-disable no-unused-vars */
new Vue({
  el: '#app'
})