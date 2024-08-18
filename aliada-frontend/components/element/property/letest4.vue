<template>
    <swiper :breakpoints="breakpoints" :slidesPerView="3" :loop="true" :spaceBetween="50"
        class="property-4 arrow-gradient arrow-right list-property">
        <swiper-slide v-for="(item, index) in alldata" :key="index">
            <div class="property-box">
                <div class="property-image">
                    <nuxt-link to="javascript:void(0)" class="background bg-size"
                        :style="'background-image:url(' + item.img + ')'">
                        <img :src="item.img" alt="" class="bg-img d-none">
                    </nuxt-link>
                    <div class="overlay-property">
                        <div class="overlay-box">
                            <h4>{{ item.title }}</h4>
                            <p class="font-roboto">{{ item.details }}</p>
                            <nuxt-link :to="'/property/single-property-8/' + item.id" @click="getimg(item.img)">{{ 'View                                                          Details'}}</nuxt-link>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <span class="label label-gradient label-lg color-4">${{ item.price }}*</span>
                </div>
                <div class="property-details">
                    <ul class="icon-property">
                        <li v-for="(i, index) in Icons.slice(0, 2)" :key="index">
                            <div class="d-flex">
                                <div class="property-icon color-4">
                                    <svg class="property-svg">
                                        <use :xlink:href="i.icon"></use>
                                    </svg>
                                </div>
                                <span v-if="i.name == 'home'">{{ item[i.name] }}</span>
                                <span v-else>{{ item[i.name] }} m2</span>
                            </div>
                        </li>
                    </ul>
                    <ul class="icon-property mb-0">
                        <li v-for="(i, index) in Icons.slice(2, 4)" :key="index">
                            <div class="d-flex">
                                <div class="property-icon color-4">
                                    <svg class="property-svg">
                                        <use :xlink:href="i.icon"></use>
                                    </svg>
                                </div>
                                <span v-if="i.name == 'rooms'">{{ item[i.name] }} Rooms</span>
                                <span v-else>{{ item[i.name] }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>
<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import type {list} from '~/static/data/types/classiclist'
interface FetchResponse {
    data: {
        value: {
            LatestPropertyInClassicLayout: list[]
            classic: Icon[]
        }
    }
}
interface Icon {
    icon: string;
    name: string;
}
let { data: icon }:FetchResponse = await useFetch(useurl + '/data/looking-icon.json')
let Icons: Icon[] = icon.value.classic
let { data }:FetchResponse = await useFetch(useurl + '/data/property.json')
let alldata: list[] = data.value.LatestPropertyInClassicLayout
let breakpoints = {
    0: {
        slidesPerView: 1
    },
    992: {
        slidesPerView: 2
    },
    1200: {
        slidesPerView: 3
    },
}
function getimg(value: string) {
    let img = useCookie('img')
    img.value = value
}
</script>