<template>
    <div class="offer-slider">
        <swiper :breakpoints="breakpoints" :modules="setting" v-bind="data">
            <swiper-slide v-for="item in offerdata" :key="item">
                <div class="offer-wrapper">
                    <div class="media">
                        <div class="offer-icon">
                            <img :src="item.src" alt="">
                        </div>
                        <div class="media-body">
                            <h6>{{ item.title }}</h6>
                            <h3>{{ item.subtitle }}</h3>
                            <p>{{ item.details }}</p>
                        </div>
                    </div>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script lang="ts" setup>
import { Autoplay } from 'swiper';
import { useApiStore } from '~/store/api'
import 'swiper/css';
import 'swiper/css/bundle'
let offerdata = useApiStore().alloffers;
let setting = [Autoplay]
let data = {
    slidesPerView: 2,
    spaceBetween: 50,
    slidesPerGroup: 2,
    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: {
        delay: 3000,
    }
}
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    1200: {
        slidesPerView: 2
    },
}
</script>

<style lang="scss" scoped></style>