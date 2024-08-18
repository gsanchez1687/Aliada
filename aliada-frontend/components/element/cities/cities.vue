<template>
    <div class="feature-2 dot-gradient">
        <swiper :breakpoints="breakpoints" :loop="true" :pagination="{ clickable: true }" :modules="setting" :slidesPerView="5"
            :spaceBetween="70">
            <swiper-slide class="feature-box" v-for="(city, index) in allcity" :key="index">
                <img :src="city.img" class="img-fluid w-100" alt="">
                <div class="feature-bottom">
                    <h3>{{ city.title }}</h3>
                    <span>{{ city.property }}</span>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { Pagination } from 'swiper'
interface City {
    img: string;
    title: string;
    property: string;
}
interface FetchResponse {
    data: {
        value: {
            city: City[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/cities.json')
let allcity = <City[]>data.value.city
let setting = [Pagination]
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    575: {
        slidesPerView: 2
    },
    765: {
        slidesPerView: 3
    },
    1200: {
        slidesPerView: 3
    },
    1461: {
        slidesPerView: 4
    }
}
</script>

<style lang="scss" scoped></style>    