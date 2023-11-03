import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/homePage',
    name: 'homePage',
    component: () => import('../views/HomeView.vue')
  },
  {
    path: '/detailPage',
    name: 'detailPage',
    component: () => import('../views/DetailView.vue')
  }
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
