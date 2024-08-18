<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbBridcrumb1 title="Portfolio" first="Home" current="Portfolio" />
    <ElementPortfolioMasonery :data="Masonery_Img" :masonerywidth="300" classes="col-sm-12" />
    <LayoutCommonFootersFooter3 />
    <ElementTaptopTapTop1 />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Img {
    src: string;
    type: string;
}
interface FetchResponse {
    data: {
        value: {
            mesonery4: Img[]
        }
    }
}
useHead({
    title: 'Aliada- portfolio 4-masonery page'
})
let { data }: FetchResponse = await useFetch(useurl + '/data/grid.json')
const Masonery_Img: Img[] = data.value.mesonery4
</script>

<style scoped></style>