<template>
    <div class="col-xl-7 col-md-12">
        <div class="common-card overview">
            <div class="common-header">
                <h5>{{ heading }}</h5>
            </div>
            <ul class="overview-content">
                <li v-for="(item, index) in overview" :key="index">
                    <div class="d-flex">
                        <div>
                            <p>{{ item.name }}</p>
                            <h4>${{ item.value }}</h4>
                        </div>
                        <span><span class="label" :class="item.success ? 'label-success' : 'label-danger'">{{ item.label
                        }}%</span></span>
                    </div>
                </li>
            </ul>
            <ClientOnly>
                <apexchart type="area" height="280" :options="chartOptions" :series="series" />
            </ClientOnly>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import option from '~/static/data/chartoverview'
interface Overview {
    name: string;
    value: string;
    label: String;
    success: boolean;
}
interface FetchResponse {
    data: {
        value: {
            overview: Overview[]
        }
    }
}
defineProps({
    heading: String
})
let { data }: FetchResponse = await useFetch(useurl + '/data/dashboard.json')
let overview: Overview[] = data.value.overview
let series = [
    {
        name: "$2530.00",
        data: [20, 25, 20, 30, 20, 50, 30, 35, 25, 60, 0]
    },
]
let chartOptions = option.option
</script>

<style scoped></style>