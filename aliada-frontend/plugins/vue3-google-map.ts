import { GoogleMap } from "vue3-google-map";
export default defineNuxtPlugin((nuxtApp) => {
  nuxtApp.vueApp.use(GoogleMap)
  nuxtApp.vueApp.component('GoogleMap', GoogleMap)

  return {
    provide: {
      GoogleMap
    },
  }
})