<template>
    <swiper class="feature-1 arrow-light" :effect="'fade'" :loop="true" navigation :modules="[Navigation, EffectFade]"
        :slides-per-view="1" dir="ltr">
        <swiper-slide v-for="(item, index) in props.data" :key="index">
            <div class="feature-wrapper">
                <div class="row">
                    <div class="col-xl-4 col-lg-3">
                        <div class="feature-left">
                            <div class="property-details">
                                <span class="font-roboto">{{ item.city }}</span>
                                <nuxt-link :to="'/property/single-property-8/' + item.id" @click="getimg(item.img)">
                                    <h3 class="d-flex">
                                        {{ item.title }}
                                        <span><span class="label label-dark label-pill">{{ item.label }}</span></span>
                                    </h3>
                                </nuxt-link>
                                <h6 class="color-6"> ${{ item.price }}*</h6>
                                <p class="font-roboto">
                                    {{ item.description }}
                                </p>
                                <ul>
                                    <li v-for="(option, index) in options" :key="index">
                                        <img :src="option.src" class="img-fluid" alt="" />{{ option.name }} : {{
                                            item[option.key] }}
                                    </li>
                                </ul>
                                <nuxt-link to="/">
                                    <span class="round-half color-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-heart">
                                            <path
                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                            </path>
                                        </svg>
                                    </span>
                                </nuxt-link>
                                <div class="property-btn">
                                    <nuxt-link :to="'/property/single-property-8/' + item.id"
                                        class="btn btn-dashed btn-pill color-1" @click="getimg(item.img)"
                                        tabindex="0">{{ 'Details' }}</nuxt-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-9 order-md">
                        <div class="feature-image back-image" :style="'background-image: url(' + item.img + ')'">
                            <img :src="item.img" alt="" class="bg-img d-none" />
                            <h4>{{ item.type }}</h4>
                            <span class="box-color"></span>
                            <span class="signature">
                                <img src="/image/signature/1.png" alt="" />
                            </span>
                            <span class="label label-white label-lg color-1">{{ item.imgLabel }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>
    
<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { Navigation, EffectFade } from 'swiper'
import type {featureoption} from '~/static/data/types/fetureoption'
import type {product1} from '~/static/data/types/featureproperty'
interface FetchResponse {
    data: {
        value: {
            featureoption: featureoption[]
        }
    }
}
interface MyProps {
    data: product1[]
}
let props = defineProps<MyProps>()
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/letestforsaleoption.json')
let options: featureoption[] = data.value.featureoption;
function getimg(value: string) {
    let img = useCookie('img')
    img.value = value
}
</script>

<style scoped>.back-image {

    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;

}</style>
    