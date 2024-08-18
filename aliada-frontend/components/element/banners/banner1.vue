<template>
    <div class="light-bg banner-1" v-for="(item, index) in Banner_data" :key="index">
        <span class="big-gradient">{{ big }}</span>
        <span class="small-white">{{ small }}</span>
        <h6>{{ item.title }}</h6>
        <h2>{{ item.details }}</h2>
        <div class="button-banner">
            <nuxt-link to="/agent/submit-property" class="btn btn-gradient color-6">{{ 'Submit property' }}</nuxt-link>
            <nuxt-link to="/page/portfolio/details" class="btn btn-white color-6">
                <span>{{ 'Browse property' }}</span></nuxt-link>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
interface Banner {
    title: string;
    details: string;
}
interface FetchResponse {
    data: {
        value: {
            banner: Banner[];
        }
    }
}
let props = defineProps({
    big: String,
    small: String
})
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/banner.json')
const Banner_data = data.value.banner
</script>

<style lang="scss" scoped></style>