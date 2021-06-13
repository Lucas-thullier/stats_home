<template>
  <navbar />
  <router-view></router-view>
  <div>cc</div>
</template>

<script>
import { defineAsyncComponent } from "@vue/runtime-core"
export default {
  name: "app",
  components: {
    Navbar: defineAsyncComponent(() => import("./components/navbar")),
  },
}
</script>
