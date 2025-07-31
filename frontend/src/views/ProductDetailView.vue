<template>

    <div class="grid grid-flow-col grid-rows-2 gap-4 max-w-6xl mx-auto  py-5 px-5 text-slate-500 text-left shadow-xl ">
        <div class="bg-white row-span-3 mx-auto">
            <img :src="getImageUrl(product?.product_image.image)" class="w-162 h-96 mx-auto rounded object-cover" alt="Product Image" />
        </div>
<div class="bg-white col-span-4 row-span-3 flex items-center justify-center">
  <div class="text-center">
    <h1 class="font-bold mb-2">{{ product?.name }}</h1>
    <p class="mb-4">{{ product?.description }}</p>

    <div class="flex justify-between items-center gap-4">
      <p class="text-amber-600 font-semibold ml-auto mr-1">€ {{ product?.price.toFixed(2) }}</p>
      <button class="shadow-xl rounded bg-amber-200 w-32 py-2 px-5 cursor-pointer hover:underline">
        Buy
      </button>
    </div>
  </div>
</div>

    </div>
</template>

<script setup lang="ts">

import {ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { getImageUrl } from '@/utils/helper'
import { fetchProduct } from '@/services/productService';
import type { Product } from '@/types/product';

const product = ref<Product>()
const route = useRoute()

onMounted(async() => {
    const id = route.params.id as string
    product.value = await fetchProduct(id)
});

</script>