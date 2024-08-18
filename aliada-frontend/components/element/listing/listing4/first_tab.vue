<template>
    <div class="tab-content" id="top-tabContent">
        <div class="tab-pane fade" :class="props.data == 1 ? 'active show' : ''" id="prty-1">
            <div class="row list-property column-space no-slider-property">
                <div class="col-xl-4 col-lg-6" v-for="(item, index) in alldata.slice(0, 6)" :key="index">
                    <div class="property-box">
                        <div class="property-image">
                            <a href="javascript:void(0)" class="bg-size background"
                                :style="'background-image:url(' + item.img + ')'">
                                <img :src="item.img" class="bg-img d-none" alt="">
                            </a>
                            <div class="overlay-property">
                                <div class="overlay-box">
                                    <h4>{{ item.title }}</h4>
                                    <p class="font-roboto">{{ item.title }}</p>
                                    <nuxt-link :to="'/property/single-property-8/' + item.id" @click="getimg(item.img)"
                                        tabindex="0">{{ 'view Details' }}</nuxt-link>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <span class="label label-gradient label-lg color-4">${{ item.price }}*</span>
                        </div>
                        <div class="property-details">
                            <ul class="icon-property">
                                <li v-for="(i, index) in AllIcons.slice(0, 2)" :key="index">
                                    <div class="d-flex">
                                        <div class="property-icon color-4">
                                            <svg class="property-svg">
                                                <use :xlink:href="i.icon"></use>
                                            </svg>
                                        </div>
                                        <span v-if="i.name == 'home'">{{ item[i.name] }}</span>
                                        <span v-else>{{ item[i.name] }} m2</span>
                                    </div>
                                </li>
                            </ul>
                            <ul class="icon-property mb-0">
                                <li v-for="(i, index) in AllIcons.slice(2, 4)" :key="index">
                                    <div class="d-flex">
                                        <div class="property-icon color-4">
                                            <svg class="property-svg">
                                                <use :xlink:href="i.icon"></use>
                                            </svg>
                                        </div>
                                        <span v-if="i.name == 'rooms'">{{ item[i.name] }} Rooms</span>
                                        <span v-else>{{ item[i.name] }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import type {list} from '~/static/data/types/classiclist'
interface Classic {
    icon: string;
    name: string;
}
interface FetchResponse {
    data: {
        value: {
            ListingPropertyInClassicLayout: list[]
            classic: Classic[]
        }
    }
}
let props = defineProps({
    data: Number
})
let { data }:FetchResponse = await useFetch(useurl + '/data/property.json')
let { data: icon }:FetchResponse = await useFetch(useurl + '/data/looking-icon.json')
let AllIcons: Classic[] = icon.value.classic
let alldata: list[] = data.value.ListingPropertyInClassicLayout
function getimg(value: string) {
    let img = useCookie('img')
    img.value = value
}
</script>

<style lang="scss" scoped></style>