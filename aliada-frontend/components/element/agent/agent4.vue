<template>
    <swiper :breakpoints="breakpoints" :slidesPerView="4" :loop="true" :spaceBetween="50" class="about-3 arrow-gradient arrow-right">
        <swiper-slide  v-for="(item , index) in alldata" :key="index">
            <div class="about-box wow fadeInUp">
                <div class="bg-size agent-image background" :style="'background-image:url('+item.img+')'">
                    <img :src="item.img" class="bg-img d-none" alt="">
                    <div class="overlay-agent">
                        <div class="agent-details">
                            <nuxt-link to="/agent/agent-profile"><h6 class="d-flex">{{ item.name }}<span class="label-heart color-4 ms-2"><i
                                        class="fas fa-heart"></i></span></h6></nuxt-link>
                            <h5>{{ item.title }}</h5>
                            <p class="font-roboto">{{ item.details }}</p>
                            <span class="font-roboto">{{ item.email }}</span>
                            <ul>
                                <li v-for="(item , index) in icons" :key="index"><nuxt-link :to="item.link" tabindex="0"><img :src="item.src" alt=""></nuxt-link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>

<script lang="ts" setup>
import {useurl} from '~/composable/apiurl'
let {data} = await useFetch(useurl+'/data/clientAgent.json')
let {data:icon} = await useFetch(useurl+'/data/about.json')
interface agent{
    img:string;
    name:string;
    title:string;
    details:string;
    email:string;
}
interface icons{
    src:string;
    link:string;
}
interface FetchResponse {
    data:{
        value: {
            OurAgentInClassicLayout: agent[];
            icons: icons[];
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let alldata:agent[] = data.value.OurAgentInClassicLayout;
let icons = icon.value.icons
let breakpoints={
    320:{
        slidesPerView: 1
    },
    768:{
        slidesPerView: 2
    },
    992:{
        slidesPerView: 3
    },
    1400:{
        slidesPerView: 4
    },
}

</script>

<style lang="scss" scoped>

</style>