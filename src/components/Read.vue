<template>
  <v-container>
    <v-row>
      <v-col cols="12" md="12 ">
        <v-card class="mx-auto" max-width="90%">
          <v-card-title>
            <h2>List of People in Database</h2>
          </v-card-title>

          <v-card-text>
            <ul class="list-group">
              <li
                class="list-group-item"
                v-for="person in getItems"
                :key="person.name"
              >
                <img
                  v-bind:src="person.fpath"
                  class="img-rounded"
                  alt="smiley"
                  height="30px"
                />
                {{ person.name }} {{ person.age }}
              </li>
            </ul>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>

    <div class="text-center">
      <v-pagination v-model="currentPage" :length="perPage" circle></v-pagination>
    </div>
  </v-container>
</template>

<script>
// import axios from 'axios';
export default {
  data() {
    return {
      perPage:3,
      currentPage:1,
      persons: []

    };
  },
  created: () => {
    // axios.get().then(()=>{})
    // .catch(()=>{})
    console.log("hi");
  },
};
</script>

<style>
</style>