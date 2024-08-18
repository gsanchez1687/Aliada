<template>
    <div id="tabsContent" class="tab-content">
        <div id="morden" class="tab-pane fade " :class="props.content == 'Morden' ? 'show active' : ''">
            <div class="property-2 row column-space zoom-gallery">
                <div class="col-xl-4 col-md-6" v-for="(item, index) in props.data?.slice(0, 3)" :key="index">
                    <div class="property-box orange btn-color">
                        <swiper navigation :modules="[Navigation, Pagination]" :pagination="{ clickable: true }"
                            class="property-image">
                            <swiper-slide v-for="(img, index) in item.img" :key="index">
                                <nuxt-link to="javascript:void(0)" :style="'background-image:url(' + img + ')'"
                                    class="background bg-size">
                                    <img :src="img" alt="" class="bg-img d-none">
                                </nuxt-link>
                            </swiper-slide>
                            <div class="labels-left">
                                <div>
                                    <span class="label label-shadow">sale</span>
                                </div>
                            </div>
                            <div class="seen-data">
                                <Icon name="material-symbols:android-camera-outline" />
                                <span>09</span>
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
                        </swiper>
                        <ElementPropertyDetails :item="item" color="color-2" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { Navigation, Pagination } from 'swiper'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
import type {rent} from '~/static/data/types/letestforrent'
interface MyProps {
    data: rent[];
    content: string;
}
let props = defineProps<MyProps>()
let fill = ref<rent[]>([])
let modules = [Navigation]
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