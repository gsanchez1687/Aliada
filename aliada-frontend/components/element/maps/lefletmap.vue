<template>
    <div class="map">
        <client-only>
            <l-map ref="locationsMap" :min-zoom="leafletOptions.minZoom" :max-zoom="leafletOptions.maxZoom"
                :zoom-animation="true" :zoom="leafletOptions.zoom" :center="leafletOptions.center" :useGlobalLeaflet="false"
                :options="{ tap: false }">
                <l-tile-layer :url="leafletOptions.url" />
                <template v-for="(item, index) in All_Map_Data" :key="index">
                    <l-marker :lat-lng="[item.location_latitude, item.location_longitude]">
                        <div v-if="item.location_latitude && item.location_longitude">
                            <l-popup class="text-center flex flex-col gap-y-4">
                                <div class="infoBox">
                                    <div class="marker-detail">
                                        <img :src="item.map_image_url" alt="Image" />
                                        <div class="label label-shadow">{{ item.label }}</div>
                                        <div class="detail-part">
                                            <h6>{{ item.name_point }}</h6>
                                            <ul>
                                                <li>Recámaras : {{ item.bed }}</li>
                                                <li>Baños : {{ item.bath }}</li>
                                                <li>Área : {{ item.sqft }}</li>
                                            </ul>
                                            <span> {{ item.price }}</span>
                                            <nuxt-link to="javascript:void(0)"></nuxt-link>
                                        </div>
                                    </div>
                                </div>
                            </l-popup>
                            <l-icon>
                                <img src="/image/leaflet/marker-icon.png" />
                            </l-icon>
                        </div>
                    </l-marker>
                </template>
            </l-map>
        </client-only>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { LIcon, LMap, LMarker, LPopup, LTileLayer } from "@vue-leaflet/vue-leaflet";
import "leaflet/dist/leaflet.css";
interface MapOptions {
    name: string;
    location_latitude: number;
    location_longitude: number;
    map_image_url: string;
    name_point: string;
    price: string;
    label: string;
    bed: string;
    bath: string;
    sqft: string;
    title: string;
    url_point: string;
}
interface FetchResponse {
    data: {
        value: {
            map: MapOptions[]

        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/map.json')
let All_Map_Data: MapOptions[] = data.value.map
const leafletOptions = ref({
    url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
    minZoom: 5,
    maxZoom: 13,
    zoom: 13,
    map: null,
    center: [25.204500, 55.347245],
    bounds: null,
    overlayLocation: false,
    colors: ["#ED722E", "#F6BE00", "#979B0B", "#DA2C81"],
});
</script>

<style scoped></style>
