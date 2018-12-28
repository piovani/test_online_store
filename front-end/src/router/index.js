import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/app/Home/Home'
import 'vuetify/dist/vuetify.min.css'
import Login from '@/app/Login/Login'
import AdminProductList from '@/app/Admin/Products/ProductList'
import AdminProductForm from '@/app/Admin/Products/ProductForm'
import Preview from "@/app/Admin/Products/Preview/Preview";
import VueSweetalert2 from 'vue-sweetalert2'

Vue.use(Router)
Vue.use(VueSweetalert2)

export default new Router({
  routes: [
    {
      path: "/",
      name: "Home",
      component: Home
    },
    {
      path: "/login",
      name: "Login",
      component: Login
    },
    {
      path: "/admin/productList",
      name: "AdminProductList",
      component: AdminProductList
    },
    {
      path: "/admin/ProductForm",
      name: "AdminProductForm",
      component: AdminProductForm
    },
    {
      path: "/admin/ProductForm/:id",
      name: "AdminProductForm",
      component: AdminProductForm
    },
    {
      path: "/preview/:id",
      name: "Preview",
      component: Preview
    }
  ]
});
