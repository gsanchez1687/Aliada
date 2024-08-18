<template>
    <div class="feature-wrap banner-margin">
        <div class="row">
            <div class="col-lg-5">
                <swiper :modules="setting" navigation :pagination="{ clickable: true }" :loop="true"
                    class="feature-image property-slider mb-0">
                    <swiper-slide v-for="(image, index) in bannerdata.img" :key="index">
                        <nuxt-link to="javascript:void(0)" :style="'background-image:url(' + image + '); height:447px'"
                            class="background bg-size">
                            <img :src="image" class="bg-img d-none" alt="">
                        </nuxt-link>
                    </swiper-slide>
                </swiper>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="feature-content">
                    <div class="details">
                        <h3>
                            <nuxt-link to="/property/single-property-8">
                                <span>{{ bannerdata.title1 }}</span>{{ bannerdata.place }}
                            </nuxt-link>
                        </h3>
                        <span>{{ bannerdata.address }}</span>
                        <p class="font-roboto">{{ bannerdata.details }}</p>
                    </div>
                    <ul class="detail-list">
                        <li v-for="(icon, index) in bannerimg" :key="index">
                            <div class="d-flex">

                                <span class="label label-light color-2 label-lg">
                                    <img :src="icon.img" alt="">
                                </span>
                                <h6>{{ icon.name }}</h6>
                            </div>
                        </li>
                        <li>
                            <span class="label label-light color-2 label-lg">{{ bannerdata.sqft }} {{ 'm2' }}</span>
                        </li>
                    </ul>
                    <ul class="feature-price">
                        <li>
                            <h3>${{ bannerdata.price }}</h3>
                            <h6>{{ 'Home' }} {{ bannerdata.propertyStatus }}</h6>
                        </li>
                        <li><nuxt-link to="/property/single-property-8" class="btn btn-gradient btn-pill color-2 btn-lg">{{
                            'View property' }}</nuxt-link></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { Navigation, Pagination } from 'swiper'
import type {type} from '~/static/data/types/propertyoftheday'
interface Icons {
    img: string;
    name: string
}
interface FetchResponse {
    data: {
        value: {
            PropertyOfTheDay: type;
            icon: Icons[];
        }
    }
}
let { data }:FetchResponse = await useFetch(useurl + '/data/property.json')
let { data: bannericon }:FetchResponse = await useFetch(useurl + '/data/banneroptionicon.json')
let bannerimg: Icons[] = bannericon.value.icon
const bannerdata: type = data.value.PropertyOfTheDay
let setting = [Navigation, Pagination]
</script>

<style lang="scss" scoped></style>