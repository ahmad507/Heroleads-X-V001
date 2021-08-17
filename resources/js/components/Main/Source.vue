<template>
  <div class="__media">
    <h3 class="subheading mr-5 grey--text">Source</h3>
    <v-divider></v-divider>
    <v-container class="my-5">
      <v-layout class="pa-5" row wrap align-baseline align-content-space-around>
        <v-flex md2>
          <v-text-field
            v-model="source_name"
            color="grey"
            label="Media"
            placeholder="Media Name"
          ></v-text-field>
        </v-flex>
        <v-flex md2 class="ml-3">
          <v-btn type="submit" @click="addSource" text color="grey">
            <v-icon class="black--text">feed</v-icon>
            <span class="caption text-lowercase">Add New Source</span>
          </v-btn>
        </v-flex>
      </v-layout>

      <v-card flat class="mt-5">
        <v-layout
          row
          wrap
          class="pa-3"
          v-for="source in allSource"
          :key="source.id"
        >
          <v-flex xs3 md4 class="mr-5 ml-5">
            <div class="caption grey--text">Sour for media engagement</div>
            <div>{{ source.source_name }}</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Total Leads</div>
            <div>120</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Interest</div>
            <div>120</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Relevent</div>
            <div>120</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Valid</div>
            <div>120</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Negative Leads</div>
            <div>120</div>
          </v-flex>
        </v-layout>
      </v-card>
    </v-container>
  </div>
</template>

<script>
import { mapState, mapGetters, mapMutations, mapActions } from "vuex";
export default {
  data() {
    return {
      source_name: "",
    };
  },
  computed: {
    ...mapState(["sourceData"]),
    ...mapGetters("sourceData", ["allSource"]),
    created() {
      this.getSourceData(["getSourceData"], ["addSource"]);
    },
  },
  methods: {
    ...mapActions("sourceData", ["getSourceData"]),
    ...mapMutations("sourceData", ["newSource"]),
    addSource() {
      this.$store.dispatch("sourceData/addSource", this.source_name);
    },
  },
};
</script>

<style scope>
.__media {
  margin: 15px;
}
</style>