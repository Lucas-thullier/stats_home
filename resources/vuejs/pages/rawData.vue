<template>
  <h1>Artistes</h1>
  <section class="card-collection mt-3 container mx-auto">
    <template v-if="loadAuthor">
      <div class="card" v-for="author in authors" :key="author.author">
        <button id="show-modal" @click="openModal" :value="author.id">
          <img :src="author.image_url" />
          <div class="card-header">
            {{ author.name }}
          </div>
          <div class="card-body">
            {{ author.description }}
          </div>
        </button>
      </div>
    </template>
    <paginator :data="data" v-on:loadPage="getAuthors" />
  </section>

  <modal v-if="showModal" @close="showModal = false">
    <template v-slot:header> </template>
    <template v-slot:body>
      <h1>Here might be a page title</h1>
    </template>
  </modal>
</template>

<script>
import { defineAsyncComponent } from "@vue/runtime-core"
export default {
  name: "rawData",
  computed: {},
  data() {
    return {
      authors: [],
      data: {},
      loadAuthor: false,
      showModal: false,
      click: false,
    }
  },
  created() {
    this.getAuthors()
  },
  components: {
    modal: defineAsyncComponent(() => import("../components/modal.vue")),
    paginator: defineAsyncComponent(() =>
      import("../components/paginator.vue")
    ),
  },
  methods: {
    getAuthors(url = "/api/raw-data/artists/all") {
      axios
        .get(url)
        .then((response) => {
          this.loadAuthor = true
          this.authors = response.data.data
          this.data = response.data
        })
        .catch((error) => console.error(error))
    },
    // openModal(event) {
    //   this.showModal = true

    // const artistId = event.target.value
    // axios
    //   .get(`/api/raw-data/artists/${artistId}`)
    //   .then((response) => {
    //     console.log(response)
    //   })
    //   .catch((error) => console.error(error))
    // },
  },
  mounted() {
    console.log("Component mounted.")
  },
}
</script>
