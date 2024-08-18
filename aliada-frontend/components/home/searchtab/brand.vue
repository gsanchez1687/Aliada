<template>
    <section class="small-section bg-light-blue arrow-gradient">
        <div class="container">
            <div class="row">
                <div class="col">
                    <swiper :breakpoints="breakpoints" navigation :modules="modules" :slidesPerView="5" :loop="true"
                        class="slide-3 brand-slider">
                        <swiper-slide v-for="(item, index) in Brand_Data" :key="index">
                            <a href="javascript:void(0)" class="logo-box">
                                <img :src="item.src" alt="" class="img-fluid">
                            </a>
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
import { Navigation } from 'swiper'
import { useurl } from '~/composable/apiurl'
interface Brand {
    src: string
}
interface FetchResponse {
    data: {
        value: {
            brand4: Brand[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>
let { data } = await useFetch(useurl + '/data/brand.json')
let Brand_Data: Brand[] = data.value.brand4
let modules = [Navigation]
let breakpoints = {
    320: {
        slidesPerView: 1
    },
    481: {
        slidesPerView: 2
    },
    768: {
        slidesPerView: 4
    },
    1199: {
        slidesPerView: 5
    },
}
</script>

<style lang="scss" scoped></style>