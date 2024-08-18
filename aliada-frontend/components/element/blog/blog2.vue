<template>
    <swiper :breakpoints="breakpoints" v-bind="setting" class="blog-2">
        <swiper-slide v-for="item in blogs" :key="item">
            <div class="blog-wrap fadeInUp" :class="color">
                <div class="blog-image">
                    <div class="background bg-size" :style="'background-image:url(' + item.img + ')'">
                        <img :src="item.img" class="bg-img d-none img-fluid" alt="">
                    </div>
                    <div class="blog-label">
                        <div>
                            <h3>{{ item.date }}</h3>
                            <span>{{ item.month }}</span>
                        </div>
                    </div>
                </div>
                <div class="blog-details">
                    <span>
                        <Icon name="ph:map-pin" />{{ item.place }}
                    </span>
                    <h3><nuxt-link to="/page/blog_details/left-sidebar">{{ item.title }}</nuxt-link></h3>
                    <p class="font-roboto">{{ item.detail }}</p>
                    <nuxt-link to="/page/blog_details/left-sidebar">{{ 'read more' }}</nuxt-link>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { Autoplay } from 'swiper';
interface FetchResponse {
    data: {
        value: {
            LatestBlogInCorporate: blog[];
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/property.json')
interface blog {
    img: string;
    title: string;
    place: string;
    detail: string;
    date: number;
    month: string;
}
defineProps({
    color: String
})
let blogs: blog[] = data.value.LatestBlogInCorporate
let setting = {
    loop: true,
    slidesPerView: 3,
    spaceBetween: 50,
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
    },
    modules: [Autoplay],
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
    },
}
</script>

<style lang="scss" scoped></style>