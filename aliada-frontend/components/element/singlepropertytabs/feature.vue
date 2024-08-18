<template>
  <div class="tab-pane fade page-section" id="feature">
    <h4 class="content-title">Amenidades</h4>
    <div class="single-feature row">
      <div class="d-flex flex-wrap">
        <div
          class="col-md-4 text-amenities"
          v-for="(item, index) in props.property.amenities"
          :key="index">
          <i :class="item.amenity.icon"></i>
          <span>{{ item.amenity.name }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const props = defineProps({
  property: Object,
});
import { useurl } from "~/composable/apiurl";
interface Feature {
  icon: string;
  name: string;
}
interface FetchResponse {
  data: {
    value: {
      feature1: Feature[];
      feature2: Feature[];
      feature3: Feature[];
    };
  };
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + "/data/propertysingleiamge.json");
const Feature_1 = data.value.feature1;
const Feature_2 = data.value.feature2;
const Feature_3 = data.value.feature3;

console.log(Feature_1);
console.log(props.property);
</script>

<style scoped>

@media (max-width: 600px){
  .col-md-4.text-amenities {
    margin-right: 20px !important;
  }
}

</style>
