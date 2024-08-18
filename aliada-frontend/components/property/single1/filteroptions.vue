<template>
    <div class="advance-card">
        <h6>filter</h6>
        <div class="row gx-2">
            <ElementFilteroptionStatus :data="data" />
            <ElementFilteroptionType :data="data" />
            <ElementFilteroptionRooms :data="data" />
            <ElementFilteroptionBed :data="data" />
            <ElementFilteroptionBath :data="data" />
            <ElementFilteroptionAgencies :data="data" />
            <ElementFilteroptionPrice label="price" width="width:264px" />
            <ElementFilteroptionArea label="Area" width="width:264px" />
            <div class="col-12">
                <nuxt-link to="/" class="btn btn-gradient color-2 btn-block btn-pill mt-2">Search </nuxt-link>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useFiltersStore } from "~/store/filter";
let data = useFiltersStore().data 
</script>

<style scoped></style>