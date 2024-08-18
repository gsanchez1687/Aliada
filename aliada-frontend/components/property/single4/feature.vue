<template>
    <div class="advance-card feature-card">
        <h6>Featured</h6>
        <swiper :loop="true" class="feature-slider">
            <swiper-slide v-for="(item, index) in Feature_data" :key="index" class="bg-size background"
                :style="'background-image:url(' + item.src + ')'">
                <img :src="item.src" class="bg-img d-none" alt="">
                <div class="bottom-feature">
                    <h5>{{ item.title }}</h5>
                    <h6>${{ item.price }} <small>/ start from</small></h6>
                </div>
            </swiper-slide>
        </swiper>
        <div class="labels-left">
            <span class="label label-success">featured</span>
        </div>
    </div>
    <div class="advance-card">
        <h6>Recently Added</h6>
        <div class="recent-property">
            <ul>
                <li v-for="(item, index) in Added" :key="index">
                    <div class="media">
                        <img :src="item.img" class="img-fluid" alt="">
                        <div class="media-body">
                            <h5>{{ item.title }}</h5>
                            <span>$ {{ item.price }} / <span>Month</span></span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="advance-card">
        <h6>Mortgage</h6>
        <div class="category-property">
            <form>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" placeholder="Loan Amount" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" placeholder="Down Payment" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">%</span>
                    <input type="number" class="form-control" placeholder="Rate of Interest" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" placeholder="Number Of years" required>
                </div>
                <button type="submit" class="btn btn-gradient color-2 btn-block btn-pill">Calculate</button>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Feature {
    src: string;
    title: string;
    price: string;
}
interface Added {
    img: string;
    title: string;
    price: string;
}
interface FetchResponse {
    data: {
        value: {
            feature: Feature[];
            added: Added[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/left-sidebar-filter.json')
const Feature_data = data.value.feature
let { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json')
const Added: Added[] = data.value.added


</script>

<style scoped></style>