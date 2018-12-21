import 'material-design-icons-iconfont/dist/material-design-icons.css'
import Vue from 'vue'
import App from './App'
import router from './router'
import Vuetify from 'vuetify'
import Theme from '@//app/Arch/Theme'

Vue.config.productionTip = false

Vue.use(Vuetify, {
  theme: Theme,
  iconfont: 'mdi'
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
