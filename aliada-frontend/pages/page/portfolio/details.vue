<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbBridcrumb1 title="Portfolio" first="Home" current="Portfolio" />
    <PagePortfolioDetails :data="Details_Data" />
    <LayoutCommonFootersFooter3 />
    <ElementTaptopTapTop1 />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Details {
    src: string;
    title: string;
    details: string;
    icons: {
        link: string;
        aclass: string;
        iclass: string;
    }[]
    client: string;
    date: string;
    link: string;
    img: {
        src: string
    }[]
}
interface FetchResponse {
    data: {
        value: {
            details: Details[]
        }
    }
}
useHead({
    title: 'Aliada- portfolio details page'
})
let { data }: FetchResponse = await useFetch(useurl + '/data/grid.json')
const Details_Data: Details[] = data.value.details
</script>

<style scoped></style>