<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbBridcrumb1 title="Portfolio" first="Home" current="Portfolio" />
    <ElementPortfolioGridTitle :data="Grid_Title" classes="col-lg-4 col-sm-6" />
    <LayoutCommonFootersFooter3 />
    <ElementTaptopTapTop1 />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface GridTitle {
    src: string;
    type: string;
    title: string;
    details: string;
}
interface FetchResponse {
    data: {
        value: {
            gridtitle2: GridTitle[]
        }
    }
}
useHead({
    title: 'Aliada- portfolio 3 grid title page'
})

let { data }: FetchResponse = await useFetch(useurl + '/data/grid.json')
const Grid_Title: GridTitle[] = data.value.gridtitle2
</script>

<style scoped></style>