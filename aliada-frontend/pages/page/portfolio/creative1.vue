<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbBridcrumb1 title="Portfolio" first="Home" current="Portfolio" />
    <PagePortfolioCreative1 :data="Creative_Data" />
    <LayoutCommonFootersFooter3 />
    <ElementTaptopTapTop1 />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Creative1 {
    src: string;
    title: string;
    details: string;
    class: string;
}
interface FetchResponse {
    data: {
        value: {
            creative1: [Creative1];
        }
    }
}
useHead({
    title: 'Aliada- portfolio creative page'
})
let { data }: FetchResponse = await  useFetch(useurl + '/data/grid.json')
const Creative_Data: Creative1[] = data.value.creative1
</script>

<style scoped></style>