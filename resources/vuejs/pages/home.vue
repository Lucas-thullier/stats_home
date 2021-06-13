<template>
  <div class="home bg-dark">
    <img class="logo" width="100" src="#" alt="sssssss" />
    <h1>
      {{ count }}
    </h1>
  </div>
</template>

<script>
export default {
  name: "home",
  props: {
    count: 0,
  },
}
</script>

<style lang="scss"></style>
