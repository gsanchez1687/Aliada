<template>
    <div class="tab-pane fade page-section ratio3_2" id="gallery">
        <h4 class="content-title">Galería de fotos</h4>
        <div class="single-gallery">
            <swiper class="gallery-for" :loop="true" :thumbs="{ swiper: thumbsSwiper }" :effect="'fade'" :modules="setting">
                <swiper-slide v-for="(img, index) in Gallery" :key="index" class="height">
                    <div class="bg-size background" :style="'background-image:url(' + img.src + ')'">
                        <img :src="img.src" class="bg-img d-none img" alt="">
                    </div>
                </swiper-slide>
            </swiper>
            <swiper @swiper="setThumbsSwiper" :loop="true" :slidesPerView="4" :freeMode="true" :modules="setting"
                :watchSlidesProgress="true" class="gallery-nav">
                <swiper-slide v-for="(img, index) in Gallery" :key="index" class="thumbnail-image">
                    <img :src="img.src" class="img-fluid" alt="">
                </swiper-slide>
            </swiper>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { FreeMode, Navigation, EffectFade, Thumbs } from 'swiper';
import "swiper/css/effect-fade";
interface Gallery {
    src: string;
}
interface FetchResponse {
    data: {
        value: {
            gallary: Gallery[];
        };
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
const { data } = await useFetch(useurl + '/data/propertysingleiamge.json')
const Gallery: Gallery[] = data.value.gallary
let thumbsSwiper = ref<null>();
let setting = [FreeMode, Navigation, Thumbs, EffectFade]
const setThumbsSwiper = (swiper: null) => {
    thumbsSwiper.value = swiper;
}
</script>

<style scoped></style>