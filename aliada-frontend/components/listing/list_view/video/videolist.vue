<template>
    <div class="property-2 row column-sm property-label property-grid list-view no-sidebar">
        <div class="col-md-12 col-xl-6" v-for="(item, index) in getdata()" :key="index">
            <div class="property-box">
                <div class="property-image">
                    <swiper class="slider-for" :loop="true" :thumbs="{ swiper: thumbsSwiper }" :modules="setting">
                        <swiper-slide style="height:300px">
                            <video width="100%" height="100%" loop muted autoplay>
                                <source :src="item.video" type="video/mp4" />
                            </video>
                        </swiper-slide>
                        <swiper-slide v-for="(img, index) in item.img" :key="index" class="height">
                            <img :src="img" class="img-fluid img" alt="">
                        </swiper-slide>
                    </swiper>
                    <swiper @swiper="setThumbsSwiper" :loop="true" :slidesPerView="4" :freeMode="true" :modules="setting"
                        :watchSlidesProgress="true" class="slider-nav">
                        <swiper-slide v-for="(img, index) in item.img" :key="index">
                            <img :src="img" class="img-fluid" alt="">
                        </swiper-slide>
                    </swiper>
                    <div class="labels-left">
                        <div>
                            <span :class="item.label[0] == 'no fees' ? 'label-dark' : 'label-shadow'" class="label">{{
                                item.label[0] }}</span>
                        </div>
                        <span v-if="item.label[1]" class="label label-success">{{ item.label[1] }}</span>
                    </div>
                </div>
                <element-property-details :item="item" color="color-2" />
            </div>
        </div>
    </div>
    <nav class="theme-pagination" v-if="props.data.length > parpagedata">
        <ul class="pagination">
            <li class="page-item">
                <nuxt-link class="page-link" to="javascript:void(0)" aria-label="Previous" @click="currentpage--">
                    <span aria-hidden="true">«</span>
                </nuxt-link>
            </li>
            <li class="page-item" :class="currentpage == page ? 'active' : ''" v-for="(page, index) in  totalpage"
                :key="index"><nuxt-link class="page-link" to="javascript:void(0)" @click="pageview(page)">{{ page
                }}</nuxt-link></li>
            <li class="page-item">
                <nuxt-link class="page-link" to="javascript:void(0)" aria-label="Next" @click="currentpage++">
                    <span aria-hidden="true">»</span>
                </nuxt-link>
            </li>
        </ul>
    </nav>
</template>

<script setup lang="ts">
import { FreeMode, Navigation, Thumbs } from 'swiper';
import "swiper/css/free-mode"
import "swiper/css/navigation"
import "swiper/css/thumbs"
import type {rent} from '~/static/data/types/letestforrent'
interface MyProps {
    data: rent[]
}
let props = defineProps<MyProps>()
let thumbsSwiper = ref();
let setting = [FreeMode, Navigation, Thumbs]
const setThumbsSwiper = (swiper: null) => {
    thumbsSwiper.value = swiper;
}
let parpagedata = ref<number>(6)
let currentpage = ref<number>(1)
let totalpage: number = Math.ceil(props.data.length / parpagedata.value)
function getdata() {
    let start = (currentpage.value - 1) * parpagedata.value;
    let end = start + parpagedata.value
    return props.data.slice(start, end)
}
function pageview(page: number) {
    currentpage.value = page
}
</script>

<style scoped></style>