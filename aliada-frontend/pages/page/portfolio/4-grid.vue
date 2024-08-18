<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbBridcrumb1 title="Portfolio" first="Home" current="Portfolio" />
    <ElementPortfolioGrid :data="Grid_Img" classes="col-lg-3 col-sm-6" />
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
            img4: Img[]
        }
    }
}
useHead({
    title: 'Aliada- portfolio 4-grid page'
})
let { data }: FetchResponse = await useFetch(useurl + '/data/grid.json')
const Grid_Img: Img[] = data.value.img4
</script>

<style scoped></style>