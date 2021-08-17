<template>
  <nav>
    <v-app-bar flat color="teal" dark>
      <span class="mr-5 ml-15">
        <v-app-bar-nav-icon
          app
          class="mr-5 ml-15"
          @click="drawer = !drawer"
        ></v-app-bar-nav-icon
      ></span>
      <v-toolbar-title>
        <span class="font-weight-light">Welcome</span>
        <span class="font-weight-bold">Heroteam-X</span>
        <v-avatar class="mr-5 ml-15" size="40">
          <img src="/images/logo.png" />
        </v-avatar>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <span class="font-weight-bold">Get Started</span>
      <v-btn icon class="ml-5 mr-15">
        <router-link to="/leads" class="white--text">
          <v-icon class="white--text">exit_to_app </v-icon>
        </router-link>
      </v-btn>
    </v-app-bar>
    <v-navigation-drawer app v-model="drawer" class="teal">
      <v-layout column align-center>
        <v-flex class="mt-15 mb-10 ml-10 mr-10">
          <v-avatar size="100">
            <img src="/images/logo.png" />
          </v-avatar>
        </v-flex>
      </v-layout>
      <v-divider></v-divider>
      <v-list v-for="link in links" :key="link.text">
        <router-link :to="link.route" class="transparent--text">
          <v-list-item link dark>
            <v-list-item-action>
              <v-icon>{{ link.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title class="font-weight-bold">
                {{ link.text }}</v-list-item-title
              >
            </v-list-item-content>
          </v-list-item>
        </router-link>
      </v-list>
    </v-navigation-drawer>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      links: [
        { icon: "home", text: "Home", route: "/", status: "exact" },
        { icon: "groups", text: "Leads", route: "/leads" },
        { icon: "source", text: "Source", route: "/source" },
        { icon: "laptop_windows", text: "Media", route: "/media" },
        { icon: "beenhere", text: "Status", route: "/status" },
      ],
    };
  },
};
</script>

<style>
.__listTitile {
  font-size: 16px;
  text-decoration: none;
}
</style>