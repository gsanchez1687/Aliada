<template>
    <div class="col-xl-3 col-lg-4">
        <div class="left-sidebar single-sidebar sticky-cls">
            <div class="filter-cards">
                <div class="advance-card">
                    <h6>Request exploration</h6>
                    <div class="category-property">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <input placeholder="phone number" class="form-control" name="mobnumber" id="tbNumbers"
                                    type="tel" maxlength="9" required>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-gradient color-2 btn-block btn-pill">Submit
                                Request</button>
                        </form>
                    </div>
                </div>
                <div class="advance-card feature-card">
                    <h6>Featured</h6>
                    <swiper :loop="true" class="feature-slider">
                        <swiper-slide v-for="(item, index) in Feature" :key="index" class="bg-size background"
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
                            <li v-for="(item, index) in added" :key="index">
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
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Added {
    title: string;
    img: string;
    price: string;
}
interface Feature {
    src: string;
    title: string;
    price: string;
}
interface FetchResponse {
    data: {
        value: {
            added: Added[]
            feature: Feature[]
        }
    }
}
const { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json');
const Feature: Feature[] = single.value.feature
const { data }: FetchResponse = await useFetch(useurl + '/data/left-sidebar-filter.json');
const added: Added[] = data.value.added;
</script>

<style scoped></style>