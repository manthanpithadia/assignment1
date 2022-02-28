import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import contactUs from '../views/Contact.vue'
import About from '../views/About.vue'
import login from '../views/Login.vue'
import productDetails from '../views/productDetails.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/contact/:id',
    name:'Contact',
    component:contactUs,
  },
  {
    path: '/contact',
    name: 'Contact',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: contactUs
  },
  {
    path: '/login',
    name: 'Login',
    component: login
  },
  {
    path: '/about',
    name: 'About',
    component: About,
  },
  {
    path: '/productDetails',
    name: 'ProductDetails',
    component: productDetails,
  },

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
