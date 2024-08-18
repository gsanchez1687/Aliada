<template>
    <swiper :breakpoints="breakpoints" v-bind="setting" class="about-2 about-wrap">
        <swiper-slide v-for="(item, index) in about" :key="index">
            <div class="about-content">
                <div class="about-image">
                    <div class="bg-size background" :style="'background-image:url(' + item.img + ')'">
                        <img :src="item.img" class="img-fluid bg-img d-none" alt="">
                    </div>
                    <div class="about-overlay"></div>
                    <div class="overlay-content">
                        <ul>
                            <li v-for="(icon, index) in social" :key="index"><nuxt-link :to="icon.link"><img :src="icon.src"
                                        alt=""></nuxt-link></li>
                        </ul>
                        <span>{{ "Connect" }}</span>
                    </div>
                </div>
                <div class="our-details items-mb">
                    <nuxt-link to="/agent/agent-profile">
                        <h6 class="d-flex">{{ item.name }} <span class="label-heart  ms-2" :class="color"><i
                                    class="fas fa-heart"></i></span></h6>
                    </nuxt-link>
                    <h3>{{ item.work }}</h3>
                    <span class="font-roboto">
                        <Icon name="material-symbols:mail-outline-rounded"></Icon> {{ item.email }}
                    </span>
                    <p class="font-roboto">{{ item.details }}</p>
                    <nuxt-link to="/agent/agent-profile" class="btn btn-solid btn-flat  mt-2" :class="color">
                        <Icon name="ic:baseline-remove-red-eye"></Icon>{{ 'View Portfolio' }}
                    </nuxt-link>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import type {agent} from '~/static/data/types/agent'
import { Autoplay } from 'swiper';
interface icon {
    src: string;
    link: string
}
interface FetchResponse {
    data: {
        value: {
            OurAgentInCorporateLayout: agent[];
            icons: icon[];
        }
    }
}
defineProps({
    color: String
})
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/clientAgent.json')
let { data: icons } = await useFetch(useurl + '/data/about.json')
let about: agent[] = data.value.OurAgentInCorporateLayout
let social: icon[] = icons.value.icons
let setting = {
    loop: true,
    slidesPerView: 3,
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
    },
    modules: [Autoplay],
    spaceBetween: 50
}
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    768: {
        slidesPerView: 2
    },
    1200: {
        slidesPerView: 3
    }
}
</script>

<style lang="scss" scoped></style>