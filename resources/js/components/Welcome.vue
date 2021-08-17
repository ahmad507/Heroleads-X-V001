<template>
  <v-container app class="grey lighten-4 my-15">
    <v-layout col wrap>
      <Body />
    </v-layout>
  </v-container>
</template>

<script>
import Body from "./Body.vue";
import Navbar from "./Navbar.vue";
export default {
  components: {
    Body,
    Navbar,
  },
};
</script>

<style>
</style>