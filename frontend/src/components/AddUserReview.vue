<template>
  <div class="flex items-center justify-center mt-5">
    <div class="p-4 bg-white rounded shadow w-full max-w-lg">
      <h2 class="text-xl font-semibold mb-2 text-center">Write a review</h2>
      <StarRating v-model="rating" class="mb-3" />
      <textarea
        v-model="comment"
        class="w-full border rounded p-2 mt-3"
        placeholder="Schrijf je ervaring..."
      ></textarea>
      <button
        class="bg-amber-500 text-white rounded px-4 py-2 mt-3 w-full"
        @click="submitReview"
      >
        Send
      </button>
    </div>
  </div>
</template>


<script setup lang="ts">
import { ref } from 'vue'
import { addReview } from '@/services/productService'
import StarRating from './StarRating.vue'
import type { ReviewCreate } from '@/types/review'

type Props = {
  productId: number
}
const props = defineProps<Props>()

const rating = ref<number>(0)
const comment = ref<string>('')

async function submitReview() {
  if (!rating.value) return alert("please select star for rating")

  const payload: ReviewCreate = {
    product_id: props.productId,
    rating: rating.value,
    comment: comment.value
  }

  await addReview(payload)

  rating.value = 0
  comment.value = ''
}
</script>
