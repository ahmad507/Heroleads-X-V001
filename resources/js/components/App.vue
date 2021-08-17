<template>
  <v-app>
    <v-main class="grey lighten-5">
      <Navbar />
      <router-view> </router-view>
    </v-main>
  </v-app>
</template>

<script>
import Navbar from "./Navbar.vue";
export default {
  components: {
    Navbar,
  },
};
</script>

<style>
</style>