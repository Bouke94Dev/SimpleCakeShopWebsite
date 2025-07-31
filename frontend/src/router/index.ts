import ProductDetailView from '@/views/ProductDetailView.vue';
import ProductsView from '@/views/ProductsView.vue';
import Login from '@/views/Login.vue';

import { createRouter, createWebHistory } from 'vue-router'

export const routes = [
  { path: '/', 
    name: 'home',
    component: ProductsView,
    meta: { showInNav: true, icon: 'home'} 
  },
  {
    path: '/products/:id',
    name: 'productDetail',
    component: ProductDetailView,
    meta: { showInNav: false} 
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: { showInNav: true, icon: 'user'} 
  }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

export default router
