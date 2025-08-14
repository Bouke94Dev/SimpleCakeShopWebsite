<template>
    <header class= "bg-white py-5 px-5 text-slate-400 font-medium shadow-xl">
        <div class="flex justify-center w-full">
            <div class="mx-4 text-blue-300"> Welcome, {{ useUserStore.user?.name }}</div>
            <div class="mx-4 text-teal-400">Cake Shop</div>
            <div class="mx-4 flex">
                <nav v-for="route in navRoutes" :key="route.name" >
                    <router-link
                    v-if="
                    (!route.meta.requiresAuth || (route.meta.requiresAuth && useUserStore.user)) &&
                    !(useUserStore.user && ['login'].includes(route.name))
                    "
                    :to="route.path"
                    class="mr-4 hover:text-teal-400"
                    >
                    <font-awesome-icon v-if="route.meta.icon" :icon="route.meta.icon" />
                    <span> {{ route.name }} </span>
                    </router-link>
                </nav>
            </div>
        </div>
    </header>
</template>

<script setup lang="ts">
    import { routes } from '@/router'
    import { userStore } from '@/stores/userStore' 
    import { computed } from 'vue'

    const navRoutes = computed(() => routes.filter(route => route.meta?.showInNav))
    const useUserStore = userStore()  // <-- init store

</script>


