
 require('./bootstrap');

 window.Vue = require('vue');
 
 import router from './router';
 
 Vue.component('pagina-inicio', require('./components/PaginaInicio.vue').default);
 
 /*
 const app = new Vue({
     el: '#app',
 });
 */
 
 const app = new Vue({
     el: '#app',
     router
 });
 

 require('./dropzone');
 