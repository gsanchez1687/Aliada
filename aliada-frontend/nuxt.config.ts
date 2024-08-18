
export default defineNuxtConfig({
  runtimeConfig: {
    public: {
      baseURL: process.env.BACKEND_URL ||"http://127.0.0.1:8000",
      GOOGLE_MAPS_API_KEY: process.env.GOOGLE_MAPS_API_KEY,
    },
  },
  app: {
    head: {
      link: [
        { rel: "icon", type: "image/png", href: "/favicon.png" },
        {
          rel: "stylesheet",
          href: "https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i",
        },
        {
          rel: "stylesheet",
          href: "https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&display=swap",
        },
        {
          rel: "stylesheet",
          href: "https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i",
        },
      ],
      titleTemplate: "Aliada | %s",
      htmlAttrs: {
        lang: "es",
      },
      meta: [
        { charset: "utf-8" },
        { name: "viewport", content: "width=device-width, initial-scale=1" },
        {
          hid: "description",
          name: "description",
          content: "Aliada",
        },
        { name: "format-detection", content: "telephone=no" },
        { hid: "keywords", name: "keywords", content: "keywords," },
      ],
    },
  },

  css: ["~/assets/scss/app.scss"],
  ssr: false,
  target: "static",
 
  script: [
    {
      src: "/bootstrap.bundle.min.js",
    },
  ],
  alias: {
    pinia: "/node_modules/@pinia/nuxt/node_modules/pinia/dist/pinia.mjs",
  },
  modules: ["nuxt-icon", "@pinia/nuxt", "nuxt-mapbox"],
  pinia: {
    autoImports: ["defineStore", ["defineStore", "definePiniaStore"]],
  },

  plugins: [
    {
      src: "~/plugins/plugins.ts",
      mode: "client",
    },
    {
      src: "~/plugins/usebootstrap.client.ts",
      mode: "client",
    },
    {
      src: "~/plugins/vue-masonry-wall.ts",
      mode: "client",
    },
    {
      src: "~/plugins/vue3-google-map",
      mode: "client",
    },  
  ],
});
