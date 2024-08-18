<template>
    <div class="desc-box">
        <div class="page-section feature-dec" id="feature">
            <h4 class="content-title">features</h4>
            <div class="single-feature row">
                <div class="col-xxl-3 col-xl-4 col-6">
                    <ul>
                        <li v-for="(item, index) in Feature_one" :key="index">
                            <i :class="item.icon"></i>
                            {{ item.name }}
                        </li>
                    </ul>
                </div>
                <div class="col-xxl-3 col-xl-4 col-6">
                    <ul>
                        <li v-for="(item, index) in Feature_Two" :key="index">
                            <i :class="item.icon"></i>
                            {{ item.name }}
                        </li>
                    </ul>
                </div>
                <div class="col-xxl-3 col-xl-4 col-6">
                    <ul>
                        <li v-for="(item, index) in Feature_Three" :key="index">
                            <i :class="item.icon"></i>
                            {{ item.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Feature {
    icon: string,
    name: string;
}
interface FetchResponse {
    data: {
        value: {
            feature1: Feature[];
            feature2: Feature[];
            feature3: Feature[];
        }
    }
}
let { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json')
const Feature_one = single.value.feature1
const Feature_Two = single.value.feature2
const Feature_Three = single.value.feature3
</script>

<style scoped></style>