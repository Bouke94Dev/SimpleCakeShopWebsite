<template>
<Header></Header> 
<main>
  <div class="bg-white">
     <router-View /> 
  </div>
</main>
<Footer></Footer>
</template>

<!-- shorthand for export default composition api -->
<script setup>
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
</script>


<style>

</style>