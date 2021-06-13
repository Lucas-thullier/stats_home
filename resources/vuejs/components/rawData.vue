<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 d-flex flex-row">
        <template v-if="loadAuthor">
          <div class="card" v-for="author in authors" :key="author.author">
            <div class="card-header">
              {{ author.author }}
            </div>
            <div class="card-body">I'm an example component.</div>
          </div>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {},
  data() {
    return {
      authors: [],
      loadAuthor: false,
    }
  },
  created() {
    this.getAuthors()
  },
  methods: {
    getAuthors() {
      this.loadAuthor = true
      axios
        .get("http://localhost:8000/api/raw-data/artists/all")
        .then((response) => {
          console.log(response)
          this.authors = response.data
        })
        .catch((error) => console.error(error))
    },
  },
  mounted() {
    console.log("Component mounted.")
  },
}
</script>
