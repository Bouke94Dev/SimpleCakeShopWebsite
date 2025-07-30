<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { getImageUrl } from '@/utils/helper'
import { fetchProducts } from '@/services/productService'
import type { Product } from '@/types/product'

const products = ref<Product[]>([])


onMounted(async () => {
  products.value = await fetchProducts()
})
</script>

<template>
  <div>
    <h1> Products </h1>
    <ul>
        <li v-for="product in products" :key="product.id">
            <h2>{{ product.name }}</h2>
            <p> {{ product.description }}</p>
            <p> {{ product.price.toFixed(2) }}</p>
            <img :src="getImageUrl(product.product_image.image)" alt="Product Image" />
        </li>
    </ul>
  </div>
</template>
