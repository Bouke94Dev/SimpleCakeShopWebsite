<template>
  <div class="bg-white">
    <h1 class=" py-2 text-center px-2 text-4xl text-slate-500"> Products </h1>
    <div class="grid grid-cols-3 gap-4 px-4 py-4 max-w-6xl mx-auto text-slate-500 text-left ">
      <div v-for="product in products" :key="product.id">
          <div class="bg-white shadow-xl py-4 rounded col-span-3 col-start-3">
              <router-link :to="{ name: 'productDetail', params: { id: product.id } }">
              <v-lazy-image 
                  class="w-162 h-96 mx-auto rounded object-cover" 
                  :src="getImageUrl(product?.product_image.image, false)"
                  :src-placeholder="getImageUrl(product?.product_image.image, true)" 
                  alt="Product Image" 
              />
              </router-link>
              <div class="flex items-center px-1 py-1">
                  <h1 class="flex-1 px-1 py-1 font-bold">{{ product?.name }}</h1>
                  <p class="px-1 py-1 text-amber-600 font-semibold"> € {{ product?.price.toFixed(2) }}</p>
              </div>
              <div class="flex justify-end mr-2">
                <button class="shadow-xl rounded bg-amber-200 w-32 py-2 px-5 cursor-pointer hover:underline">Buy</button>
              </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { getImageUrl } from '@/utils/helper'
import { fetchProducts } from '@/services/productService'
import type { Product } from '@/types/product'
import VLazyImage from 'v-lazy-image';

const products = ref<Product[]>([])

onMounted(async () => {
  products.value = await fetchProducts()
})
</script>