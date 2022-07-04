<template>
  <v-container>
    <v-card color="#f1f1f1">
      <v-card-title class="text-center justify-center py-6">
        <h1 class="font-weight-bold text-h3 basil--text">Dashboard</h1>
      </v-card-title>

      <v-tabs v-model="tab" background-color="transparent" color="basil" grow>
        <v-tab v-for="item in items" :key="item">
          {{ item }}
        </v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab">
        <v-tab-item v-for="item in items" :key="item">
          <v-card color="#fff" flat>
            <Read v-if="item=='READ'"/>
            <Insert v-if="item=='INSERT'"/>
            <Update v-if="item=='UPDATE'"/>
            <Delete v-if="item=='DELETE'"/>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-card>
  </v-container>
</template>
<script>
import Read from "../components/Read.vue";
import Insert from "../components/Insert.vue";
import Update from "../components/Update.vue";
import Delete from "../components/Delete.vue";
export default {
  components: {
    Read,
    Insert,
    Update,
    Delete
  },
  data() {
    return {
      tab: null,
      items: ["READ", "INSERT", "DELETE", "UPDATE"],      
    };
  },
};
</script>
<style>
/* Helper classes */
.basil {
  background-color: #fffbe6 !important;
}
.basil--text {
  color: #356859 !important;
}
</style>