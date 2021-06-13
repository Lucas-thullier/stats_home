require("./bootstrap")

import { createRouter, createWebHistory } from "vue-router"
import { createApp } from "vue/dist/vue.esm-bundler.js"
import App from "../vuejs/App"
import routes from "../vuejs/router/routes"

const router = createRouter({
  history: createWebHistory(),
  routes,
})

const app = createApp(App)
app.use(router)
app.mount("#app")
