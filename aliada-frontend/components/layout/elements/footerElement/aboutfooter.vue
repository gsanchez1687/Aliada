<template>
    <div class="col-xl-2 col-md-3">
        <div class="footer-links footer-left-space">
            <h5 class="footer-title" @click="toggle = !toggle">
                {{ 'About' }}
                <span class="according-menu">
                    <i :class="toggle ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                </span>
            </h5>
            <ul class="footer-content" :class="toggle ? 'd-block' : 'd-none d-md-block'">
                <li v-for="(item, index) in About_Data" :key="index">
                    <nuxt-link :to="item.link">
                        {{ item.name }}
                    </nuxt-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
interface Links {
    name: string;
    link: string;
}
interface FetchResponse {
    data: {
        value: {
            about: Links[]
        }
    }
}
const { data }: FetchResponse = await useFetch(useurl + '/data/footer1.json')
const About_Data: Links[] = data.value.about
let toggle = ref<boolean>(false)
</script>

<style lang="scss" scoped></style>
