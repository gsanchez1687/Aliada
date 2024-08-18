<template>
    <div class="col-md-4">
        <div class="common-card">
            <div class="widgets">
                <div class="media">
                    <div class="media-body">
                        <p>{{ name }}</p>
                        <h5>{{ number }}</h5>
                    </div>
                    <div class="small-bar">
                        <ClientOnly>
                            <apexchart type="bar" height="35" width="100" :options="chartOptions" :series="series"></apexchart>

                        </ClientOnly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
let props = defineProps({
    name: String,
    data: Array,
    color: String,
    number: String
})
let series= [{
    name: 'Inflation',
    data: props.data
}];

let chartOptions= {
    chart: {
        height: 35,
        type: 'bar',
        width: 100,
        sparkline: {
            enabled: true
        }
    },
    plotOptions: {
        bar: {
            columnWidth: '40%',
            dataLabels: {
                position: 'top',
            },
        }
        
    },
    colors: [props.color]
        }

</script>

<style scoped></style>