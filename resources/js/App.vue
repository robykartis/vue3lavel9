<template>
  <div class="container">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <a class="navbar-brand" href="#">Laravel Vue 3</a>
      <button
        class="navbar-toggler d-lg-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#collapsibleNavId"
        aria-controls="collapsibleNavId"
        aria-expanded="false"
        aria-label="Toggle navigation"
      ></button>
      <div class="navbar-nav" v-if="isLoggedIn">
        <router-link class="nav-item nav-link" to="/dashboard"
          >Dashboard</router-link
        >
        <a class="nav-item nav-link" @click="logout" href="/logout">Logout</a>
      </div>
      <div class="navbar-nav" v-else>
        <router-link class="nav-item nav-link" to="/">Home</router-link>
        <router-link class="nav-item nav-link" to="/login">Login</router-link>
        <router-link class="nav-item nav-link" to="/register"
          >Register</router-link
        >
      </div>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      isLoggedIn: false,
    };
  },
  created() {
    if (window.Laravel.isLoggedIn) {
      this.isLoggedIn = true;
    }
  },
  methods: {
    logout(e) {
      e.preventDefault();
      this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        this.$axios
          .post("/api/logout")
          .then((response) => {
            if (response.data.success) {
              window.location.href = "/";
            } else {
              console.log(response);
            }
          })
          .catch(function (error) {
            console.error(error);
          });
      });
    },
  },
};
</script>

<style>
</style>
