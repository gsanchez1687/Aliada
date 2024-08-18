<template>
    <div class="desc-box">
        <div class="page-section">
            <h4 class="content-title">Reviews</h4>
            <div class="review">
                <div :class="item.class" v-for="(item, index) in Review_data" :key="index">
                    <div class="media">
                        <img :src="item.src" class="img-70" alt="">
                        <div class="media-body">
                            <h6>{{ item.title }}</h6>
                            <p>{{ item.date }}</p>
                            <p class="mb-0">{{ item.details }}</p>
                        </div>
                        <div class="rating">
                            <i v-for="(rat, index) in item.rating" :key="index" :class="rat"></i>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <h4 class="content-title">Write a Review</h4>
            <form class="review-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Comment"></textarea>
                </div>
                <nuxt-link to="/agent/submit-property" type="submit"
                    class="btn btn-gradient color-2 btn-pill">Submit</nuxt-link>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Review {
    class: string;
    src: string;
    title: string;
    date: string;
    rating: string;
    details: string;
}
interface FetchResponse {
    data: {
        value: {
            rewiew: Review[]
        }
    }
}
let { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json')
const Review_data: Review[] = single.value.rewiew
</script>

<style scoped></style>