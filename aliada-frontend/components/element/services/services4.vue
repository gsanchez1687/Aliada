<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <swiper :breakpoints="breakpoints" :slidesPerView="4" :spaceBetween="50" :loop="true"
                    class="service-slider arrow-gradient arrow-right">
                    <swiper-slide v-for="(item, index) in services" :key="index">
                        <div class="service-wrapper">
                            <div class="top-img-box">
                                <div>
                                    <img :src="item.img" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="service-details">
                                <h3><nuxt-link to="/page/otherpages/services">{{ item.title }}</nuxt-link></h3>
                                <p class="font-roboto">{{ item.details }}</p>
                                <nuxt-link to="/page/otherpages/services">{{ 'View details' }}</nuxt-link>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
interface Service {
    img: string;
    title: string;
    details: string
}
interface FetchResponse {
    data: {
        value: {
            services4: Service[];
        };
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/services.json')
let services: Service[] = data.value.services4
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    768: {
        slidesPerView: 2
    },
    992: {
        slidesPerView: 3
    },
    1600: {
        slidesPerView: 4
    },
}
</script>

<style lang="scss" scoped></style>