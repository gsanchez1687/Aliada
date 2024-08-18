<template>
    <div class="blog-1">
        <swiper :breakpoints="breakpoints" :loop="true" :modules="setting" navigation :slidesPerView="2" :spaceBetween="50">
            <swiper-slide class="blog-box" v-for="(item, index) in alldata" :key="index">
                <div class="img-box">
                    <img :src="item.img" class="img-fluid" />
                </div>
                <div class="blog-content">
                    <span>{{ item.date }}</span>
                    <h3>
                        <a href="/page/blog_details/left-sidebar">{{ item.titles }}</a>
                    </h3>
                    <p class="font-roboto"> {{ item.details }}</p>
                    <nuxt-link href="/page/blog_details/left-sidebar" class="btn btn-gradient btn-pill color-2 btn-lg">read
                        more</nuxt-link>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { Navigation } from 'swiper'
interface blog {
    img: string;
    titles: string;
    date: string;
    details: string;
}
interface FetchResponse {
    data: {
        value: {
            LatestBlogInEnterprise: blog[];
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let setting = [Navigation]
let { data } = await useFetch(useurl + '/data/property.json')
let alldata: blog[] = data.value.LatestBlogInEnterprise
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    992: {
        slidesPerView: 2
    },
}
</script>

<style lang="scss" scoped></style>