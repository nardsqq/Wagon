
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.filter('money', function (value) {
var prefix = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;

if (value < 0) return '(' + (prefix ? '₱ ' : '') + Math.abs(value).toLocaleString('en-PH', { 'minimumFractionDigits': 2, 'maximumFractionDigits': 2 }) + ')';
return (prefix ? '₱ ' : '') + value.toLocaleString('en-PH', { 'minimumFractionDigits': 2, 'maximumFractionDigits': 2 });
});

require('../../../node_modules/jquery-mask-plugin/dist/jquery.mask');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
