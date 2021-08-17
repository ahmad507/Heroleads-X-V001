<template>
  <v-container app class="grey lighten-4 my-15">
    <v-layout col wrap>
      <v-flex sm8 md6 lg4 v-for="tag in tags" :key="tag.title">
        <v-card flat class="text-xs-center ma-10">
          <v-responsive class="pt-4">
            <v-img :src="tag.picture" aspect-ratio="2" height="300px"></v-img>
          </v-responsive>
          <v-card-text>
            <div class="font-weight-bold grey--text">
              {{ tag.title }}
            </div>
            <v-divider></v-divider>
            <div class="subheading">{{ tag.subtitle }}</div>
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      tags: [
        {
          title: "Team Works",
          subtitle: "The Dream Team is Never Changes -Jose Mourinho",
          picture: "/images/team_work_01.png",
        },
        {
          title: "Creative",
          subtitle: "Creativity is intelligence having fun -Rowan Atkinson",
          picture: "/images/team_work_02.png",
        },
        {
          title: "Inovative",
          subtitle: "I want to put a ding in the universe –Steve Jobs",
          picture: "/images/team_work_03.png",
        },
      ],
    };
  },
};
</script>

<style>
.__container {
  position: absolute;
  top: 50%;
  left: 50%;
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}
</style>