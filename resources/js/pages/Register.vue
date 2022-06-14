<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div
          v-if="error !== null"
          class="alert alert-danger alert-dismissible fade show"
          role="alet"
        >
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
          ></button>
          <strong>{{ error }}</strong>
        </div>
        <div class="card card-default">
          <div class="card-header">
            <h5>Register New User</h5>
            <div class="card-body">
              <form action="">
                <div class="form-grup row">
                  <label
                    for="name"
                    class="col-sm-4 col-form-label text-md-right"
                    >Enter Name</label
                  >
                  <div class="col-md-8">
                    <input
                      type="text"
                      id="name"
                      class="form-control"
                      v-model="name"
                      required
                      autofocus
                      autocomplete="off"
                      placeholder="Enter Your Name"
                    />
                  </div>
                </div>

                <div class="form-grup row mt-1">
                  <label
                    for="email"
                    class="col-sm-4 col-form-label text-md-right"
                    >E-mail Address</label
                  >
                  <div class="col-md-8">
                    <input
                      type="email"
                      id="email"
                      class="form-control"
                      v-model="email"
                      required
                      autofocus
                      autocomplete="off"
                      placeholder="Enter Your Email"
                    />
                  </div>
                </div>
                <div class="form-group row mt-1">
                  <label
                    for="password"
                    class="col-sm-4 col-form-label text-md-right"
                    >Enter Password</label
                  >
                  <div class="col-md-8">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      v-model="password"
                      required
                      autofocus
                      autocomplete="off"
                      placeholder="Enter Your Password"
                    />
                  </div>
                  <div class="form-grup row mt-1 mb-0">
                    <div class="col-md-8 offset-md-4">
                      <button
                        type="submit"
                        class="btn btn-success"
                        @click="handleSubmit"
                      >
                        Register
                      </button>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-8 offset-md-4">
                      <small class="text-muted">
                        Have an Account? Please
                        <router-link to="/login">Login</router-link>
                      </small>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      error: null,
    };
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      if (this.password.length > 0) {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
          this.$axios
            .post("api/register", {
              name: this.name,
              email: this.email,
              password: this.password,
            })
            .then((response) => {
              if (response.data.success) {
                this.$router.go("/login");
              } else {
                this.error = response.data.message;
              }
            })
            .catch(function (error) {
              console.log(error);
            });
        });
      }
    },
  },
  beforeRouteEnter(to, from, next) {
    if (window.Laravel.isLoggedIn) {
      return next("dashboard");
    }
    next();
  },
};
</script>

<style>
</style>
