<template>
  <div :class="props.label ? 'col-lg-6' : 'col-lg-12'">
    <div class="form-group m-0">
      <label v-if="props.label">{{ props.label }}</label>
      <div class="dropdown">
        <span
          class="dropdown-toggle font-rubik d-flex justify-content-between align-items-center"
          data-bs-toggle="dropdown"
          @click="open = !open"
          ><span v-if="rooms>0">{{rooms}}</span>
          <span v-else>Recamaras</span>
          <Icon name="material-symbols:keyboard-arrow-down" class="fs-5" />
        </span>
        <div class="dropdown-menu text-start" :class="open ? 'show' : ''">
            <nuxt-link
            class="dropdown-item"
            v-if="rooms > 0"
            @click="
              () => {
                rooms = 0;
              }
            "
            >Recamaras</nuxt-link
          >
          <p
            class="dropdown-item"
            v-for="(room, index) in roomArray"
            :key="index"
            @click="getRooms(room)"
            to="javascript:void(0)"
            >{{ room }}</p
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
let route = useRoute();
const rooms = <number>ref(0)
const roomArray = ref<
 number[]
>([1, 2, 3, 4, 5, 6, 7, 8]);

let open = ref<boolean>(false);
const emits = defineEmits(['roomsSelected']);
function getRooms(value: number) {
    emits('roomsSelected', value);
    rooms.value = value
}
</script>

<style lang="scss" scoped></style>
