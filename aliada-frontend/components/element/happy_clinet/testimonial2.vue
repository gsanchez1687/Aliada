<template>
    <swiper :loop="true" v-bind="setting" class="testimonial-3 modern-dot client corporate" :class="color">
        <swiper-slide v-for="item in client" :key="item">
            <div class="row our-client">
                <div class="col-md-6">
                    <div class="client-left">
                        <img :src="item.img" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="client-right">

                        <p class="font-roboto">{{ item.details }}</p>
                        <ul class="client-rating">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <h3>{{ item.name }}</h3>
                        <h6>{{ 'Our Customer' }}</h6>
                        <span class="quote-img">
                            <img src="/image/testimonial/quote-2.png" alt="">
                        </span>
                    </div>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>

<script lang="ts" setup>

import { useurl } from '~/composable/apiurl'
import { Pagination, Autoplay } from 'swiper'
interface Testimonial {
    name: string;
    img: string;
    details: string;
    rating: number
}
interface FetchResponse {
    data: {
        value: {
            OurClientInCorporateLayout: Testimonial[]
        }
    }
}
defineProps({
    color: String
})
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/clientAgent.json')
let setting = {
    pagination: {
        clickable: true,
    },
    modules: [Pagination, Autoplay]
}
let client: Testimonial[] = data.value.OurClientInCorporateLayout
</script>

<style  scoped></style>