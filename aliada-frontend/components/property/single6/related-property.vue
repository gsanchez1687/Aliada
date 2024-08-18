<template>
    <section class="property-section pt-0">
        <div class="container">
            <div class="title-3 text-start inner-title">
                <h2>Related Properties</h2>
            </div>
            <div class="row ratio_55">
                <div class="col-12 property-grid-3">
                    <div class="property-2 row column-sm zoom-gallery property-label property-grid">
                        <div class="col-md-6 sale grid-item wow fadeInUp" v-for="(item, index) in Releted_Product"
                            :key="index">
                            <div class="property-box ">
                                <div class="property-image btn-color">
                                    <swiper :loop="true" navigation :modules="[Navigation, Pagination]"
                                        :pagination="{ clickable: true }" class="property-slider">
                                        <swiper-slide v-for="(img, index) in item.img" :key="index">
                                            <a href="javascript:void(0)" :style="'background-image:url(' + img + ')'"
                                                class="bg-size background">
                                                <img :src="img" class="bg-img d-none" alt="">
                                            </a>
                                        </swiper-slide>
                                    </swiper>
                                    <div class="labels-left">
                                        <div>
                                            <span :class="item.label[0] == 'no fees' ? 'label-dark' : 'label-shadow'"
                                                class="label">{{ item.label[0] }}</span>
                                        </div>
                                        <span v-if="item.label[1]" class="label label-success">{{ item.label[1] }}</span>
                                    </div>
                                    <div class="seen-data">
                                        <Icon name="material-symbols:android-camera-outline" />
                                        <span>{{ '25' }}</span>
                                    </div>
                                    <div class="overlay-property-box">
                                        <nuxt-link to="javascript:void(0)" class="effect-round" data-bs-toggle="tooltip"
                                            data-bs-placement="left" title="compare" @click="compare(item)">
                                            <Icon name="material-symbols:shuffle" class="text-black" />
                                        </nuxt-link>
                                        <nuxt-link to="javascript:void(0)" class="effect-round like added"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist"
                                            @click="wishlist(item)">
                                            <Icon
                                                :name="fill?.find((ele) => ele.id == item.id) ? 'ph:heart-straight-fill' : 'ph:heart-straight-thin'"
                                                class="text-black" />
                                        </nuxt-link>
                                    </div>
                                </div>
                                <ElementPropertyDetails :item="item" color="color-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
 
<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
import type {rent} from '~/static/data/types/letestforrent'
import { Navigation, Pagination } from 'swiper'
interface FetchResponse {
    data: {
        value: {
            related2: rent[]
        }
    }
}
let compareproduct = ref<rent[]>([])
let store = useSidebarfilterStore();
let fill = ref<rent[]>([])
let { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json')
const Releted_Product: rent[] = single.value.related2
let favproduct = ref<rent[]>([])
function compare(value: rent) {
    compareproduct.value.push(value)
    store.compare(compareproduct.value)
}
function wishlist(value: rent) {
    favproduct.value.push(value)
    store.wishlist(favproduct.value)
}
onMounted(() => {
    if (!process.client) return
    let ParseData = localStorage.getItem('wishlist')
    if (ParseData) {
        fill.value = JSON.parse(ParseData)
    }
})
</script>
 
<style scoped></style>