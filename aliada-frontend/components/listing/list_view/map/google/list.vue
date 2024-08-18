<template>
  <section class="property-section section-sm">
    <div class="container-fluid">
      <div class="row ratio_70 property-grid-2 property-map">
        <div class="col-12">
          <div class="filter-panel">
            <div class="top-panel">
              <div>
                <!--<h2>Propiedades</h2>-->
                <span class="show-result"
                  >Mostrando
                  <span
                    >{{ props.properties?.to }} de
                    {{ props.properties?.total }}</span
                  >
                  propiedades</span
                >
              </div>
              <ul class="grid-list-filter">
                <li @click="showfilter = !showfilter">
                  <div class="filter-bottom-title">
                    <h6 class="mb-0 font-roboto">
                      Filtrar propiedades
                      <Icon name="uim:align-center" class="float-end ms-2" />
                    </h6>
                  </div>
                </li>
                <!-- <li>
                  <div class="dropdown">
                    <span
                      class="dropdown-toggle font-rubik"
                      data-bs-toggle="dropdown"
                      ><span>{{ selected }}</span>
                      <i class="fas fa-angle-down ms-lg-3 ms-2"></i
                    ></span>
                    <div class="dropdown-menu text-start">
                      <nuxt-link
                        class="dropdown-item"
                        to="javascript:void(0)"
                        v-for="(item, index) in sorting"
                        :key="index"
                        @click="getvalue(item)"
                        >{{ item }}</nuxt-link
                      >
                    </div>
                  </div>
                </li> -->
                <!-- <li
                  class="collection-grid-view"
                  :class="active == 'list' ? 'd-none' : ''"
                >
                  <ul>
                    <li @click="classes = 'col-md-6'">
                      <img
                        src="/image/icon/2.png"
                        alt=""
                        class="product-2-layout-view"
                      />
                    </li>
                    <li @click="classes = 'col-md-4'">
                      <img
                        src="/image/icon/3.png"
                        alt=""
                        class="product-3-layout-view"
                      />
                    </li>
                    <li @click="classes = 'col-xl-3'">
                      <img
                        src="/image/icon/4.png"
                        alt=""
                        class="product-4-layout-view"
                      />
                    </li>
                  </ul>
                </li> -->
                <li class="grid-btn" :class="active == 'grid' ? 'active' : ''">
                  <nuxt-link
                    to="javascript:void(0)"
                    class="grid-layout-view"
                    @click="gridview()"
                  >
                    <Icon name="lucide:layout-grid" />
                  </nuxt-link>
                </li>
                <li class="list-btn" :class="active == 'list' ? 'active' : ''">
                  <nuxt-link
                    to="javascript:void(0)"
                    class="list-layout-view"
                    @click="setlistview()"
                  >
                    <Icon name="material-symbols:format-list-bulleted" />
                  </nuxt-link>
                </li>
              </ul>
            </div>
          </div>
          <ElementDropdownfilter :showfilter="showfilter" />
        </div>
        <div class="col-xl-7 map-section mobile-property-map" :class="{'mobile-property-map': true, 'd-mobile-none': !isMapVisible}">
          <GoogleMap
            :api-key="config.public.GOOGLE_MAPS_API_KEY"
            style="width: 100%; height: 700px"
            :center="center"
            :zoom="12"
          >
            <template
              v-for="(property, index) in props.properties?.data"
              :key="index"
            >
            <CustomMarker :options="{
                  position: {
                    lat: parseFloat(property.coordinates_x),
                    lng: parseFloat(property.coordinates_y),
                  },
                  anchorPoint: 'BOTTOM_CENTER'
                }">
                   <div style="text-align: center">
                  <div class="price-preview-text">${{ formatNumber(property.price) }}</div>
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
                    lat: parseFloat(property.coordinates_x),
                    lng: parseFloat(property.coordinates_y),
                  },
                }"
              >
                <InfoWindow style="width: 250px !important;">

                  <div v-if="property.images">
                      <swiper v-bind="dataswiper" :modules="modules" :pagination="{ clickeble: true }" class="property-slider">
                        <swiper-slide v-for="(images, index) in property?.images">
                          <img :src="config.public.baseURL +'/storage/' + property.images[index].url" width="100%"/>
                        </swiper-slide>
                      </swiper>
                  </div>

                  <div class="font-roboto state-muinipality style-municipality">
                    <span v-if="property.type_property.name === 'Casa'">
                      {{ property.type_property.name }}
                    </span>
                    <span v-else-if="property.type_property.name === 'Departamento'" class="ellipsis">
                      {{ property.type_property.name }}
                    </span>
                    <h7> en {{ property.state_name }} - {{ property.municipality_name }}</h7>
                  </div>

                  <div class="style-name-property">
                    <h3><nuxt-link :to="'/property/single-property/' + property.slug" target="_blank">{{ property.title }}</nuxt-link></h3>
                  </div>
                  <div class="price-tooltip-title price-style">
                    <h6>$ {{ formatNumber(property.price) }} MXN</h6>
                  </div>
                  <div class="tooltop-info">
                    <span><img width="15px" src="/image/svg/icon/double-bed.svg" class="img-fluid" alt="Rooms" /> {{ property.rooms }} </span> |
                    <span><img width="15px" src="/image/svg/icon/bathroom.svg" class="img-fluid" alt="Bathroom" /> {{ property.bathroom }} Baño(s)</span> |
                    <span><img width="15px" src="/image/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="Square Meters" /> {{ property.square_meters }} m<sup>2</sup></span>
                  </div>
                  <div class="tooltip-address">
                    <p>{{ property.address }}</p>
                  </div>
                </InfoWindow>
              </Marker>
            </template>
          </GoogleMap>
        </div>

        <ElementMaplisting
          class="mobile-property-list"
          :data="props.properties?.data"
          :lview="lview"
          :classes="classes"
        />
        <div class="map-button" @click="toggleMapVisibility"><i class="far fa-map"></i> Ver mapa</div>
        <!--<div class="list-button"><i class="fa fa-list"></i> Ver lista</div>-->

      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { CustomMarker, GoogleMap, InfoWindow, Marker } from "vue3-google-map";
import { Navigation, Pagination } from 'swiper';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

let dataswiper = {
        slidesPerView: 1,
        spaceBetween: 50,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: {
            delay: 3000,
        }
    }
const props = defineProps({
  properties: Object,
});

let modules = [Navigation, Pagination]

const config = useRuntimeConfig();
const formatNumber = (number: number) => {
  return new Intl.NumberFormat("es-ES").format(number);
};

const x = parseFloat(props.properties?.data[0]?.coordinates_x);
const y = parseFloat(props.properties?.data[0].coordinates_y);
const center = { lat: x, lng: y };


// ----------------------------

let sorting: string[] = [
  "Lo más nuevo",
  "Lo más antiguo",
  "Destacados",
  "Filtrar por precio (menor a mayor)",
];
let showfilter = ref<boolean>(false);
let selected = ref("Filtrar por...");
let classes = ref<string>("col-md-6");
let lview = ref<string>("");
let active = ref<string>("grid");
function getvalue(value: string) {
  selected.value = value;
}
function setlistview() {
  classes.value = "col-md-12";
  lview.value = "list-view";
  active.value = "list";
}
function gridview() {
  active.value = "grid";
  lview.value = "";
  classes.value = "col-md-6";
}

//------------------

// Initially, we assume the map should be hidden on mobile, hence setting it to false.
const isMapVisible = ref(false);

function toggleMapVisibility() {
  // This toggles the visibility state, affecting only the visibility on mobile as defined by our CSS.
  isMapVisible.value = !isMapVisible.value;
}


function septup() {
  throw new Error('Function not implemented.');
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

.price-style h6 {
  font-size: 20px;
  font-weight: 600;
  margin-top: 10px;
  color: #6332B8;
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
  padding-right: 5px;
  padding-left: 0px;
  font-size: 14px;
}


.tooltip-address {
  margin-top: 10px;
  font-size: 14px;
}

.map-button{
    position: fixed;
    width: 150px;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 10px 20px;
    background-color: #6332B8;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    z-index: 1;
    text-align: center;
}
.list-button{
    position: fixed;
    width: 150px;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 10px 20px;
    background-color: #6332B8;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    z-index: 1;
    text-align: center;
}

.style-name-property{
  padding-top: 10px;
  color:#6332B8;
}
.style-name-property h3 a{
  color:#6332B8;
}
.style-name-property h3 a:hover{
  color:#7158e2;
}

.style-municipality{
  margin-top: 10px;
}

@media (min-width: 768px) {
  .map-button{
    display: none;
  }
}

@media (min-width: 601px) {
  .mobile-property-map {
    display: block; /* Always visible on desktops */
  }
}

@media (max-width: 600px) {
  .mobile-property-map {
    display: none; /* Hidden on mobile by default */
  }
  .mobile-property-map.d-mobile-none {
    display: none; /* Remains hidden when the state is false */
  }
  .mobile-property-map:not(.d-mobile-none) {
    display: block; /* Becomes visible when toggled */
  }
}

@media (max-width: 767px) {
    .filter-panel .top-panel {
        display: block;
        text-align: center;
    }
}
</style>
