<template>
    <swiper :breakpoints="breakpoints" :loop="true" class="slide-1 brand-slider" :slidesPerView="5" :spaceBetween="50"
        :autoplay="{
            delay: 2500,
            disableOnInteraction: false,
        }" v-bind="setting">
        <swiper-slide v-for="img in AllBrand" :key="img">
            <nuxt-link to="javascript:void(0)" class="logo-box">
                <img :src="img.src" alt="" class="img-fluid" />
            </nuxt-link>
        </swiper-slide>
    </swiper>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { Autoplay } from 'swiper';
interface Brand {
    src: string
}
interface FetchResponse {
    data: {
        value: {
            brand: Brand[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let setting = {
    modules: [Autoplay],

}
let { data } = await useFetch(useurl + '/data/brand.json')
let AllBrand: Brand[] = data.value.brand
let breakpoints = {
    320: {
        slidesPerView: 2
    },
    480: {
        slidesPerView: 3
    },
    768: {
        slidesPerView: 4
    },
    1199: {
        slidesPerView: 5
    }
}
</script>

<style lang="scss" scoped></style>