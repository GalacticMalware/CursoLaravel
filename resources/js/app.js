
require('./bootstrap');


/*$('form').on('submit', function(){
    $(this).find('button').attr('disabled',true);
})*/


window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});
