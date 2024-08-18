<template>
    <div class="col filter" v-for="(item, index) in filterdata" :key="index">
        <div class="media">
            <div class="icon-square">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="media-body">
                <h4>{{ item.title }}</h4>
                <div class="dropdown">
                    <h6 class="dropdown-toggle font-roboto" data-bs-toggle="dropdown">
                        <span v-if="selected == ''">{{ item.options[0] }}</span>
                        <span v-else>{{ selected }}</span>
                    </h6>
                    <div class="dropdown-menu text-start">
                        <nuxt-link class="dropdown-item" to="javascript:void(0)" v-for="(option, index) in item.options"
                            :key="index" @click.prevent="getvalue(option)">{{ option }}</nuxt-link>
                    </div>
                </div>
            </div>
            <div class="dropdown-icon">
                <span class="d-block"><i class="fas fa-angle-up"></i></span>
                <span><i class="fas fa-angle-down"></i></span>
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
let { data }: FetchResponse = await useFetch(useurl + '/data/mapfilter.json')
let alldata: map[] = data.value.data;
let selected = ref<string>('')
let filterdata = computed<void>(() => {
    return alldata.filter((item) => item.title === 'Any Country')
})
function getvalue(val: string) {
    selected.value = val
}
</script>

<style scoped></style>