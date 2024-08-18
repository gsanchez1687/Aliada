<template>
    <PropertySingle7SinglePropertyHader />
    <PropertySingle7SingleProperty />
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script setup lang="ts">
import VueEasyLightbox from 'vue-easy-lightbox'
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string[]>([])
let image: string[] = ['/image/property/4.jpg', '/image/property/2.jpg', '/image/property/7.jpg', '/image/property/6.jpg']
function showsingle() {

    imgs.value = image

    visible.value = true
}
function handleHide() {
    visible.value = false
}
</script>

<style scoped></style>