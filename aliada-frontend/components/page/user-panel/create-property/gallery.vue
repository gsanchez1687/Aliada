<template>
    <div class="form-inputs">
        <h6>Gallery</h6>
        <div class="dropzones">
            <DropZone :maxFiles="Number(10000000000)" url="http://localhost:5000/item" :uploadOnDrop="true"
                :multipleUpload="true" :parallelUpload="3" />
        </div>
        <form class="row gx-3">
            <div class="form-group col-sm-12">
                <label>Video (mp4)</label>
                <input type="text" class="form-control" placeholder="mp4 video link">
            </div>
            <div class="form-group col-sm-12">
                <label>Additional features</label>
                <div class="feature-checkbox">
                    <label for="chk-ani">
                        <input class="checkbox_animated color-2" id="chk-ani" type="checkbox"> Emergency Exit
                    </label>
                    <label for="chk-ani1">
                        <input class="checkbox_animated color-2" id="chk-ani1" type="checkbox"> CCTV
                    </label>
                    <label for="chk-ani2">
                        <input class="checkbox_animated color-2" id="chk-ani2" type="checkbox"> Free Wi-Fi
                    </label>
                    <label for="chk-ani3">
                        <input class="checkbox_animated color-2" id="chk-ani3" type="checkbox"> Free Parking In The Area
                    </label>
                    <label for="chk-ani4">
                        <input class="checkbox_animated color-2" id="chk-ani4" type="checkbox"> Air Conditioning
                    </label>
                </div>
            </div>
        </form>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-gradient color-2 btn-pill">Add property</button>
    </div>
</template>

<script setup lang="ts">
</script>

<style scoped></style>