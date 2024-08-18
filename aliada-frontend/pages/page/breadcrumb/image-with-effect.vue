<template>
    <head>
        <title>Aliada - Breadcrumb right page</title>
    </head>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbImagebreadcrumb title="image with effect" first="Home" current="image with effect" />
    <ElementPortfolioGrid :data="All_Img" classes="col-sm-6" />
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
            img: Img[]
        }
    }
}
let { data }: FetchResponse = useFetch(useurl + '/data/grid.json')
const All_Img: Img[] = data.value.img
</script>

<style scoped></style>