/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default
import VueRouter from 'vue-router'
import "font-awesome/css/font-awesome.min.css";
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



const routes = [
    { path : '/todo', component : require('./components/todoList.vue').default },
    { path : '/componentOne', component : require('./components/ExampleComponent.vue').default },
    { path : '/componentTwo', component : require('./components/ExampleComponentTwo.vue').default },
    { path : '/componentThree', component : require('./components/ExampleComponentThree.vue').default },
    { path : '/componentFour', component : require('./components/ExampleComponentFour.vue').default },
    { path : '/componentFive', component : require('./components/ExampleComponentFive.vue').default },




];

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router  = new VueRouter({
    routes
});
const app = new Vue({
    el: '#app',
    router,
});
