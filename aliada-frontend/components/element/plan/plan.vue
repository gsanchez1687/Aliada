<template>
    <swiper :breakpoints="breakpoints" :loop="true" :slides-per-view="3" :spaceBetween="40" class="pricing-slider">
        <swiper-slide v-for="item in plans" :key="item">
            <div class="pricing-box">
                <div class="pricing-details">
                    <div class="pricing-icon" :class="color">
                        <svg class="pricing-svg">
                            <use :xlink:href="item.svg"></use>
                        </svg>
                    </div>
                    <h3>{{ item.title }}</h3>
                    <p class="font-roboto">{{ item.details }}</p>
                </div>
                <ul>
                    <li>{{ item.l1 }}</li>
                    <li>{{ item.l2 }}</li>
                    <li>{{ item.l3 }}.</li>
                </ul>
                <div class="price">
                    <span class="label label-light label-flat" :class="color">{{ item.month }}</span>
                    <h4>{{ item.price }}</h4>
                    <span class="light-text">{{ 'Per' }}</span>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import type {price} from '~/static/data/types/pricing';
interface FetchResponse {
    data: {
        value: {
            pricing: price[]
        }
    }
}
defineProps({
    color: String
})
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/pricing.json')
let plans = <price[]>data.value.pricing
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    768: {
        slidesPerView: 2
    },
    1367: {
        slidesPerView: 3
    },
}
</script>
