<template>
    <section class="ratio2_1 bg-light blog-inner">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-2">
                        <h2>Latest Blog</h2>
                        <p class="font-roboto">Elegant retreat in Coral Gables setting. This home provides entertaining
                            spaces with
                            kitchen opening</p>
                    </div>
                    <swiper :breakpoints="breakpoints" :slidesPerView="3" :loop="true" :spaceBetween="70"
                        class="blog-2 blog-grid">
                        <swiper-slide v-for="(item, index) in allblog" :key="index">
                            <div class="blog-wrap">
                                <div class="blog-image">
                                    <div class="background bg-size" :style="'background-image:url(' + item.src + ')'">
                                        <img :src="item.src" class="bg-img img-fluid d-none" alt="">
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
                                        <Icon name="ph:map-pin" /> {{ item.location }}
                                    </span>
                                    <h3><nuxt-link to="/page/blog_details/left-sidebar">{{ item.title }}</nuxt-link></h3>
                                    <p class="font-roboto">{{ item.desc }}</p>
                                    <nuxt-link to="/page/blog_details/left-sidebar">read more</nuxt-link>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Blog {
    src: string,
    date: string,
    month: string,
    location: string,
    title: string,
    desc: string
}
interface FetchResponse {
    data: {
        value: {
            blog: Blog[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/aboutus.json')
let allblog: Blog[] = data.value.blog
let breakpoints = {
    0: {
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

<style scoped></style>