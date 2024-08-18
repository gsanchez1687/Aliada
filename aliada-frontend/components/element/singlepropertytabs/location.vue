<template>
  <div class="tab-pane fade page-section" id="location-map">
    <h4 class="content-title">Ubicación</h4>
    <div>
      <GoogleMap
            :api-key="config.public.GOOGLE_MAPS_API_KEY"
            style="width: 100%; height: 600px"
            :center="center"
            :zoom="15"
          >
            <CustomMarker :options="{
                  position: center,
                  anchorPoint: 'BOTTOM_CENTER'
                }">
                   <div style="text-align: center">
                  <div class="price-preview-text">${{ formatNumber(props.property.price) }}</div>
                  <img
                    src="/image/others/aliada_map_marker.webp"
                    width="50"
                    height="50"
                    style="margin-top: 8px"
                  />
                </div>

            </CustomMarker>
               <Marker
                :options="{
                  position: {
                    lat: parseFloat(props.property.coordinates_x),
                    lng: parseFloat(props.property.coordinates_y),
                  },
                }"
              >
                <InfoWindow style="width:200px !important">
                  <div v-if="props.property.images && props.property.images[0]">
                    <img
                      :src="
                        config.public.baseURL +
                        '/storage/' +
                        props.property.images[0].url
                      "
                      width="100%"
                    />
                  </div>
                  <div class="price-tooltip-title">
                    <hls>$ {{ formatNumber(props.property.price) }}</hls>
                  </div>
                  <div class="tooltop-info">
                    <span>{{ props.property.rooms }} Recámaras</span> |
                    <span>{{ props.property.bathroom }} Baño</span> |
                    <span>{{ props.property.square_meters }} m<sup>2</sup></span>
                  </div>
                  <div class="tooltip-address">
                    {{ props.property.address }}
                  </div>
                </InfoWindow>
              </Marker>
          </GoogleMap>

    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { CustomMarker, GoogleMap, InfoWindow, Marker } from "vue3-google-map";

const props = defineProps({
  property: Object,
});

const showPopup = ref(false);
const show = ref(false);
const config = useRuntimeConfig();

const x = parseFloat(props.property.coordinates_x);
const y = parseFloat(props.property.coordinates_y);
const center = { lat: x, lng: y };

//-------------------------------------------
let latitude = props.property.coordinates_x;
let longitude = props.property.coordinates_y;
const mapOptions = {
  style: 'mapbox://styles/mapbox/streets-v12',
  container: 'map',
  center: [longitude, latitude],
  zoom: 15,
};
watch(() => latitude, () => {
   show.value = true
});
//---------------------------
const formatNumber = (number:number) =>{
 return new Intl.NumberFormat('es-ES').format(number);
}
</script>

<style scoped>

hls {
  font-weight: 600 !important;
}

.price-tooltip-title {
  font-size: 20px;
  margin-top: 10px;
  color: #1C2D3A;
  font-family: 'Montserrat';
}

.price-preview-text {
  background: #6332B8;
  color: #fff; 
  padding: 2px 4px;
  border-radius: 10px;
  text-align: center;
}

.tooltop-info span {
  font-size: 14px; 
}
.tooltip-address {
  font-size: 14px; 
}

.gm-style-iw.gm-style-iw-c {
    max-width: 250px !important;
}

</style> 


