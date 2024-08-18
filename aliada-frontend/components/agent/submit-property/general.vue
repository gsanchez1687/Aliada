<template>
    <h2>General</h2>
    <p class="font-roboto">Basic information about property</p>
    <form class="row gx-3">
        <div class="form-group col-sm-4">
            <label>Property Type</label>
            <input type="text" class="form-control" placeholder="villa" required>
        </div>
        <div class="col-sm-4">
            <ElementFilteroptionStatus label="property Status" :data="store.data" />
        </div>
        <div class="form-group col-sm-4">
            <label>Property Price</label>
            <input type="text" class="form-control" placeholder="$2800" required>
        </div>
        <div class="col-sm-4">
            <ElementFilteroptionRooms labels="Cantida de Cuartos" :data="store.data" />
        </div>
        <div class="col-sm-4">
            <ElementFilteroptionBed labels="Recámaras" :data="store.data" />
        </div>
        <div class="col-sm-4">
            <ElementFilteroptionBath labels="Baños" :data="store.data" />
        </div>
        <div class="form-group col-sm-4 mt-3">
            <label>Area</label>
            <input type="text" class="form-control" placeholder="85 m2">
        </div>
        <div class="form-group col-sm-4 mt-3">
            <label>Price</label>
            <input type="text" class="form-control" placeholder="$3000">
        </div>
        <div class="col-sm-4 mt-3">
            <ElementFilteroptionAgencies label="Agencies" :data="store.data" />
        </div>
        <div class="form-group col-sm-12">
            <label>Description</label>
            <textarea class="form-control" rows="4"></textarea>
        </div>
    </form>
</template>

<script setup lang="ts">
import { useFiltersStore } from '~/store/filter';
let store = useFiltersStore();
</script>

<style scoped></style>