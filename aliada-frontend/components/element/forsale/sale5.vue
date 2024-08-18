<template>
    <div class="property-2 row column-space color-1 image-content-item">
        <div class="col-xl-4 col-md-6 wow fadeInUp" v-for="item in props.data" :key="item">
            <div class="property-box">
                <div class="property-image btn-color">
                    <swiper :loop="true" :space-between="0" :modules="setting" class="property-slider color-6"
                        :pagination="{ clickable: true }" navigation>
                        <swiper-slide v-for="img in item.img" :key="img">
                            <a href="javascript:void(0)" class="images" :style="'background-image: url(' + img + ');'">
                                <img :src="img" class="bg-img d-none" alt="" />
                            </a>
                        </swiper-slide>
                    </swiper>
                    <div class="labels-left">
                        <div>
                            <span :class="item.label[0] === 'no fees' ? 'label-dark' : 'label-shadow'" class="label">{{
                                item.label[0] }}</span>
                        </div>
                        <span v-if="item.label[1]" class="label label-success">{{ item.label[1] }}</span>
                    </div>
                    <div class="seen-data">
                        <Icon name="material-symbols:android-camera-outline" />
                        <span>10</span>
                    </div>
                    <div class="overlay-property-box">
                        <nuxt-link to="javascript:void(0)" class="effect-round" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="compare" @click="compare(item)">
                            <Icon name="material-symbols:shuffle" />
                        </nuxt-link>
                        <nuxt-link to="javascript:void(0)" class="effect-round like added" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="wishlist" @click="wishlist(item)">
                            <Icon
                                :name="fill?.find((ele) => ele.id == item.id) ? 'ph:heart-straight-fill' : 'ph:heart-straight-thin'"
                                class="text-black" />
                        </nuxt-link>
                    </div>
                </div>
                <ElementPropertyDetails :item="item" color="" />
            </div>
        </div>
    </div>
</template>
    
<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { Navigation, Pagination } from 'swiper';
import { useSidebarfilterStore } from '~/store/sidebarfilter'
import type {rent} from '~/static/data/types/letestforrent'
let props = defineProps({
    data: Object
})
let store = useSidebarfilterStore();
let fill = ref<rent[]>([])
let setting = [Navigation, Pagination]
let compareproduct = ref<rent[]>([])
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
    if (!process.client) return;
    const storedData = localStorage.getItem('wishlist');
    if (storedData) {
        try {
            const parsedData: rent[] = JSON.parse(storedData);
            fill.value = parsedData;
        } catch (error) {
            console.error('Error parsing wishlist data:', error);
        }
    }
})
</script>
    
<style scoped>
.images {
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    display: inline-block;
    width: 100%;
    height: 250px;
}
</style>
    