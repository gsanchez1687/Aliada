<template>
    <div class="property-2 row column-sm zoom-gallery property-label property-grid list-view">
        <div class="col-md-12" v-for="(item, index) in getdata()" :key="index">
            <div class="property-box ">
                <div class="property-image btn-color">
                    <swiper :loop="true" navigation :modules="[Navigation, Pagination]" :pagination="{ clickable: true }"
                        class="property-slider">
                        <swiper-slide v-for="(img, index) in item.img" :key="index">
                            <a href="javascript:void(0)" :style="'background-image:url(' + img + ')'"
                                class="bg-size background">
                                <img :src="img" class="bg-img d-none" alt="">
                            </a>
                        </swiper-slide>
                    </swiper>
                    <div class="labels-left">
                        <div>
                            <span :class="item.label[0] == 'no fees' ? 'label-dark' : 'label-shadow'" class="label">{{
                                item.label[0] }}</span>
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
                        <nuxt-link to="javascript:void(0)" class="effect-round like added" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="wishlist" @click="wishlist(item)">
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
    <nav class="theme-pagination" v-if="props.data.length > parpagedata">
        <ul class="pagination">
            <li class="page-item">
                <nuxt-link class="page-link" to="javascript:void(0)" aria-label="Previous" @click="currentpage--">
                    <span aria-hidden="true">«</span>
                </nuxt-link>
            </li>
            <li class="page-item" :class="currentpage == page ? 'active' : ''" v-for="(page, index) in  totalpage"
                :key="index">
                <nuxt-link class="page-link" to="javascript:void(0)" @click="pageview(page)">{{ page }}</nuxt-link>
            </li>
            <li class="page-item">
                <nuxt-link class="page-link" to="javascript:void(0)" aria-label="Next" @click="currentpage++">
                    <span aria-hidden="true">»</span>
                </nuxt-link>
            </li>
        </ul>
    </nav>
</template>

<script setup lang="ts">
import type {rent} from '~/static/data/types/letestforrent'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
import { Navigation, Pagination } from 'swiper'
interface MyProps {
    data: rent[]
}
let props = defineProps<MyProps>()
let fill = ref<rent[]>([])
let parpagedata = ref<number>(6)
let currentpage = ref<number>(1)
let totalpage: number = Math.ceil(props.data.length / parpagedata.value)
let compareproduct = ref<rent[]>([])
let store = useSidebarfilterStore();
let favproduct = ref<rent[]>([])
function compare(value: rent) {
    compareproduct.value.push(value)
    store.compare(compareproduct.value)
}
function wishlist(value: rent) {
    favproduct.value.push(value)
    store.wishlist(favproduct.value)
}
function getdata() {
    let start = (currentpage.value - 1) * parpagedata.value;
    let end = start + parpagedata.value
    return props.data.slice(start, end)
}
function pageview(page: number) {
    currentpage.value = page
}
onMounted(() => {
    if (!process.client) return;
    let ParseData = localStorage.getItem('wishlist')
    if (ParseData) {
        fill.value = JSON.parse(ParseData)
    }
})
</script>

<style scoped></style>