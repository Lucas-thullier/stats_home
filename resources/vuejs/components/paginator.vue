<template>
  <div class="paginator flex flex-row">
    <button
      class="paginator-element px-2 bg-gray-200"
      v-for="link in data.links"
      :key="link.id"
      v-on:click="$emit('loadPage', link.url)"
    >
      {{ link.label }}
      <!-- <a :href="link.url"> {{ link.label }}</a> -->
    </button>
  </div>
</template>

<script>
export default {
  name: "paginator",
  emits: ["loadPage"],
  props: ["data"],
  computed: {},
  data() {
    return {}
  },
  created() {},
  components: {},
  methods: {},
  mounted() {},
}
</script>
