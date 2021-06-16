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
    <template v-slot:modal-content>
      <div class="modal-container grid grid-cols-2">
        <div class="modal-body grid grid-cols-2 auto-rows-max h-inherit">
          <span class="text-center row-span-0 col-span-0 col-span-2">{{
            artist.name
          }}</span>
          <img
            class="h-64 m-w-20 object-contain row-span-1 col-span-0"
            :src="artist.image_url"
          />
          <p
            class="
              text-justify
              px-5
              max-h-60
              overflow-y-hidden overflow-ellipsis
              row-span-1
              col-span-1
            "
          >
            {{ artist.description }}
          </p>
          <div
            style="max-height: 30.5rem"
            class="
              modal-lyrics
              max-h-64
              overflow-y-auto
              col-span-0 col-span-2
              border-l-2
              pl-3
            "
          >
            <h2>Morceaux</h2>
            <ul>
              <li
                v-for="lyrics in artist.raw_lyrics"
                :key="lyrics.id"
                v-on:click="renderLyrics(event, lyrics.lyrics)"
              >
                {{ lyrics.title }}
              </li>
            </ul>
          </div>
        </div>
        <p id="lyrics" class="border-t-8 overflow-y-auto whitespace-pre-line">
          <!-- renderLyrics() -->
        </p>
      </div>
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
        })
        .catch((error) => console.error(error))
    },
    renderLyrics(event, lyrics) {
      document.querySelector("#lyrics").innerHTML = lyrics
      // console.log(lyrics)
    },
  },
  mounted() {
    console.log("Component mounted.")
  },
}
</script>
