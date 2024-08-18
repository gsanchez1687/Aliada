<template>
    <section class="about-main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-2">
                        <h2>About Us</h2>
                        <p class="font-roboto">Elegant retreat in Coral Gables setting. This home provides entertaining
                            spaces with
                            kitchen opening</p>
                    </div>
                    <div class="user-about">
                        <div class="row">
                            <div class="col-xl-7 col-lg-5">
                                <div class="about-image">
                                    <div class="img-box side-left">
                                        <img src="/image/about/6.jpg" class="img-fluid" alt="">
                                        <div class="side-effect"></div>
                                    </div>
                                    <div class="img-box img-abs side-right">
                                        <img src="/image/about/5.jpg" class="img-fluid" alt="">
                                        <div class="side-effect"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-7">
                                <div class="about-content">
                                    <h3>We are the expert of team communication</h3>
                                    <p class="font-roboto">Residences can be classified by and how they are connected to
                                        neighbouring residences and land.
                                        Different types of housing tenure can be used for the same physical type </p>
                                </div>
                                <div class="about-listing">
                                    <ul>
                                        <li v-for="(item, index) in alllisting" :key="index">
                                            <h4>{{ item.total }}</h4>
                                            <p>{{ item.name }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <PageOtherpagesAboutus2Services />
    <PageOtherpagesAboutus2Agent />
    <div class="bg-light">
        <PageOtherpagesAboutus2Happyclient />
    </div>
    <div class="default-bg-white">
        <PageOtherpagesAboutus2Blog />
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Listing {
    total: string,
    name: string
}
interface FetchResponse {
    data: {
        value: {
            listing: Listing[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/aboutus.json')
let alllisting: Listing[] = data.value.listing
</script>

<style scoped></style>