<template>
  <GoogleMap api-key="AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw" style="width: 100%; height: 100%" class="map"
    :center="center" :zoom="12">
    <Marker v-for="(item, index) in location" :key="index" :options="{ position: item }" />
  </GoogleMap>
</template>

<script setup lang="ts">
import { GoogleMap, Marker } from "vue3-google-map";

const center = { lat: 25.229721, lng: 55.338229 };
let location = [
  { lat: 25.186426, lng: 55.346465 },
  { lat: 25.222578, lng: 55.319011 },
  { lat: 25.209843, lng: 55.293616 },
  { lat: 25.269995, lng: 55.368800 }
]
</script>

<style scoped></style>