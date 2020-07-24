/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Vuex = require('vuex');

Vue.use(require('vuex'));
import Vue from "vue";
import VueSimpleAlert from "vue-simple-alert";

Vue.use(VueSimpleAlert);
const store = new Vuex.Store({
    state: {
        type: 1,
        news: null
    },
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-panel-component', require('./components/AdminPanelComponent.vue').default);
Vue.component('user-index-component', require('./components/UserIndexComponent.vue').default);
Vue.component('product-index-component', require('./components/ProductIndexComponent.vue').default);
Vue.component('service-index-component', require('./components/ServiceIndexComponent.vue').default);
Vue.component('production-index-component', require('./components/ProductionIndexComponent.vue').default);
Vue.component('news-index-component', require('./components/NewsIndexComponent.vue').default);
Vue.component('news-create-component', require('./components/NewsCreateComponent.vue').default);
Vue.component('statistic-index-component', require('./components/StatisticIndexComponent.vue').default);
Vue.component('check-index-component', require('./components/CheckIndexComponent.vue').default);
Vue.component('announce-index-component', require('./components/AnnounceIndexComponent.vue').default);
//
// const Example = require('./components/ExampleComponent');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store: store
});

