<template>
    <div class="col-lg-12" v-for="(item, index) in filterdata" :key="index">
        <div class="form-group">
            <label v-if="label">{{ label }}</label>
            <div class="dropdown">
                <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown">
                    <span>{{ selected }}</span>
                    <i class="fas fa-angle-down"></i>
                </span>
                <div class="dropdown-menu text-start">
                    <nuxt-link class="dropdown-item" to="javascript:void(0)" v-for="(option, index) in item.options"
                        :key="index" @click.prevent="getvalue(option)">{{ option }}</nuxt-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface map {
    title: string;
    options: string[]
}
interface FetchResponse {
    data: {
        value: {
            data: map[]
        }
    }
}
defineProps({
    label: String
})
let { data }: FetchResponse = await useFetch(useurl + '/data/mapfilter.json')
let alldata: map[] = data.value.data;
let selected = ref<string>('Property Location')
let filterdata = computed<void>(() => {
    return alldata.filter((item) => item.title === 'Any City')
})
function getvalue(val: string) {
    selected.value = val
}
</script>

<style scoped></style>