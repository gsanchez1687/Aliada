<template>
    <div class="col-xl-4 xl-40 col-md-6">
        <div class="common-card available-property">
            <div class="common-header pb-0">
                <h5>{{ heading }}</h5>
            </div>
            <div class="radial-property">
                <ClientOnly>
                    <apexchart type="radialBar" height="255" :options="chartOptions" :series="series" />
                </ClientOnly>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import option from '~/static/data/chartoverview'
defineProps({
    heading: String
})
let series = [80];
let chartOptions = option.option3 
</script>

<style scoped></style>