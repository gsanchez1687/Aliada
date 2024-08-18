<template>
    <div class="col-xl-8 xl-60 col-md-12">
        <div class="common-card property-overview">
            <div class="common-header">
                <h5>{{ heading }}</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordernone">
                    <thead>
                        <tr>
                            <th>Property</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in alldata" :key="index">
                            <td>
                                <div class="d-flex">
                                    <img :src="item.img" class="img-fluid" alt="">
                                    <h6>{{ item.name }}</h6>
                                </div>
                            </td>
                            <td>{{ item.type }}</td>
                            <td>{{ item.date }}</td>
                            <td><span class="label label-light color-3">{{ item.paid }}</span></td>
                            <td>
                                <Icon name="material-symbols:more-horiz" class="fs-3" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
defineProps({
    heading: String
})
interface Overview {
    name: string,
    img: string,
    type: string,
    date: string,
    paid: string
}
interface FetchResponse {
    data: {
        value: {
            property_overview: Overview[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/dashboard.json')
let alldata: Overview[] = data.value.property_overview

</script>

<style scoped></style>    