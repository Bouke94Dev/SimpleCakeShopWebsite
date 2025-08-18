<template>
  <div class="text-center">
    <div class="inline-flex space-x-1 cursor-pointer">
      <span
        v-for="star in max"
        :key="star"
        class="text-2xl"
        :class="star <= rating ? 'text-yellow-400' : 'text-gray-200'"
        @click="setRating(star)"
      >
        ★  
      </span>
    </div>
  </div>
</template>


<script setup lang="ts">
import { ref, watch, defineProps, defineEmits } from 'vue'

const props = defineProps<{
  modelValue: number
  max?: number
  readonly?: boolean
}>()

const emit = defineEmits(['update:modelValue'])

const rating = ref(props.modelValue)
const max = props.max ?? 5

watch(() => props.modelValue, (val) => {
    rating.value = val
})

function setRating(star: number) {
    if (props.readonly) return
    rating.value = star
    emit('update:modelValue', star)
}

</script>