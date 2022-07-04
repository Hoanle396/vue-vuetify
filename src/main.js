import Vue from 'vue'
import App from './App.vue'
import router from './router'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.css'
import vuetify from './plugins/vuetify'
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
  vuetify,

  data: {
    authenticated: false,
    authenticatedUser: '',
    error: false,
    errorMsg: '',
  },

  mounted() {
    if (!this.authenticated) {
      this.$router.replace({ name: "Login" });
    }
  },
  methods: {
    setAuthenticated(status) {
      this.authenticated = status;
      console.log("status" + status);

    },
    setAuthenticatedUser(username) {
      this.authenticatedUser = username;
      console.log("username" + username);
    },
    getAuthenticated() {
      return this.authenticated;
    },
    logout() {
      this.authenticated = false;
    }
  }
}).$mount('#app')
