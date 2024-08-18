<template>
    <div class="create-property-form">
        <div class="form-inputs">
            <h6>Basic information</h6>
            <form class="row gx-2 gx-sm-3">
                <div class="form-group col-sm-4">
                    <label>Property Type</label>
                    <input type="text" class="form-control" placeholder="villa">
                </div>
                <div class="col-sm-4">
                    <ElementFilteroptionStatus :data="data" label="Property Status" />
                </div>
                <div class="form-group col-sm-4">
                    <label>Property Price</label>
                    <input type="text" class="form-control" placeholder="$2800">
                </div>
                <div class="col-sm-4 mb-3">
                    <ElementFilteroptionRooms :data="data" labels="Cantidad de cuartos" />
                </div>
                <div class="col-sm-4 mb-3">
                    <ElementFilteroptionBed :data="data" labels="Recámaras" />
                </div>
                <div class="col-sm-4 mb-3">
                    <ElementFilteroptionBath :data="data" labels="Baños" />
                </div>
                <div class="form-group col-sm-4">
                    <label>Area</label>
                    <input type="text" class="form-control" placeholder="85 m2">
                </div>
                <div class="form-group col-sm-4">
                    <label>Price</label>
                    <input type="text" class="form-control" placeholder="$3000">
                </div>
                <div class="col-sm-4">
                    <ElementFilteroptionAgencies :data="data" label="Agencies" />
                </div>
                <div class="form-group col-sm-12">
                    <label>Description</label>
                    <textarea class="form-control" rows="4"></textarea>
                </div>
            </form>
        </div>
        <PageUserPanelCreatePropertyAddress />
        <PageUserPanelCreatePropertyGallery />
    </div>
</template>

<script setup lang="ts">
import { useFiltersStore } from "~/store/filter.js";
const data = useFiltersStore().data;
</script>

<style scoped></style>