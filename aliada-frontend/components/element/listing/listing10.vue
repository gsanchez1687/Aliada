<template>
    <div class="property-2 row column-space zoom-gallery property-grid list-view">
        <div class="col-xl-6 wow fadeInUp" v-for="(item, index) in listingdata" :key="index">
            <div class="property-box">
                <div class="property-image">
                    <a class="zoom bg-size background" :style="'background-image:url(' + item.img[0] + ')'"
                        @click="showsingle(item.img[0])">
                        <img :src="item.img[0]" class="bg-img d-none" alt="">
                    </a>
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
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
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
let listingdata = <rent[]>data.value.LatestPropertyData
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string>('')
let fill = ref<rent[]>([])
let store = useSidebarfilterStore();
let compareproduct = ref<rent[]>([])
let favproduct = ref<rent[]>([])
function showsingle(img: string) {
    imgs.value = img
    visible.value = true
}
function handleHide() {
    visible.value = false
}
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