<template>
  <div
    class="left-sidebar filter-bottom-content"
    :class="showfilter ? 'd-block open' : ''"
  >
    <h6 class="d-lg-none d-block text-end">
      <nuxt-link
        to="javascript:void(0)"
        class="close-filter-bottom"
        @click="closefilter()"
        >Cerrar</nuxt-link
      >
    </h6>
    <div class="row">
      <div class="col-lg-4">
        <ElementFilteroptionStatus
          @statusSelected="updateSelectedStatus"
          :label="''"
        />
      </div>
      <div class="col-lg-4">
        <ElementFilteroptionType
          v-if="typeProperties != null"
          @typeSelected="updateSelectedType"
          :data="typeProperties"
        />
      </div>
      <div class="col-lg-4">
        <ElementFilteroptionRooms
          @roomsSelected="updateSelectedrooms"
          :label="''"
        />
      </div>
      <div class="col-lg-4">
        <ElementFilteroptionBath
          @bathsSelected="updateSelectedBaths"
          :data="data"
        />
      </div>
      <div class="col-lg-4">
        <ElementFilteroptionPrice
          @priceSelected="updateSelectedPrice"
          label="Precio"
        />
      </div>
      <div class="col-lg-4">
        <ElementFilteroptionArea
          @areaSelected="updateSelectedArea"
          label="Superficie"
        />
      </div>
      <div class="col-lg-4 text-first">
        <nuxt-link
          to="javascript:void(0)"
          @click="sendParams()"
          class="mt-3 btn btn-gradient color-4 btn-pill"
          >Buscar propiedad</nuxt-link
        >
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { defineEmits, defineProps, ref } from "vue";
import backendServices from "~/services/BackendServices";
import { useFiltersStore } from "~/store/filter.js";
const typeProperties = ref<Object>(null);
const type = ref<String>(null);
const price = ref<[]>([]);
const area = ref<[]>([]);
const rooms = ref<number>(0);
const baths = ref<number>(0);
const status = ref<string>(null);

let props = defineProps({
  showfilter: Boolean,
});
let close = ref<boolean>(false);
const data = useFiltersStore().data;

let emit = defineEmits(["closefilter"]);

function closefilter() {
  close.value = false;
  emit("closefilter", close.value);
}

const fetchData = async () => {
  await backendServices
    .getTypeProperties()
    .then((response: any) => {
      typeProperties.value = response.data;
    })
    .catch((error: any) => {
      console.error("Error al obtener datos sales:", error);
    });
};

fetchData();

const updateSelectedType = (typeProperty: string) => {
  type.value = typeProperty;
  console.log("typeProperty", typeProperty);
};

const updateSelectedPrice = (priceProperty: []) => {
  price.value = priceProperty;
  console.log("priceProperty", priceProperty);
};
const updateSelectedArea = (areaProperty: []) => {
  area.value = areaProperty;
  console.log("areaProperty", areaProperty);
};

const updateSelectedrooms = (roomsProperty: number) => {
  rooms.value = roomsProperty;
  console.log("roomsProperty", roomsProperty);
};

const updateSelectedBaths = (bathsProperty: number) => {
  baths.value = bathsProperty;
  console.log("bathsProperty", bathsProperty);
};

const updateSelectedStatus = (statusProperty: string) => {
  status.value = statusProperty;
  console.log("statusProperty", statusProperty);
};

const sendParams = () => {
  const newUrl = `/listing/list_view/map/map-properties?typeProperty=${type.value}&priceProperty[]=${price.value[0]}&priceProperty[]=${price.value[1]}&categoryProperty=${status.value}&areaProperty[]=${area.value[0]}&areaProperty[]=${area.value[1]}&roomsProperty=${rooms.value}&bathsProperty=${baths.value}`;
  window.location.href = newUrl;
};
</script>

<style scoped></style>
