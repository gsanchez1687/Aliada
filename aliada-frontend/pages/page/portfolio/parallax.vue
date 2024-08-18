<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersSingleproperty2header />
    <PagePortfolioParallax :data="Parallax_Data" />
    <LayoutCommonFootersFooter3 />
    <ElementTaptopTapTop1 />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Parallax {
    src: string;
    title: string;
    details: string;
}
interface FetchResponse {
    data: {
        value: {
            parallax: [Parallax];
        }
    }
}
useHead({
    title: 'Aliada- portfolio parallax page'
})
let { data }: FetchResponse = await useFetch(useurl + '/data/grid.json')
const Parallax_Data: Parallax[] = data.value.parallax
</script>

<style scoped></style>