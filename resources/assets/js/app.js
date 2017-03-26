import Vue from 'vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-default/index.css'

import http from './services/http.js'
import userStore from './stores/userStore'
import router from './router'
import event from './utils/event'

Vue.use(ElementUI)

require('bootstrap-sass')

const app = new Vue({
  router,
  el: '#app',
  created () {
    http.init()
    userStore.init()
    event.init(new Vue)
  },
  render: h => h(require('./app.vue')),
})
