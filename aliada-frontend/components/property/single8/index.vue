<template>
    <section class="p-0 ratio3_2">
        <div class="container-fluid">
            <div class="zoom-image-box zoom-gallery-multiple">
                <div class="row">
                    <div :class="item.classes" v-for="(item, index) in ImgBox" :key="index">
                        <nuxt-link to="javascript:void(0)" v-for="(img, index) in item.img" :key="index"
                            class="bg-size background" :style="'background-image:url(' + img + ')'" @click="showsingle()">
                            <img :src="img" class="bg-img d-none" alt="">
                        </nuxt-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <PropertySingle8SinglePropertyHader />
    <PropertySingle8SingleProperty />
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface ImgBox {
    img: string[];
    classes: string;
}
interface FetchResponse { data: { value: { imagebox: ImgBox[] } } }
let { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json')
let ImgBox: ImgBox[] = single.value.imagebox
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string[]>([])
let image: string[] = ['/image/property/4.jpg', '/image/property/2.jpg', '/image/property/1.jpg', '/image/property/5.jpg', '/image/property/3.jpg']
function showsingle() {
    imgs.value = image
    visible.value = true
}

function handleHide() {
    visible.value = false
}
</script>

<style scoped></style>