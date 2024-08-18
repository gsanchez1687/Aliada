<template>
    <section class="ratio2_3 pb-0">
        <div class="container">
            <div class="title-2">
                <h2>ratio - "ratio2_3"</h2>
                <p>Add this class "ratio2_3" for this type of ratio</p>
            </div>
            <div class="row portfolio-section zoom-gallery-multiple gy-md-4 gy-3">
                <div class="grid-item col-lg-3 col-sm-6" v-for="(r23, index) in allratio23" :key="index">
                    <div class="grid-box">
                        <div class="overlay">
                            <div class="portfolio-image">
                                <nuxt-link to="javascript:void(0)" class="bg-size background"
                                    :style="'background-image:url(' + r23 + ')'" @click="showsingle">
                                    <img :src="r23" class="bg-img img-fluid d-none" alt="">
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ratio_square pb-0">
        <div class="container">
            <div class="title-2">
                <h2>ratio - "ratio_square"</h2>
                <p>Add this class "ratio_square" for this type of ratio</p>
            </div>
            <div class="row portfolio-section zoom-gallery-multiple gy-md-4 gy-3">
                <div class="grid-item col-lg-3 col-sm-6" v-for="(square, index) in allsquare" :key="index">
                    <div class="grid-box">
                        <div class="overlay">
                            <div class="portfolio-image">
                                <nuxt-link to="javascript:void(0)" class="bg-size background"
                                    :style="'background-image:url(' + square + ')'" @click="showsingle">
                                    <img :src="square" class="bg-img img-fluid d-none" alt="">
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ratio_portrait">
        <div class="container">
            <div class="title-2">
                <h2>ratio - "ratio_portrait"</h2>
                <p>Add this class "ratio_portrait" for this type of ratio</p>
            </div>
            <div class="row portfolio-section zoom-gallery-multiple gy-md-4 gy-3">
                <div class="grid-item col-lg-3 col-sm-6" v-for="(portrait, index) in allportrait" :key="index">
                    <div class="grid-box">
                        <div class="overlay">
                            <div class="portfolio-image">
                                <nuxt-link to="javascript:void(0)" class="bg-size background"
                                    :style="'background-image:url(' + portrait + ')'" @click="showsingle(index)">
                                    <img :src="portrait" class="bg-img img-fluid d-none" alt="">
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface FetchResponse {
    data: {
        value: {
            ratio23: string[]
            ratiosquare: string[]
            ratioportrait: string[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>
let { data } = await useFetch(useurl + '/data/image-ratio.json')
let allratio23: string[] = data.value.ratio23
let allsquare: string[] = data.value.ratiosquare
let allportrait: string[] = data.value.ratioportrait

let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string[]>([])

function showsingle(i: number) {
    index.value = i
    allratio23.forEach(item => {
        imgs.value.push(item)
    })
    allsquare.forEach(item => {
        imgs.value.push(item)
    })
    allportrait.forEach(item => {
        imgs.value.push(item)
    })
    visible.value = true
}
function handleHide() {
    visible.value = false
}
</script>
