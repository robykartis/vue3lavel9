<template>
  <div class="card">
    <img class="card-img-top" alt="" />
    <div class="card-body">
      <h4 class="card-title">{{ title }}</h4>
      <p class="card-text">{{ version }}</p>
    </div>
  </div>
</template>

<script>
export default {
  setup: () => ({
    title: "Helllo Vue From Laravel 9",
    version: Version,
  }),
};
</script>

<style>
</style>
