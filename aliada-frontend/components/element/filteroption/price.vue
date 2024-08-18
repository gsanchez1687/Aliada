<template>
  <div class="col-lg-12">
    <div class="form-group m-0">
      <div class="price-range">
        <label for="amount">{{ props.label }}: 
          <lprice>Min: ${{ formattedValue(value[0]) }} - Max: ${{ formattedValue(value[1]) }}</lprice>
        </label>
        <ClientOnly>
          <vue-slider :style="props.width ? props.width : 'width: 383px'" v-model="value" :min="250000" :max="100000000" class="price"></vue-slider>
        </ClientOnly>
      </div>
    </div>
  </div>
</template>

<script lang="ts" type="module" setup>
import VueSlider from 'vue-slider-component';
import 'vue-slider-component/theme/antd.css';

let props = defineProps({
  label: String,
  width: String
})
const emits = defineEmits(['priceSelected']);

const value = ref<number[]>([750000, 100000000]);

  watch(value, (newValue, oldValue) => {
    emits('priceSelected', newValue);
});

function formattedValue(val: number): string {
  if (val >= 1000000) {
    return `${(val / 1000000).toLocaleString()} M`;
  } else if (val >= 1000) {
    return `${(val / 1000).toLocaleString()} mil`;
  } else {
    return val.toLocaleString();
  }
}

onMounted(() => {
  emits('priceSelected', value.value);
})

</script>

<style lang="scss" scoped>
lprice {
  font-weight: 400 !important;
}
</style>
