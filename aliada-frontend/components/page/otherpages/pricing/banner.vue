<template>
    <section class="banner-section layout2-bg parallax-image">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="banner-2 ratio2_3">
                        <div class="row">
                            <div class="col-xl-7 col-lg-6">
                                <div class="mobile-image bg-size background"
                                    style="background-image:url(/image/mobile-bg.png)">
                                    <img src="/image/mobile-bg.png" class="bg-img d-none" />
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 offset-lg-0 col-md-7 offset-md-5">
                                <div class="banner-right">
                                    <h6>{{ banners[0].content }}</h6>
                                    <h2>{{ banners[0].title }}</h2>
                                    <p class="font-roboto">{{ banners[0].details }}</p>
                                    <div class="button-banner">
                                        <nuxt-link to="https://play.google.com/"
                                            class="btn btn-gradient btn-pill color-2"><img src="/image/playstore.png" alt=""
                                                class="me-1">{{ ' Play Store' }}</nuxt-link>
                                        <nuxt-link to="https://appstoreconnect.apple.com"
                                            class="btn btn-light-bg btn-pill color-2"> <img src="/image/app-icon.png" alt=""
                                                class="me-1"><span> {{ 'App Store' }}</span></nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
    
<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
interface Banner {
    content: string;
    title: string;
    details: string
}
interface FetchResponse {
    data: {
        value: {
            banner3: Banner[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/banner.json')
let banners: Banner[] = data.value.banner3
</script>
    
<style lang="scss" scoped></style>
    