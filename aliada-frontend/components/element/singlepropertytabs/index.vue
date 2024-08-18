<template>
    <ul class="nav nav-tabs line-tab" id="top-tab" role="tablist">
        <li class="nav-item"><nuxt-link to="#about" data-bs-toggle="tab" class="nav-link active">Detalles</nuxt-link></li>
        <li class="nav-item"><nuxt-link data-bs-toggle="tab" class="nav-link" to="#feature">Amenidades</nuxt-link></li>
        <!--<li class="nav-item"><nuxt-link data-bs-toggle="tab" class="nav-link" to="#gallery">Fotos</nuxt-link></li>-->
        <!--<li class="nav-item"><nuxt-link data-bs-toggle="tab" class="nav-link" to="#video">video</nuxt-link></li>-->
        <!--<li class="nav-item"><nuxt-link data-bs-toggle="tab" class="nav-link" to="#floor_plan">Floor plan</nuxt-link></li>-->
        <li class="nav-item"><nuxt-link data-bs-toggle="tab" class="nav-link" to="#location-map">Mapa</nuxt-link></li>
    </ul>
    <div class="tab-content" id="top-tabContent">
        <ElementSinglepropertytabsAbout :property="props.property"/>
        <ElementSinglepropertytabsFeature :property="props.property" />
        <!-- <ElementSinglepropertytabsGallery  :property="props.property"/> -->
        <!-- <ElementSinglepropertytabsVideo /> -->
        <ElementSinglepropertytabsFlorpaln :property="props.property"/>
        <ElementSinglepropertytabsLocation :property="props.property" />
    </div>
</template>

<script setup lang="ts">
const props = defineProps({
  property: Object,
});
</script>

<style scoped></style>