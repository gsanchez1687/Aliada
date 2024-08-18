<template>
    <section class="about-section slick-between about-inner ratio_square">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-2">
                        <h2>Meet our Agent</h2>
                        <p>Discover New York’s best things to do, restaurants, theatre, nightlife and more</p>
                    </div>
                    <swiper :breakpoints="breakpoints" :loop="true" :slidesPerView="2" :spaceBetween="50" navigation
                        :modules="setting" class="about-1 about-wrap">
                        <swiper-slide style="width:100%; display:inline-block" v-for="item in ALl_Agents" :key="item">
                            <div class="about-content row">
                                <div class="col-xl-6">
                                    <div class="about-image">
                                        <img :src="item.img" class="img-fluid" alt="">
                                        <div class="about-overlay"></div>
                                        <div class="overlay-content">
                                            <ul>
                                                <li v-for="(icon, index) in Icons" :key="index">
                                                    <nuxt-link :to="icon.link">
                                                        <img :src="icon.src" alt="">
                                                    </nuxt-link>
                                                </li>
                                            </ul>
                                            <span>{{ 'Connect' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="our-details">
                                        <nuxt-link to="/agent/agent-profile">
                                            <h6 class="d-flex">{{ item.name }}<span class="label-heart color-2 ms-2">
                                                    <Icon name="mdi:cards-heart-outline" />
                                                </span></h6>
                                        </nuxt-link>
                                        <h3>{{ item.work }}</h3>
                                        <span class="font-roboto">
                                            <Icon name="mdi:cards-heart-outline" class="me-1" />
                                            {{ item.email }}
                                        </span>
                                        <p class="font-robot">{{ item.detail }}</p>
                                        <nuxt-link to="/agent/agent-profile" class="btn btn-gradient btn-pill color-2 mt-2">
                                            <Icon name="mdi:eye" />
                                            {{ 'view Portfolio' }}
                                        </nuxt-link>
                                    </div>
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
import { Navigation } from 'swiper'
interface Agent {
    img: string;
    name: string;
    email: string;
    work: string;
    detail: string;
}
interface Icon {
    link: string;
    src: string
}
interface FetchResponse {
    data: {
        value: {
            MeetOurAgent: Agent[];
            icons: Icon[]
        }
    }
}
let setting = [Navigation]
let { data }: FetchResponse = await useFetch(useurl + '/data/clientAgent.json')
const ALl_Agents: Agent[] = data.value.MeetOurAgent
let { data: icons }: FetchResponse = await useFetch(useurl + '/data/about.json');
const Icons: Icon[] = icons.value.icons
let breakpoints = {
    0: {
        slidesPerView: 1
    },
    768: {
        slidesPerView: 2
    },
}
</script>

<style scoped></style>