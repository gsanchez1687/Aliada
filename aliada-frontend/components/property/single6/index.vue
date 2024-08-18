<template>
    <section class="p-0 ratio3_2">
        <swiper :breakpoints="breakpoints" :slidesPerView="3" :loop="true"
            class="single-property-slider zoom-image-box zoom-gallery-multiple">
            <swiper-slide v-for="(item, index) in All_Img" :key="index">
                <nuxt-link to="javascript:void(0)" class="zoom" @click="showsingle()">
                    <div :style="'background-image:url(' + item.src + ')'" class="bg-size background">
                        <img :src="item.src" class="bg-img d-none" alt="">
                    </div>
                </nuxt-link>
            </swiper-slide>
        </swiper>
    </section>
    <PropertySingle6SinglePropertyHader />
    <PropertySingle6SingleProperty />
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import VueEasyLightbox from 'vue-easy-lightbox'
interface Single6image { src: string; }
interface FetchResponse { data: { value: { single6image: Single6image[] } } }
let { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json')
let All_Img = single.value.single6image
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string[]>([])
let image: string[] = ['/image/property/4.jpg', '/image/property/2.jpg', '/image/property/7.jpg', '/image/property/6.jpg']
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    575: {
        slidesPerView: 2
    },
    992: {
        slidesPerView: 3
    },

}
function showsingle() {

    imgs.value = image

    visible.value = true
}
function handleHide() {
    visible.value = false
}
</script>

<style scoped></style>