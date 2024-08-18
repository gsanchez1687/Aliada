<template>
    <h2>Address</h2>
    <p class="font-roboto">Add your property Location</p>
    <form class="row gx-3">
        <div class="form-group col-sm-6">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="Address of your property">
        </div>
        <div class="form-group col-sm-6">
            <label>Zip code</label>
            <input type="number" class="form-control" placeholder="39702">
        </div>
        <div class="col-sm-4">
            <ElementFilteroptionFiltercountry label="any country" :data="store.data" />
        </div>
        <div class="col-sm-4">
            <ElementFilteroptionFiltercities label="any Cities" :data="store.data" />
        </div>
        <div class="form-group col-sm-4">
            <label>Landmark</label>
            <input type="text" class="form-control" placeholder="landmark place name">
        </div>
        <div class="col-sm-12">
            <iframe title="realestate location"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946229!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563449626439!5m2!1sen!2sin"
                allowfullscreen></iframe>
        </div>
    </form>
</template>

<script setup lang="ts">
import { useFiltersStore } from '~/store/filter';
let store = useFiltersStore();
</script>

<style scoped></style>