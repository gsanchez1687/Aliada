<template>
    <section class="about-main ratio_36">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-2">
                        <h2>About Us</h2>
                        <p class="font-roboto">Residences can be classified into different type of housing tenure can used
                            for same physical type.</p>
                    </div>
                    <div class="user-about">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7">
                                <div class="about-content">
                                    <h3>We are the <br />expert of communication</h3>
                                    <p class="font-roboto">Decoration is the furnishing of a space with decorative elements,
                                        sometimes complemented by advice and practical assistance. sometimes complemented by
                                        advice and practical assistance.</p>
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
                            <div class="col-xl-7 map-image col-lg-5 bg-size background"
                                style="background-image:url(/image/about/map.png)">
                                <img src="/image/about/map.png" class="img-fluid bg-img d-none" alt="">
                                <div class="marker-icons">
                                    <ul>
                                        <li v-for="(icon, index) in allicon" :key="index"><img class="img-fluid"
                                                :class="icon.class" :src="icon.src" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <PageOtherpagesAboutus1Whychoose />
    <PageOtherpagesAboutus1Happyclient />
    <PageOtherpagesAboutus1Blog />
    <PageOtherpagesAboutus1Brand />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Listing {
    total: string,
    name: string
}
interface Icon {
    src: string,
    class: string
}
interface FetchResponse {
    data: {
        value: {
            listing: Listing[]
            mapicon: Icon[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/aboutus.json')
let alllisting: Listing[] = data.value.listing
let allicon: Icon[] = data.value.mapicon
</script>

<style scoped></style>