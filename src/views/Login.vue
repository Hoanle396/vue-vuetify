<template>
  <v-form v-model="valid">
    <v-container>
      <v-row class="d-flex justify-content-center mt-5">
        <v-col cols="12" md="5" class="border border-1 rounded shadow-lg">
          <span class="text-center text-dark fs-1 fw-bold pb-3">User Login</span>
          <v-text-field
            v-model="username"
            :rules="nameRules"
            :counter="10"
            label="User name"
            required
          ></v-text-field>
          <v-text-field
            v-model="password"
            :rules="PassRules"
            label="Pass word"
            required
          ></v-text-field>
          <v-btn
            :disabled="!valid"
            color="success"
            class="mr-4"
            @click="login()"
          >
            Login
          </v-btn>
          <v-btn color="error" class="mr-4" @click="reset"> Reset </v-btn>
         <p class="mt-3 text-danger">{{msg}}</p>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>
<script>
import axios from "axios";
export default {
  data: () => ({
    valid: true,
    username: "",
    nameRules: [
      (v) => !!v || "Username is required",
      (v) => v.length <= 10 || "Username must be less than 10 characters",
    ],
    password: "",
    PassRules: [
      (v) => !!v || "Password is required",
      (v) => v.length >= 8 || "Password must be more than 8 characters",
    ],
    msg: "",
  }),
  methods: {
    login() {
      axios.post("http://localhost:80/my-lab/server/api-user.php", JSON.stringify({
          username: this.username,
          password: this.password,
        }))
        .then((response) => {
          if (response.data == null) {
            this.msg = "username or password incorrect.";
          } else {
            this.$emit("authenticated", true);
            this.$router.replace({ name: "Dashboard" });
          }
        })
        .catch((error) => {
          this.msg = error.message;
        })
    },

    reset() {
      this.username = "";
      this.password = "";
      this.valid = false;
      this.msg = "";
    },
  },
};
</script>