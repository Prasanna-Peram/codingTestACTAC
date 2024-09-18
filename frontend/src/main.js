import Vue from 'vue'
import App from './App.vue'
import router from './router';
import axios from 'axios';
import config from './config'; // Import the config
import 'bootstrap/dist/css/bootstrap.css';

// Set base URL for Axios
axios.defaults.baseURL = config.apiBaseUrl;

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
