<template>
    <div class="col-xl-3 col-md-6">
        <div class="footer-links">
            <h5 class="footer-title" @click="toggle = !toggle">
                {{ 'Our Latest Blog' }}
                <span class="according-menu">
                    <i :class="toggle ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                </span>
            </h5>
            <div class="footer-content" :class="toggle ? 'd-block' : 'd-none d-md-block'">
                <div class="footer-blog">
                    <div v-for="(item, index) in Blog_Data" :key="index" class="media">
                        <nuxt-link to="/">
                            <div class="img-overlay">
                                <img :src="item.img" />
                            </div>
                        </nuxt-link>
                        <div class="media-body">
                            <h6>
                                <nuxt-link to="/">
                                    {{ item.heading }}
                                </nuxt-link>
                            </h6>
                            <p class="font-roboto mb-0">
                                <nuxt-link to="/">
                                    {{ item.description }}
                                </nuxt-link>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Links {
    img: string;
    heading: string;
    description: string;
}
interface FetchResponse {
    data: {
        value: {
            blog: [Links]
        }
    }
}
const { data }: FetchResponse = await useFetch(useurl + '/data/footer1.json')
const Blog_Data: Links[] = data.value.blog
let toggle = ref<boolean>(false)
</script>

<style lang="scss" scoped></style>
