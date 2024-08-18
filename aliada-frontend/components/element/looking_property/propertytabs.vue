<template>
    <ul id="tabs" class="nav nav-tabs">
        <li class="nav-item"><nuxt-link to="javascript:void(0)" data-bs-target="#morden" data-bs-toggle="tab"
                :class="content == 'Morden' ? 'active' : ''" class="nav-link" @click="open('Morden')">Morden
                Villa</nuxt-link></li>
        <li class="nav-item"><nuxt-link href="javascript:void(0)" data-bs-target="#family" data-bs-toggle="tab"
                :class="content == 'family' ? 'active' : ''" class="nav-link" @click="open('family')">Family
                House</nuxt-link></li>
        <li class="nav-item"><nuxt-link href="javascript:void(0)" data-bs-target="#town" data-bs-toggle="tab"
                :class="content == 'town' ? 'active' : ''" class="nav-link" @click="open('town')">Town House</nuxt-link></li>
        <li class="nav-item"><nuxt-link href="javascript:void(0)" data-bs-target="#appartment" data-bs-toggle="tab"
                :class="content == 'appartment' ? 'active' : ''" class="nav-link"
                @click="open('appartment')">Apartment</nuxt-link></li>
        <li class="nav-item"><nuxt-link href="javascript:void(0)" data-bs-target="#office" data-bs-toggle="tab"
                class="nav-link" :class="content == 'office' ? 'active' : ''" @click="open('office')">Office</nuxt-link></li>
    </ul>
    <element-looking-property-moderntab :data="property" :content="content" />
    <element-looking-property-femilytab :data="property" :content="content" />
    <element-looking-property-towntab :data="property" :content="content" />
    <element-looking-property-appartmenttab :data="property" :content="content" />
    <element-looking-property-officetab :data="property" :content="content" />
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import type {rent} from '~/static/data/types/letestforrent'
interface FetchResponse {
    data: {
        value: {
            LatestPropertyListingInEnterprise: rent[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/property.json')
let property: rent[] = data.value.LatestPropertyListingInEnterprise
let content = ref<string>('family')
function open(value: string) {
    content.value = value
}
</script>

<style lang="scss" scoped></style>