
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Popper = require('popper.js');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');

require('./bootstrap/bootstrap.js');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));
window.onload = function () {
    const app = new Vue({
        el: '#app'
    });
};
