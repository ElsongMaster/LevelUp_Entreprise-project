import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './assets/tailwind.css'
import Vuelidate from 'vuelidate'
import vuetify from './plugins/vuetify'
Vue.config.productionTip = false

Vue.use(Vuelidate)
new Vue({
  router,
  store,
  validations:{},
  vuetify,
  render: h => h(App)
}).$mount('#app')
