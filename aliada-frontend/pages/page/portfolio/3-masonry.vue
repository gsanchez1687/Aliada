<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbBridcrumb1 title="Portfolio" first="Home" current="Portfolio" />
    <ElementPortfolioMasonery :data="Masonery_Img" :masonerywidth="400" classes="col-sm-12" />
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
            mesonery3: Img[]
        }
    }
}
useHead({
    title: 'Aliada- portfolio 3-masonry page'
})
let { data }: FetchResponse = await useFetch(useurl + '/data/grid.json')
const Masonery_Img: Img[] = data.value.mesonery3
</script>

<style scoped></style>