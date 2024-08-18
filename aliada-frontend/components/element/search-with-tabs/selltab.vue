<template>
  <div class="tab-pane fade show active" id="sell" role="tabpanel">
    <div class="row review-form gx-3">
      <div class="col-lg-4 col-md-6">
        <div class="form-group">
          <ElementFilteroptionType
            v-if="typeProperties != null"
            @typeSelected="updateSelectedType"
            :data="typeProperties"
          />
        </div>
      </div>
      <div class="col-lg-6 col-sm-6">
        <ElementFilteroptionPrice
          @priceSelected="updateSelectedPrice"
          label="Precio"
          width="width: 100%"
        />
      </div>
      <div class="col-lg-2 col-md-6">
        <button
          type="button"
          class="btn btn-gradient color-4"
          @click="sendParams()">Buscar
        </button>
      </div>
    </div>
  </div>
  <div class="tab-pane fade tab-listing" id="rent" role="tabpanel">
    <div class="row review-form gx-3">
      <div class="col-lg-4 col-md-6">
        <div class="form-group">
          <ElementFilteroptionType
            v-if="typeProperties != null"
            @typeSelected="updateSelectedType"
            :data="typeProperties"
          />
        </div>
      </div>
      <div class="col-lg-6 col-sm-6">
        <ElementFilteroptionPrice
          label="Precio"
          width="width: 100%"
          @priceSelected="updateSelectedPrice"
        />
      </div>
      <div class="col-lg-2 col-md-6">
        <button
          type="button"
          class="btn btn-gradient color-4"
          @click="sendParams()"
        >
          Buscar
        </button>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import backendServices from "~/services/BackendServices";
import Swal from "sweetalert2";

const typeProperties = ref<Object>(null);
const type = ref<String>(null);
const price = ref<[]>([]);

let props = defineProps({
  category: String,
});

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
};

const updateSelectedPrice = (priceProperty: []) => {
  price.value = priceProperty;
};

const sendParams = () => {
 if(!type.value || !price.value){
  Swal.fire({
        title: 'Error',
        text: 'Debes seleccionar una categoria para buscar propiedades',
        icon: 'error',
        confirmButtonText: 'Ok'
      });
 }else{
  const newUrl  =`/listing/list_view/map/map-properties?typeProperty=${type.value}&priceProperty=${price.value[0]}&priceProperty=${price.value[1]}&categoryProperty=${props.category}`
  window.location.href = newUrl;
 }

};
</script>

<style>
.simple-range-slider-bg-bar {
  margin-top: 15px !important;
}
</style>
