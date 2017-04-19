import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)

export default new VueRouter({
  mode: 'history',
  routes: [

    { path: '/',      component: require('./components/Top.vue') },
    { path: '/home',      component: require('./components/Home.vue') },
    { path: '/about', component: require('./components/About.vue') },

    { path: '/login', component: require('./components/Auth/Login.vue') },

    { path: '/articles',     component: require('./components/Articles/Index.vue') },
    { path: '/articles/new',     component: require('./components/Articles/New.vue') },
    { path: '/articles/:id', component: require('./components/Articles/Show.vue') },
    { path: '/articles/:id/edit', component: require('./components/Articles/Edit.vue') },

    { path: '*', component: require('./components/404.vue') },

  ],
  scrollBehavior (to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { x: 0, y: 0 }
    }
  },
})
