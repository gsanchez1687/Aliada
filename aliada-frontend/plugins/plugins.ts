import { defineNuxtPlugin } from '#app';

import VueEasyLightbox from 'vue-easy-lightbox';
import "vue-simple-range-slider/css";
import VueSimpleRangeSlider from "vue-simple-range-slider";
import "vue-simple-range-slider/css";
import {
    LIcon,
    LMap,
    LMarker,
    LPopup,
    LTileLayer,
  } from "@vue-leaflet/vue-leaflet";
  import L from "leaflet";
import DropZone from 'dropzone-vue';
import 'dropzone-vue/dist/dropzone-vue.common.css';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import Vue3FormWizard from 'vue3-form-wizard'
import 'vue3-form-wizard/dist/style.css'
export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.component('VueEasyLightbox',VueEasyLightbox);
    nuxtApp.vueApp.component('VueSimpleRangeSlider',VueSimpleRangeSlider)
    nuxtApp.vueApp.component("LMap", LMap);
    nuxtApp.vueApp.component("LTileLayer", LTileLayer);
    nuxtApp.vueApp.component("LMarker", LMarker);
    nuxtApp.vueApp.component("LIcon", LIcon);
    nuxtApp.vueApp.component("LPopup", LPopup);
    nuxtApp.vueApp.use(DropZone)
    nuxtApp.vueApp.component("vue-date-picker", VueDatePicker);
    nuxtApp.vueApp.use(Vue3FormWizard);
    return{
        provide:{
            L
        }
    }
})
