<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbBridcrumb1 title="Portfolio" first="Home" current="Portfolio" />
    <PagePortfolioCreative2 :data="Creative_Data" />
    <LayoutCommonFootersFooter3 />
    <ElementTaptopTapTop1 />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface creative2 {
    src?: string;
    title?: string;
    details?: string;
}
interface FetchResponse {
    data: {
        value: {
            creative2: [creative2];
        }
    }
}
useHead({
    title: 'Aliada- portfolio creative page'
})
let { data }: FetchResponse = await  useFetch(useurl + '/data/grid.json')
const Creative_Data: creative2[] = data.value.creative2
</script>

<style scoped></style>