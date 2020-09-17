require('./bootstrap');

import Vue from 'vue';

window.Bus = new Vue();

Vue.component('twitch', require('./components/twitch').default);
Vue.component('outlook', require('./components/outlook').default);
Vue.component('sketchni', require('./components/sketchni').default);
Vue.component('linkcraft', require('./components/linkcraft').default);
Vue.component('ukblabberbox', require('./components/ukblabberbox').default);
Vue.prototype.user = window.user;

const app = new Vue({
    el: '#app'
});
