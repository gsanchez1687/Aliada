<template>
    <swiper :loop="true" class="feature-4 modern-feature arrow-gradient mt-0">
        <swiper-slide v-for="(item, index) in alldata" :key="index">
            <div class="feature-wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="feature-image">
                            <nuxt-link to="javascript:void(0)" class=" background bg-size"
                                :style="'background-image:url(' + item.img + ')'">
                                <div class="feature-overlay">
                                    <span @click="showsingle(item.img)">+</span>
                                </div>
                                <img :src="item.img" class="bg-img d-none" alt="">
                            </nuxt-link>
                            <span class="label label-gradient label-lg color-4">
                                {{ 'Featured property' }}
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-content">
                            <div class="details">
                                <h3><nuxt-link to="/">{{ item.title }} </nuxt-link></h3>
                                <span>{{ item.place }}</span>
                                <p class="font-roboto">{{ item.details }}</p>
                            </div>
                            <ul class="detail-list">
                                <li>
                                    <div class="d-flex">
                                        <span class="label label-light color-2 label-lg">
                                            <img src="/image/icon/bed.png" class="img-fluid img-icon" alt="">
                                        </span>
                                        <h6>{{ 'Bedroom' }}</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <span class="label label-light color-2 label-lg">
                                            <img src="/image/icon/bathroom.png" class="img-fluid img-icon" alt="">
                                        </span>
                                        <h6>{{ 'Bathroom' }}</h6>
                                    </div>
                                </li>
                                <li>
                                    <span class="label label-light color-2 label-lg">{{ item.sqft }} m2</span>
                                </li>
                            </ul>
                            <ul class="feature-price">
                                <li>
                                    <h3>${{ item.price }}</h3>
                                    <h6>{{ 'Home For Sale' }}</h6>
                                </li>
                                <li><nuxt-link :to="'/property/single-property-8/' + item.id" @click="getimg(item.img)"
                                        class="btn btn-gradient color-4 btn-lg">submit property</nuxt-link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </swiper-slide>
    </swiper>
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import VueEasyLightbox from 'vue-easy-lightbox'
import type {feature} from '~/static/data/types/feature4'
interface FetchResponse {
    data: {
        value: {
            FeaturedPropertyInClassicLayout: feature[]
        }
    }
}
let { data }:FetchResponse = await useFetch(useurl + '/data/property.json')
let alldata = <feature[]>data.value.FeaturedPropertyInClassicLayout
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

<style lang="scss" scoped></style>