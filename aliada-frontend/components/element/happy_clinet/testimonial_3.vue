<template>
    <swiper :breakpoints="breakpoints" :loop="true" :modules="setting" :pagination="{ clickable: true }" :slidesPerView="3"
        class="testimonial-1 dot-gradient">
        <swiper-slide v-for="(item, index) in alldata" :key="index">
            <div class="pepole-comment">
                <div class="client-msg">
                    <span class="quote">
                        <img src="/image/testimonial/quote.png" alt="">
                    </span>
                    <p>{{ item.details }}</p>
                </div>
                <div class="media">
                    <img :src="item.img" alt="">
                    <div class="media-body">
                        <h3>{{ item.name }}</h3>
                        <span>{{ 'CEO of Desees' }}</span>
                    </div>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { Pagination } from 'swiper'
interface FetchResponse {
    data: {
        value: {
            WhatPeopleSay: testi[]
        }
    }
}
interface testi {
    details: string;
    img: string;
    name: string
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/clientAgent.json')
let setting = [Pagination]
let alldata: testi[] = data.value.WhatPeopleSay
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    992: {
        slidesPerView: 3
    },
}
</script>

<style lang="scss" scoped></style>