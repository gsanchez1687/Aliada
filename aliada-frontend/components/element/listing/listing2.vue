<template>
    <div class="row column-space  no-slider-property">
        <div class=" col-md-6 wow fadInUp" :class="classes" v-for="(item, index) in property" :key="index">
            <div class="property-box">
                <div class="property-image">
                    <swiper :loop="true" :modules="setting" navigation :pagination="{ clickable: true }"
                        class="property-slider" :class="color">
                        <swiper-slide v-for="src in item.img" :key="src" :style="'background-image:url(' + src + ')'"
                            class="background">
                            <img :src="src" class="bg-img d-none" alt="">
                        </swiper-slide>
                    </swiper>
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
                    <span class="label label-white label-lg label-flat " :class="color">${{ item.price }}*</span>
                    <div class="labels-left">
                        <div>
                            <span :class="item.label[0] === 'no fees' ? 'label-dark' : 'label-shadow'"
                                class="label  label-flat">{{ item.label[0] }}</span>
                        </div>
                        <span v-if="item.label[1]" class="label label-success label-flat">{{ item.label[1] }}</span>
                    </div>
                </div>
                <ElementPropertyDetailsDetails2 :item="item" :color="color" />
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
import { Pagination, Navigation } from 'swiper'
import type {rent} from '~/static/data/types/letestforrent'
interface FetchResponse {
    data: {
        value: {
            PropertyListing: rent[]
        }
    }
}
let props = defineProps({
    classes: String,
    color: String
})
declare function useFetch(url: string): Promise<FetchResponse>;
let store = useSidebarfilterStore();
let { data } = await useFetch(useurl + '/data/property.json')
let PropertyListing: rent[] = data.value.PropertyListing
let setting = [Pagination, Navigation]
let fill = ref<rent[]>([])
let property = computed<rent[]>(() => {
    if (props.classes == 'col-xl-4') {
        return PropertyListing.slice(0, 6)
    }
    else {
        return PropertyListing
    }
})
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

