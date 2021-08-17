<template>
  <div class="__status">
    <h3 class="subheading mr-5 grey--text">Status</h3>
    <v-divider></v-divider>
    <v-container class="my-5">
      <v-layout class="pa-5" row wrap align-baseline align-content-space-around>
        <v-flex md2>
          <v-text-field
            v-model="status_name"
            color="grey"
            label="status"
            placeholder="status Name"
          ></v-text-field>
        </v-flex>
        <v-flex md2 class="ml-3">
          <v-btn type="submit" @click="addStatus" text color="grey">
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
          v-for="status in allStatus"
          :key="status.id"
        >
          <v-flex xs3 md4 class="mr-5 ml-5">
            <div class="caption grey--text">Sour for status engagement</div>
            <div>{{ status.status_name }}</div>
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
      status_name: "",
    };
  },
  computed: {
    ...mapState(["statusData"]),
    ...mapGetters("statusData", ["allStatus"]),
    created() {
      this.getStatusData(["getStatusData"], ["addStatus"]);
    },
  },
  methods: {
    ...mapActions("statusData", ["getStatusData"]),
    ...mapMutations("statusData", ["newStatus"]),
    addStatus() {
      this.$store.dispatch("statusData/addStatus", this.status_name);
    },
  },
};
</script>

<style scope>
.__status {
  margin: 15px;
}
</style>