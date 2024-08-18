<template>
    <div class="property-2 row column-space">
        <div class="col-xl-4 col-md-6 fadeInup" v-for="(item, index) in listingdata" :key="index">
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
                <ElementPropertyDetails :item="item" color="color-2" />
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
import { Navigation, Pagination } from 'swiper'
import type {rent} from '~/static/data/types/letestforrent'
interface FetchResponse {
    data: {
        value: {
            LatestPropertyData: rent[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/property.json')
let fill = ref<rent[]>([])
let listingdata = <rent[]>data.value.LatestPropertyData
let store = useSidebarfilterStore();
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

<style lang="scss" scoped></style>
