require('./bootstrap');
import Vue2Editor from "vue2-editor";
window.Vue = require('vue');
Vue.use(Vue2Editor);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('mail-form', require('./components/MailFormComponent.vue').default);
Vue.component('template-modal', require('./components/MailTemplateModalComponent.vue').default);
Vue.component('mail-alert', require('./components/MailNotificationComponent.vue').default);






const app = new Vue({
    el: '#app',
});