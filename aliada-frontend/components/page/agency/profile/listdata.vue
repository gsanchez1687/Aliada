<template>
    <div class="property-2 row column-sm zoom-gallery property-label property-grid" :class="lview">
        <ListingGridView2GridViewLeftSidebarFilterTag />
        <div class="wow fadeInUp" v-for="(item, index) in store.alllistdata" :key="index" :class="classes">
            <div class="property-box btn-color">
                <div class="property-image">
                    <swiper navigation :modules="[Navigation, Pagination]" :pagination="{ clickable: true }" :loop="true"
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
</template>

<script setup lang="ts">
import { Navigation, Pagination } from 'swiper'
import { useurl } from '~/composable/apiurl'
import type {rent} from '~/static/data/types/letestforrent'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
interface FetchResponse {
    data: {
        value: {
            LatestPropertyData: rent[]
        }
    }
}
defineProps({
    classes: String,
    lview: String
})
declare function useFetch(url: string): Promise<FetchResponse>
let fill = ref<rent[]>([])
let route = useRoute();
let router = useRouter();
let store = useSidebarfilterStore();
let { data } = await useFetch(useurl + '/data/property.json')
let alldata: rent[] = data.value.LatestPropertyData
let compareproduct = ref<rent[]>([])
let favproduct = ref<rent[]>([])
store.getdata(alldata)
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
    if (!process.client) return;
    const storedData = localStorage.getItem('wishlist');
    if (storedData) {
        try {
            fill.value = JSON.parse(storedData);
        } catch (error) {
            console.error('Error parsing wishlist data:', error);
        }
    }
})
onMounted(() => {
    store.setfilter()
})
</script>

<style scoped></style>