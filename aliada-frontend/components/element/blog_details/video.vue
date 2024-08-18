<template>
    <div class="col-xl-9 col-lg-8">
        <div class="blog-single-detail theme-card" v-for="(item, index) in alldata" :key="index">
            <div class="blog-detail-image">
                <div class="play-bg-image">
                    <div class="bg-size setbackimg" style="background-image:url(/image/parallax/4.jpg)">
                        <img src="/image/parallax/4.jpg" class="bg-img d-none" alt="">
                    </div>
                    <div class="icon-video">
                        <nuxt-link to="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#videomodal">
                            <i class="fas fa-play"></i>
                        </nuxt-link>
                    </div>
                </div>
            </div>
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
    <teleport to='body'>
        <Transition name="modals">
            <ElementModelsVideo id="videomodal" />
        </Transition>
    </teleport>
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
interface FetchResponse {
    data: {
        value: {
            blogdetails: Details[];
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/blogpage.json')
let alldata: Details[] = data.value.blogdetails
</script>

<style scoped></style>