<template>
    <div class="col-xl-9 col-lg-8">
        <div class="blog-single-detail theme-card" v-for="(item, index) in alldata" :key="index">
            <swiper :loop="true" class="property-slider">
                <swiper-slide v-for="(img, index) in allimg" :key="index">
                    <nuxt-link to="javascript:void(0)" :style="'background-image:url(' + img.src + ')'"
                        class="bg-size setbackimg">
                        <img :src="img.src" class="bg-img img-fluid d-none" />
                    </nuxt-link>
                </swiper-slide>
            </swiper>
            <div class="blog-title">
                <ul class="post-detail">
                    <li>{{ item.date }}</li>
                    <li>{{ item.by }}</li>
                    <li><i class="fa fa-heart me-2"></i>{{ item.hits }} Hits</li>
                    <li><i class="fa fa-comments me-2"></i>{{ item.comment }} Comment</li>
                </ul>
                <h3>{{ item.title }}</h3>
            </div>
            <div class="details-property">
                <div class="row">
                    <p class="col-xl-4">{{ item.detail }}</p>
                    <p class="col-xl-4">{{ item.detail2 }}</p>
                    <p class="col-xl-4">{{ item.detail3 }}</p>
                </div>
            </div>
            <ElementBlogDetailsComment />
            <div class="leave-comment comment-section">
                <h4>leave a comment</h4>
                <form class="review-form">
                    <div class="row gx-3">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Enter Your Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" placeholder="Enter Your Email" required>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" placeholder="Leave a Comment"></textarea>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-gradient color-2 btn-flat">Post
                            Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Details {
    src: string,
    date: string,
    by: string,
    hits: number,
    comment: number,
    title: string,
    detail: string,
    detail2: string,
    detail3: string,
}
interface Gallery {
    src: string
}
interface FetchResponse {
    data: {
        value: {
            blogdetails: Details[];
            gallery: Gallery[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/blogpage.json')
let alldata: Details[] = data.value.blogdetails
let allimg: Gallery[] = data.value.gallery
</script>

<style scoped></style>