<template>
    <div class="bottom-blog">
        <div>
            <swiper :breakpoints="breakpoints" :slides-per-view="3" :loop="true" class="footer-slider">
                <swiper-slide v-for="item in Blog_Data" :key="item">
                    <div class="media">
                        <nuxt-link :to="item.link">
                            <div class="img-overlay">
                                <img :src="item.img" alt="">
                            </div>
                        </nuxt-link>
                        <div class="media-body">
                            <h6>
                                <nuxt-link :to="item.link">
                                    {{ item.title }}
                                </nuxt-link>
                            </h6>
                            <P class="font-roboto">
                                <nuxt-link :to="item.link2">
                                    {{ item.detail }}
                                </nuxt-link>
                            </P>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
interface Blog {
    img: string;
    link: string;
    link2: string;
    title: string;
    detail: string;
}
interface FetchResponse {
    data: {
        value: {
            blog: Blog[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/footer3.json')
const Blog_Data: Blog[] = data.value.blog
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    992: {
        slidesPerView: 2
    },
    1200: {
        slidesPerView: 3
    },
    1461: {
        slidesPerView: 2
    },

}
</script>

<style lang="scss" scoped></style>