<template>
  <h1>Artistes</h1>
  <section class="card-collection mt-3 container mx-auto">
    <template v-if="loadAuthor">
      <div class="card" v-for="author in authors" :key="author.author">
        <img :src="author.image_url" />
        <div class="card-header">
          <button id="show-modal" @click="openModal" :value="author.id">
            {{ author.name }}
          </button>
        </div>
        <div class="card-body">
          {{ author.description }}
        </div>
      </div>
    </template>
    <paginator :data="data" v-on:loadPage="getAuthors" />
  </section>

  <modal v-if="showModal" @close="showModal = false">
    <template v-slot:header>
      <img :src="artist.image_url" />
      <span>{{ artist.name }}</span>
    </template>
    <template v-slot:body>
      <span>{{ artist.description }}</span>
      <h2>Morceaux</h2>
      <ul>
        <li v-for="lyrics in artist.raw_lyrics" :key="lyrics.id">
          {{ lyrics.title }}
        </li>
      </ul>
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
      artist: {},
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
    openModal(event) {
      this.showModal = true

      const artistId = event.target.value
      axios
        .get(`/api/raw-data/artists/${artistId}`)
        .then((response) => {
          this.artist = response.data[0]
          console.log(response.data)
        })
        .catch((error) => console.error(error))
    },
  },
  mounted() {
    console.log("Component mounted.")
  },
}
</script>
