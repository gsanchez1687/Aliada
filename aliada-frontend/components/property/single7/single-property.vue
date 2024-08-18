<template>
    <section class="single-property mt-0 pt-0">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-xl-9 col-lg-8">
                    <div class="description-section tab-description">
                        <div class="description-details">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="single-gallery mb-4">
                                        <swiper class="gallery-for" :loop="true" :thumbs="{ swiper: thumbsSwiper }"
                                            :effect="'fade'" :modules="setting">
                                            <swiper-slide v-for="(img, index) in Gallery" :key="index" class="height">
                                                <div class="bg-size background"
                                                    :style="'background-image:url(' + img.src + ')'">
                                                    <img :src="img.src" class="bg-img d-none img" alt="">
                                                </div>
                                            </swiper-slide>
                                        </swiper>
                                        <swiper @swiper="setThumbsSwiper" :loop="true" :slidesPerView="4" :freeMode="true"
                                            :modules="setting" :watchSlidesProgress="true" class="gallery-nav">
                                            <swiper-slide v-for="(img, index) in Gallery" :key="index"
                                                class="thumbnail-image">
                                                <img :src="img.src" class="img-fluid" alt="">
                                            </swiper-slide>
                                        </swiper>
                                    </div>
                                </div>
                            </div>
                            <div class="desc-box">
                                <ElementSinglepropertytabs />
                            </div>
                            <PropertySingle1Singlereview />
                        </div>
                        <PropertySingle2RelatedProperty />
                    </div>
                </div>
                <PropertySingle1Filter />
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { FreeMode, Navigation, EffectFade, Thumbs } from 'swiper';
import "swiper/css/effect-fade";
interface Gallery { src: string }
interface FetchResponse {
    data: {
        value: {
            gallary: Gallery[]
        }
    }
}
let { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json')
const Gallery: Gallery[] = single.value.gallary
let thumbsSwiper = ref();
let setting = [FreeMode, Navigation, Thumbs, EffectFade]
const setThumbsSwiper = (swiper: null) => {
    thumbsSwiper.value = swiper;
}
</script>

<style scoped></style>