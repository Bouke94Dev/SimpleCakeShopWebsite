import ProductDetailView from '@/views/ProductDetailView.vue';
import ProductsView from '@/views/ProductsView.vue';
import Login from '@/views/Login.vue';
import Register from '@/views/Register.vue';
import { createRouter, createWebHistory } from 'vue-router'
import { userStore } from '@/stores/userStore';

export const routes = [
  { path: '/', 
    name: 'home',
    component: ProductsView,
    meta: { showInNav: true, requiresAuth: false, icon: 'home'} 
  },
  {
    path: '/products/:id',
    name: 'productDetail',
    component: ProductDetailView,
    meta: { showInNav: false, requiresAuth: false} 
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: { showInNav: true, requiresAuth: false, icon: 'user'}, 
    beforeEnter: () => {
      const useUserStore = userStore()
      if (useUserStore.user) {
        return { name: 'home' }
      }
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: { showInNav: false, requiresAuth: false},
    beforeEnter: () => {
      const useUserStore = userStore()
      if (useUserStore.user) {
        return { name: 'home'}
      }
    }
  },
  {
    path: '/logout',
    name: 'logout',
    meta: { showInNav: true, requiresAuth: true},
    beforeEnter: async () => {
      const useUserStore = userStore()
      await useUserStore.logout()
      return { name: 'home' }
    }
  },

];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

// guard

router.beforeEach(async (to, from, next) => {
  const useUserStore = userStore()

  if (!useUserStore.initialized) {
    await useUserStore.fetchUser()
  }
  if (to.meta.requiresAuth && ! useUserStore.user) {
    next( { name: 'login'})
  } else {
    next()
  }

})


export default router
