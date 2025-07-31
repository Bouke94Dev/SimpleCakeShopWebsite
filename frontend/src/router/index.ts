import ProductDetailView from '@/views/ProductDetailView.vue';
import ProductsView from '@/views/ProductsView.vue';

import { createRouter, createWebHistory } from 'vue-router'

export const routes = [
  { path: '/', 
    name: 'home',
    component: ProductsView,
    meta: { showInNav: true} 
  },
  {
    path: '/products/:id',
    name: 'productDetail',
    component: ProductDetailView,
  }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

export default router
