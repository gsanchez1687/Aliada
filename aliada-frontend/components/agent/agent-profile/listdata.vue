<template>
    <div class="property-2 row column-sm zoom-gallery property-label property-grid" :class="lview">
        <ListingGridView2GridViewLeftSidebarFilterTag />
        <div class="wow fadeInUp" v-for="(item, index) in store.alldata.data" :key="index" :class="classes">
            <div class="property-box">
                <div class="property-image btn-color">
                    <swiper :loop="true" :modules="modules" navigation :pagination="{ clickeble: true }"
                        class="property-slider">
                        <swiper-slide v-for="(img, index) in item.img" :key="index">
                            <nuxt-link to="javascript:void(0)" :style="'background-image:url(' + img + ')'"
                                class="background bg-size">
                                <img :src="img" class="bg-img d-none" alt="">
                            </nuxt-link>
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
                <ElementPropertyDetails :item="item" color="" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Navigation, Pagination } from 'swiper';
import { Swiper, SwiperSlide } from 'swiper/vue';
import type { rent } from '~/static/data/types/letestforrent';
import { usepropertyStore } from '~/store/propertysale';
interface FetchResponse {
    data: {
        value: {
            LatestPropertyData: rent[];
        };
    }
}
defineProps({
    classes: String,
    lview: String
})
declare function useFetch(url: string): Promise<FetchResponse>;
let route = useRoute();
let router = useRouter();
let store = usepropertyStore();
// let { data } = await useFetch(useurl + '/data/property.json')

// let alldata: any = data.value.LatestPropertyData
let fill = ref<rent[]>([])
let modules = [Navigation, Pagination]
let compareproduct = ref<rent[]>([])
let favproduct = ref<rent[]>([])
//store.getdata(alldata)
watch(store.filterobject, () => {
    return router.push({
        path: route.fullPath,
        query: { propertyStatus: store.filterobject.propertyStatus, propertyType: store.filterobject.propertyType, rooms: store.filterobject.rooms, bed: store.filterobject.bed, bath: store.filterobject.bath, agencies: store.filterobject.agencies }
    })
}, { deep: true })
watch(store.setfilter, () => {
    store.setfilter()
})
function compare(value: rent) {
    compareproduct.value.push(value)
    store.compare(compareproduct.value)
}
function wishlist(value: rent) {
    favproduct.value.push(value)
    store.wishlist(favproduct.value)
}
onMounted(() => {
    store.setfilter()
    if (!process.client) return
    let ParseData = localStorage.getItem('wishlist')
    if (ParseData)
        fill.value = JSON.parse(ParseData)
})
</script>

<style scoped></style>