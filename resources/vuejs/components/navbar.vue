<template>
  <nav class="navbar bg-gray-200">
    <ul class="flex flex-row justify-end">
      <li class="mx-2">
        <router-link :to="{ name: 'home' }">Home</router-link>
      </li>
      <li class="mx-2">
        <router-link :to="{ name: 'rawData' }">Data</router-link>
      </li>
      <li class="mx-2">
        <router-link :to="{ name: 'about' }">About</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "navbar",
}
</script>
