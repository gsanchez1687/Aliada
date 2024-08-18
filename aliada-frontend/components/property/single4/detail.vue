<template>
    <div class="desc-box">
        <div class="page-section" id="details">
            <h4 class="content-title">Property Details
                <nuxt-link
                    to="https://www.google.com/maps/place/New+York,+NY,+USA/@40.697488,-73.979681,8z/data=!4m5!3m4!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728?hl=en"
                    target="_blank">
                    <i class="fa fa-map-marker-alt"></i> view on map</nuxt-link>
            </h4>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <ul class="property-list-details">
                        <li v-for="(item, index) in List_One" :key="index"><span>{{ item.name }} :</span> {{ item.value }}
                        </li>

                    </ul>
                </div>
                <div class="col-md-6 col-xl-4">
                    <ul class="property-list-details">
                        <li v-for="(item, index) in List_Two" :key="index"><span>{{ item.name }} :</span> {{ item.value }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-xl-4">
                    <ul class="property-list-details">
                        <li v-for="(item, index) in List_Three" :key="index"><span>{{ item.name }} :</span> {{ item.value
                        }}</li>
                    </ul>
                </div>
            </div>
            <h4 class="content-title mt-4">Attachments</h4>
            <nuxt-link to="javascript:void(0)" class="attach-file"><i class="far fa-file-pdf"></i>Demo Property Document
            </nuxt-link>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface List {
    name: string;
    value: string;
}
interface FetchResponse {
    data: {
        value: {
            ul1: List[],
            ul2: List[],
            ul3: List[],
        }
    }
}
let { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json')
const List_One: List[] = single.value.ul1
const List_Two: List[] = single.value.ul2
const List_Three: List[] = single.value.ul3
</script>

<style scoped></style>