<template>
    <div class="col-md-9">
        <div class="dashboard-content">
            <div id="dashboard">
                <div class="user-wrapper">
                    <div class="row">
                        <PageUserPanelDeshbordChartSmallchart name="total agents" :data="alldata.data" number="2145"
                            :color="alldata.colors" />
                        <PageUserPanelDeshbordChartSmallchart name="total sales" :data="sales.data" number="$54871.12"
                            :color="sales.colors" />
                        <PageUserPanelDeshbordChartSmallchart name="total Properties" :data="property.data" number="25"
                            :color="property.colors" />
                        <PageUserPanelDeshbordChartSalesoverview heading="Sales overview" />
                        <PageUserPanelDeshbordChartSalebyagent heading="Sales by agent" />
                        <PageUserPanelDeshbordChartAvailableproperty heading="Available Property" />
                        <PageUserPanelDeshbordPropertyoverview heading="property overview" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface FetchResponse {
    data: {
        value: {
            agents: Chart
            sales: Chart
            property: Chart
        }
    }
}
interface Chart {
    data: number[],
    colors: string
}
let { data }: FetchResponse = await useFetch(useurl + '/data/dashboard.json')
let alldata: Chart = data.value.agents
let sales: Chart = data.value.sales
let property: Chart = data.value.property
</script>

<style scoped></style>
