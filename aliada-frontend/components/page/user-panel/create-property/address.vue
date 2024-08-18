<template>
    <div class="form-inputs">
        <h6>Address</h6>
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
                <ElementFilteroptionFiltercountry label="Any Country" />
            </div>
            <div class="col-sm-4">
                <ElementFilteroptionFiltercities label="Any City" />
            </div>
            <div class="form-group col-sm-4">
                <label>Landmark</label>
                <input type="text" class="form-control" placeholder="landmark place name">
            </div>
        </form>
    </div>
</template>

<script setup lang="ts">

</script>

<style scoped></style>