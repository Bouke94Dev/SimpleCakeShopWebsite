import ProductsView from '@/views/ProductsView.vue';

import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  { path: '/', component: ProductsView }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

export default router
