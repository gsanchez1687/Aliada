<template>
    <div class="dropzone-admin">
        <label>Media</label>
        <DropZone  :maxFiles="Number(10000000000)"  url="http://localhost:5000/item" :uploadOnDrop="true" :multipleUpload="true" class="p-3" :parallelUpload="3"/>
    </div>
</template>

<script setup lang="ts">

</script>

<style scoped>

</style>