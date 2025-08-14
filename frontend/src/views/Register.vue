<template>
  <div class="flex justify-center items-center mt-4">
    <div class="w-full max-w-2xl bg-white p-8 rounded-2xl shadow-xl">
      <v-lazy-image 
        class="w-128 h-64 mx-auto rounded-2xl rounded-tl-none rounded-tr-none object-cover " 
        :src="getImageUrl('cake_register.jpg', false)"
        :src-placeholder="getImageUrl('cake_register.jpg', true)" 
        alt="Register Image" 
  />
      <form @submit.prevent="submitForm" class="flex flex-col gap-4">
        <h1 class="text-slate-500 text-4xl text-center mt-4"> Register</h1>
        <div class="flex flex-col">
          <label for="name" class="text-black mb-1">Name</label>
          <input id="name" type="text" v-model="name" name="name" class="px-4 py-2 border rounded focus:outline-none focus:ring" required></input>
        </div>
        <div class="flex flex-col">
          <label for="email" class="text-black mb-1">Email</label>
          <input id="email" type="email" v-model="email" name="email" class="px-4 py-2 border rounded focus:outline-none focus:ring" required />
        </div>
        <div class="flex flex-col">
          <label for="password" class="text-black mb-1">Password</label>
          <input id="password" type="password"v-model="password" name="password" class="px-4 py-2 border rounded focus:outline-none focus:ring" required />
        </div>
        <div class="flex flex-col">
          <button type="submit" class="px-4 py-2 border rounded focus:outline-none focus:ring cursor-pointer bg-slate-500 text-white">Register</button>
        </div>
          <router-link :to="{ name: 'login'}" class="text-center text-teal-500 hover:underline">
            Already have an account? Login here!
          </router-link>
          <p v-if="formErrors" class="text-red-500 text-sm">{{ formErrors }}</p>
      </form>
    </div>
  </div>
</template>


<script setup lang="ts">
import { ref } from 'vue'
import { register } from '@/services/productService';
import { useRouter } from 'vue-router'
import VLazyImage from 'v-lazy-image';
import { getImageUrl } from '@/utils/helper'

const router = useRouter()

const name = ref('')
const email = ref('')
const password = ref('')
const formErrors = ref<string | null>(null)

async function submitForm() {
  try {
    await register({ name: name.value, email: email.value, password: password.value })
    router.push({name: 'home'})
  } catch (error: any) {
    formErrors.value = error.response?.data?.message ?? 'Registration failed.'
  }
}

</script>
