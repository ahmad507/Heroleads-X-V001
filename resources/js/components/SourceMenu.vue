<template>
  <v-layout>
    <v-select
      v-model="selectedItems"
      label="Select Source"
      :items="items"
      item-text="firstName"
      chips
      clearable
      multiple
      return-object
    >
      <template v-slot:selection="data">
        <v-chip
          :key="JSON.stringify(data.item)"
          close
          class="chip--select-multi"
          @input="data.parent.selectItem(data.item)"
        >
          {{ data.item.firstName }} {{ data.item.lastName }}
        </v-chip>
      </template>
      <template v-slot:item="data">
        <v-list-tile-content>
          <v-list-tile-title>
            {{ data.item.firstName }} {{ data.item.lastName }}
          </v-list-tile-title>
        </v-list-tile-content>
      </template>
    </v-select>
  </v-layout>
</template>


<script>
export default {};
</script>

<style>
</style>