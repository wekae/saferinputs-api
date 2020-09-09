require('./bootstrap');



window.Vue = require('vue');

// Passport Components
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);




const app = new Vue({
    el: '#app'
});




// Vue.loadScript("https://code.jquery.com/jquery-3.5.1.min.js");
// Vue.loadScript("/js/coreui.bundle.js");
// Vue.loadScript("/js/coreui-utilities.js");
// Vue.loadScript("https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js");
// Vue.loadScript("https://cdn.jsdelivr.net/npm/@coreui/coreui-plugin-chartjs-custom-tooltips@1.3.1/dist/umd/custom-tooltips.js");
