<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersHeader3 />
    <ElementBradcrumbBridcrumb1 title="Portfolio" first="Home" current="Portfolio" />
    <PagePortfolioCreative3 :data="Creative_Data">
    </PagePortfolioCreative3>
    <LayoutCommonFootersFooter3 />
    <ElementTaptopTapTop1 />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Creative3 {
    src: string;
    class: string;
    type: string;
}
interface FetchResponse {
    data: {
        value: {
            creative3: [Creative3];
        }
    }
}
useHead({
    title: 'Aliada- portfolio creative page'
})
let { data }: FetchResponse = await useFetch(useurl + '/data/grid.json')
const Creative_Data: Creative3[] = data.value.creative3
</script>

<style scoped></style>