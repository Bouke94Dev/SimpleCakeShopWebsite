<template>
    <header class= "bg-white py-5 px-5 text-slate-400 font-medium shadow-xl">
        <div class="flex justify-center w-full">
            <div class="mx-4 text-teal-400">Cake Shop</div>
            <div class="mx-4 flex">
                <nav>
                    <router-link
                    v-for="route in navRoutes"
                    :key="route.path"
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
    const navRoutes = routes.filter(route => route.meta?.showInNav)
</script>


