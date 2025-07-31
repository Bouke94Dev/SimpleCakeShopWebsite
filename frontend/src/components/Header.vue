<template>
    <header class= "bg-white py-5 px-5 text-slate-400 font-medium shadow-xl hover:text-teal-400">
        <div class="flex justify-center w-full">
            <div class="mx-4 text-slate-500">Cake Shop</div>
            <div class="mx-4">
                <nav>
                    <router-link
                    v-for="route in navRoutes"
                    :key="route.path"
                    :to="route.path"
                    >
                     {{ route.name }}
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


