<template>
    <section class="pb-0 horizontal-blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-2">
                        <h2>Horizontal Blog</h2>
                        <p>Discover New York’s best things to do, restaurants, theatre, nightlife and more</p>
                    </div>
                    <div class="blog-1">
                        <swiper :breakpoints="breakpoints" :loop="true" :modules="setting" navigation :spaceBetween="50">
                            <swiper-slide class="blog-box" v-for="(item, index) in alldata" :key="index">
                                <div class="img-box">
                                    <img :src="item.img" class="img-fluid" />
                                </div>
                                <div class="blog-content">
                                    <span>{{ item.date }}</span>
                                    <h3>
                                        <nuxt-link href="/page/blog_details/left-sidebar">{{ item.titles }}</nuxt-link>
                                    </h3>
                                    <p class="font-roboto"> {{ item.details }}</p>
                                    <nuxt-link to="/page/blog_details/left-sidebar"
                                        class="btn btn-gradient btn-pill color-2 btn-lg">read more</nuxt-link>
                                </div>
                            </swiper-slide>
                        </swiper>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <ModulesBlogSimple />
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { Navigation } from 'swiper'
interface Blog {
    img: string;
    titles: string;
    date: string;
    details: string;
}
interface FetchResponse {
    data: {
        value: {
            LatestBlogInEnterprise: Blog[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>
let setting = [Navigation]
let { data } = await useFetch(useurl + '/data/property.json')
let alldata: Blog[] = data.value.LatestBlogInEnterprise
let breakpoints = {
    992: {
        slidesPerView: 2
    }
}
</script>

<style lang="scss" scoped></style>