export default [
  {
    path: "/raw-data", // inversion temporaire
    component: () => import("../pages/home.vue"),
    name: "home",
  },
  {
    path: "/about",
    component: () => import("../pages/about.vue"),
    name: "about",
  },
  {
    path: "/",
    component: () => import("../pages/rawData.vue"),
    name: "rawData",
  },
]
