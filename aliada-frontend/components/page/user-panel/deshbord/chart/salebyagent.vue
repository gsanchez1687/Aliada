<template>
    <div class="col-xl-5 col-md-6">
        <div class="common-card sales-agent">
            <div class="common-header p-1">
                <h5>{{ heading }}</h5>
            </div>
            <ClientOnly>
                <apexchart type="bar" height="360" :options="chartOptions" :series="series" />
            </ClientOnly>
        </div>
    </div>
</template>

<script setup lang="ts">
import option from '~/static/data/chartoverview'
defineProps({
    heading: String
})
let series = [{
    data: [1380, 1200, 1100, 900, 700, 500, 400]
}]
let chartOptions = option.option2    
</script>

<style scoped></style>