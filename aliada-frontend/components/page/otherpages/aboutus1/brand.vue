<template>
    <section class="small-section  brand-wrap">
        <div class="container">
            <div class="row">
                <div class="col">
                    <swiper :loop="true" :slidesPerView="6" :spaceBetween="70" class="slide-2 brand-slider">
                        <swiper-slide v-for="(item, index) in alldata" :key="index">
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
import { useurl } from '~/composable/apiurl'
interface Brand {
    src: string;
}
interface FetchResponse {
    data: {
        value: {
            brand3: Brand[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/brand.json')
let alldata: Brand[] = data.value.brand3
</script>

<style lang="scss" scoped></style>