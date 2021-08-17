<template>
  <div class="__leads">
    <h3 class="subheading mr-5 grey--text">Leads</h3>
    <v-divider></v-divider>
    <v-container fluid class="my-5 grey lighten-2">
      <v-layout
        class="pa-5"
        justify-center
        row
        wrap
        align-baseline
        align-content-center
      >
        <v-flex xs12 md1 class="mr-5">
          <v-text-field
            color="grey"
            label="Name"
            placeholder="Leads Name"
          ></v-text-field>
        </v-flex>
        <v-flex md1 class="mr-5">
          <v-text-field
            color="grey"
            label="Email"
            placeholder="Leads Email"
          ></v-text-field>
        </v-flex>
        <v-flex md1 class="mr-5">
          <v-text-field
            color="grey"
            label="Phone"
            placeholder="Leads Phone"
          ></v-text-field>
        </v-flex>
        <v-flex md1 class="mr-5">
          <Sourcemenu />
        </v-flex>
        <v-flex md1 class="mr-5">
          <Mediamenu />
        </v-flex>
        <v-flex md1 class="mr-5">
          <Statusmenu />
        </v-flex>
        <v-flex md2 class="ml-3">
          <v-btn type="submit" text color="black">
            <v-icon class="black--text">feed</v-icon>
            <span class="caption text-lowercase">Add New Source</span>
          </v-btn>
        </v-flex>
      </v-layout>

      <v-card flat class="mt-5">
        <v-layout
          justify-center
          row
          wrap
          class="pa-3"
          v-for="leads in allLeads"
          :key="leads.id"
        >
          <v-flex xs6 md4 class="mr-5 ml-5">
            <div class="caption grey--text">Leads Name</div>
            <div>{{ leads.leads_name }}</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Email</div>
            <div>{{ leads.leads_email }}</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Phone</div>
            <div>{{ leads.leads_phone }}</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Source</div>
            <div>{{ leads.source_name }}</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Media</div>
            <div>{{ leads.media_name }}</div>
          </v-flex>
          <v-flex xs3 sm2 md1>
            <div class="caption grey--text">Status</div>
            <div>{{ leads.status_name }}</div>
          </v-flex>
        </v-layout>
      </v-card>
      <v-divider></v-divider>
    </v-container>
  </div>
</template>

<script>
import { mapState, mapGetters, mapMutations, mapActions } from "vuex";
import Sourcemenu from "../SourceMenu.vue";
import Mediamenu from "../MediaMenu.vue";
import Statusmenu from "../StatusMenu.vue";

export default {
  components: {
    Sourcemenu,
    Mediamenu,
    Statusmenu,
  },
  data() {
    return {
      leadsDetail: [
        {
          leadsID: "",
          leadsName: "",
          leadsEmail: "",
          leadsPhone: "",
          leadsStatus: "",
          leadsSource: "",
          leadsMedia: "",
        },
      ],
    };
  },
  computed: {
    ...mapState({
      leads: (state) => state.leadsData.leadsData,
      status: (state) => state.statusData.statusData,
      source: (state) => state.sourceData.statusData,
      media: (state) => state.mediaData.statusData,
    }),
    ...mapGetters({
      allLeads: "leadsData/allLeads",
      allStatus: "statusData/allStatus",
      allSource: "sourceData/allSource",
      allMedia: "mediaData/allMedia",
    }),
    created() {
      this.getLeadsData(["getLeadsData"], ["addLeads"]);
      this.getStatusData(["getStatusData"], ["addStatus"]);
      this.getSourceData(["getSourceData"], ["addSource"]);
      this.getMediaData(["getMediaData"], ["addMedia"]);
    },
  },
  methods: {
    ...mapActions({
      getLeadsData: "leadsData/getLeadsData",
      getStatusData: "statusData/getStatusData",
      getSourceData: "sourceData/getSourceData",
      getMediaData: "mediaData/getMediaData",
    }),
    ...mapMutations({
      leadsData: "leadsData/newLeads",
      statusData: "stausData/newStatus",
      sourceData: "sourceData/newSource",
      mediaData: "mediaData/newMedia",
    }),
    addStatus() {
      this.$store.dispatch("leadsData/addLeads", this.leadsDetail);
    },
  },
};
</script>

<style scope>
.__leads {
  margin: 15px;
}
</style>