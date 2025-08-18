<template>
  <div class="p-4 bg-white rounded text-center shadow mt-5">
    <h2 class="text-xl font-semibold mb-2">Reviews</h2>
    <div v-if="reviews.length === 0">No reviews available</div>
    <div v-for="review in reviews" :key="review.id" class="py-2">
      <StarRating :modelValue="review.rating" :readonly="true" />
      <p class="text-gray-700 mt-1">{{ review.comment }}</p>
      <small class="text-gray-500">by {{ review.user.name }}</small>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { fetchReviews } from '@/services/productService'
import StarRating from './StarRating.vue'
import type { Review } from '@/types/review'

type Props = {
  productId: number
}
const props = defineProps<Props>()

const reviews = ref<Review[]>([])

onMounted(async () => {
  reviews.value = await fetchReviews(props.productId)
})
</script>
