<template>
    <swiper :loop="true" :effect="'fade'" dir="ltr" :spaceBetween="50" :modules="[Navigation]" navigation
        class="feature-3 classic-feature arrow-image zoom-gallery color-7 lay-7">
        <swiper-slide class="ms-3" v-for="(item, index) in feature_product" :key="index">
            <div data-title="classic-image1" class="feature-style">
                <div class="feature-wrap">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5">
                            <div class="feature-image">
                                <nuxt-link to="javascript:void(0)" class="zoom bg-size background"
                                    :style="'background-image:url(' + item.img + ')'">
                                    <div class="feature-overlay" @click="showsingle(item.img)">
                                        <span>+</span>
                                    </div>
                                    <img :src="item.img" class="bg-img d-none" alt="" />
                                </nuxt-link>
                                <span class="label label-solid label-lg label-flat color-7">
                                    {{ "Featured" }}
                                </span>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="feature-content">
                                <div class="details">
                                    <h3>
                                        <nuxt-link to="/">{{ item.title }}</nuxt-link>
                                    </h3>
                                    <span>{{ item.details }}</span>
                                    <p class="font-roboto">{{ item.moreDetails }}</p>
                                </div>
                                <ul class="detail-list">
                                    <li>
                                        <div class="d-flex">
                                            <span class="label label-light label-flat color-7 label-lg">{{
                                                item.bedroom }}</span>
                                            <h6>{{ "Bedroom" }}</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <span
                                                class="label label-light label-flat color-7 label-lg">{{ item.bathroom }}</span>
                                            <h6>{{ "Bathroom" }}</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="label label-light label-flat color-7 label-lg">{{ item.sqft }} Sq
                                            Ft</span>
                                    </li>
                                </ul>
                                <ul class="feature-price">
                                    <li>
                                        <h3>${{ item.price }}</h3>
                                        <h6>{{ "Home For Sale" }}</h6>
                                    </li>
                                    <li>
                                        <nuxt-link :to="'/property/single-property-8/' + item.id"
                                            class="btn btn-solid color-7 btn-flat" @click="getimg(item.img)"
                                            tabindex="0">{{ 'submit Details' }}</nuxt-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </swiper-slide>
    </swiper>
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { Navigation } from "swiper";
import "swiper/css/effect-fade";
import type {product2} from "~/static/data/types/product2";
interface FetchResponse {
    data: {
        value: {
            FeaturedPropertyInCorporateLayout: product2[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/property.json')
let feature_product: product2[] = data.value.FeaturedPropertyInCorporateLayout;
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string>('')

function showsingle(img: string) {
    imgs.value = img
    visible.value = true
}
function handleHide() {
    visible.value = false
}
function getimg(value: string) {
    let img = useCookie('img')
    img.value = value
}
</script>
