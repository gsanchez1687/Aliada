<template>
    <section class="pb-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card ratio-card">
                        <div class="card-header">
                            <h5>Ratio Classes: Change your image proportion by just adding class</h5>
                            <p class="font-rubik mb-0">If you use image as background than add class
                                <code>.bg-img</code> in image and add below class in parent.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Types of Ratio</h5>
                                    <ul>
                                        <li v-for="(ratio, index) in allratio" :key="index">
                                            <h6>{{ ratio.h6 }}</h6>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Ratio for different shapes</h5>
                                    <ul>
                                        <li v-for="(shapes, index) in allshapes" :key="index">
                                            <h6>{{ shapes.h6 }}%</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <ModulesImageRatioImages />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Ratio {
    h6: string
}
interface Shapes {
    h6: string
}
interface FetchResponse {
    data: {
        value: {
            ratio: Ratio[]
            shapes: Shapes[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>
let { data } = await useFetch(useurl + '/data/image-ratio.json')
let allratio: Ratio[] = data.value.ratio
let allshapes: Shapes[] = data.value.shapes
</script>

<style scoped></style>