<template>
    <div class="comment-section">
        <h4>comments:</h4>
        <div class="comment-box" v-for="(item, index) in alldata" :key="index">
            <div class="media">
                <img :src="item.src" class="img-fluid" alt="">
                <div class="media-body">
                    <div class="comment-title">
                        <div class="comment-user">
                            <i class="fa fa-user"></i>
                            <h6>{{ item.username }}</h6>
                        </div>
                        <div class="comment-date">
                            <i class="fas fa-clock"></i>
                            <h6> {{ item.date }}</h6>
                        </div>
                    </div>
                    <div class="comment-detail">
                        <p class="font-roboto">{{ item.detail }}</p>
                    </div>
                    <div class="text-end">
                        <a href="javascript:void(0)"><i class="fa fa-reply pe-2"></i> Reply</a>
                    </div>
                </div>
            </div>
            <div class="media inner-comment" v-for="(child, index) in item.children" :key="index">
                <img :src="child.src" class="img-fluid" alt="">
                <div class="media-body">
                    <div class="comment-title">
                        <div class="comment-user">
                            <i class="fa fa-user"></i>
                            <h6>{{ child.username }}</h6>
                        </div>
                        <div class="comment-date">
                            <i class="fas fa-clock"></i>
                            <h6> {{ child.date }}</h6>
                        </div>
                    </div>
                    <div class="comment-detail">
                        <p class="font-roboto">{{ child.detail }}</p>
                    </div>
                    <div class="text-end">
                        <a href="javascript:void(0)"><i class="fa fa-reply pe-2"></i> Reply</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import type {comment} from '~/static/data/types/comment';
interface FetchResponse {
    data: {
        value: {
            comment: comment[];
        }
    }
}
let { data }:FetchResponse = await useFetch(useurl + '/data/blogpage.json')
let alldata: comment[] = data.value.comment
</script>

<style scoped></style>