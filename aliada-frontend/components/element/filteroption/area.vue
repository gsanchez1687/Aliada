<template>
  <div class="col-lg-12 col-sm-6">
    <div class="form-group m-0">
      <div class="price-range">
        <label for="amount">
          {{ props.label }}:
          <span>Min: {{ range[0] }}</span> - 
          <span>Max: {{ range[1] }}</span> m<sup>2</sup>
        </label>
        <ClientOnly>
          <vue-slider :style="props.width ? props.width : 'width: 383px'"  v-model="range"
            :min="20" :max="1000" class="price"></vue-slider>
        </ClientOnly>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { defineEmits, defineProps, ref } from "vue";
import VueSlider from 'vue-slider-component';
import 'vue-slider-component/theme/antd.css';

let props = defineProps({
  label: String,
  width: String
});
const range = ref<number[]>([20, 1000]);
const emits = defineEmits(['areaSelected']);

watch(range, (newValue, oldValue) => {
    emits('areaSelected', newValue);
});

onMounted(() => {
  emits('areaSelected', range.value);
})

</script>

<style lang="scss" scoped>
/* Add your styles here if needed */
</style>
