
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.use(require('vue-resource'));
Vue.use(require('vue-select'));
Vue.use(require('vue-moment'));
Vue.use(require('vue-strap'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('plan', require('./components/Plan.vue'));
Vue.component('ym-picker', require('./components/MonthYearPicker.vue'));
Vue.component('investing-quantity', require('./components/InvestingQuantity.vue'));

const app = new Vue({
    el: '#app'
});
