<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbBridcrumb1 title="Portfolio" first="Home" current="Portfolio" />
    <ElementPortfolioGridTitle :data="Grid_Title" classes="col-lg-3 col-sm-6" />
    <LayoutCommonFootersFooter3 />
    <ElementTaptopTapTop1 />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Img {
    src: string;
    type: string;
    title: string;
    details: string;
}
interface FetchResponse {
    data: {
        value: {
            gridtitle4: Img[]
        }
    }
}
useHead({
    title: 'Aliada- portfolio 4-grid-title page'
})
let { data }: FetchResponse = await useFetch(useurl + '/data/grid.json')
const Grid_Title: Img[] = data.value.gridtitle4
</script>

<style scoped></style>