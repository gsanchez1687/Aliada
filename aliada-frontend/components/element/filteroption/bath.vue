<template>
  <div :class="props.label ? 'col-lg-6' : 'col-lg-12'">
    <div class="form-group m-0">
      <label v-if="props.label">{{ props.label }}</label>
      <div class="dropdown">
        <span
          class="dropdown-toggle font-rubik d-flex justify-content-between align-items-center"
          data-bs-toggle="dropdown"
          @click="open = !open"
          >
          <span v-if="baths == 0">Baños</span>
           <span v-else>{{baths}}</span>
          <Icon name="material-symbols:keyboard-arrow-down" class="fs-5" />
        </span>
        <div class="dropdown-menu text-start" :class="open ? 'show' : ''">
          <nuxt-link
            class="dropdown-item"
            v-if="baths > 0"
            @click="
              () => {
                baths = 0;
              }
            "
            >Baños</nuxt-link
          >
          <nuxt-link
            class="dropdown-item"
            v-for="(bath, index) in bathsArray"
            :key="index"
            @click="getBath(bath)"
            >{{ bath }}</nuxt-link
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { defineEmits, defineProps, ref } from "vue";
let props = defineProps({
  label: String,
});
const emits = defineEmits(["bathsSelected"]);
let baths = ref<number>(0);
const bathsArray = ref<number[]>([1, 2, 3, 4]);
let open = ref<boolean>(false);

function getBath(value: number) {
  emits("bathsSelected", value);
  baths.value= value
}
</script>

<style lang="scss" scoped></style>
