<template>
  <div class="col-lg-12">
    <div class="form-group m-0">
      <label v-if="props.label">{{ props.label }}</label>
      <div class="dropdown">
        <span
          class="dropdown-toggle font-rubik d-flex justify-content-between align-items-center"
          data-bs-toggle="dropdown"
          @click="open = !open"
        >
          <span v-if="status!= null">{{ status}}</span>
          <span v-else>Estatus</span>

          <Icon name="material-symbols:keyboard-arrow-down" class="fs-5" />
        </span>
        <div class="dropdown-menu text-start" :class="open ? 'show' : ''">
          <nuxt-link
            class="dropdown-item"
            v-for="(statusItem, index) in statuses"
            :key="index"
            @click="updateStatus(statusItem)"
            to="javascript:void(0)"
            >{{ Object.values(statusItem)[0] }}</nuxt-link
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

let emit = defineEmits(["statusSelected"]); // Default text when no status is selected
let open = ref(false);

// Hardcoded status options
let statuses = ref([{"Venta":"En venta"}, {"Renta":"En renta"}]);
let status = ref();
function updateStatus(value: object) {
  status.value = Object.values(value)[0];
  emit("statusSelected", Object.keys(value)[0])
  open.value = false; 
}
</script>

<style scoped>
/* Styles remain unchanged */
</style>
