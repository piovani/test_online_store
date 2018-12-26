import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/app/Home/Home'
import 'vuetify/dist/vuetify.min.css'
import Login from '@/app/Login/Login'
import Admin from '@/app/Admin/Admin'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/home',
      name: 'Home',
      component: Home
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/admin',
      name: 'Admin',
      component: Admin
    }
  ]
})
