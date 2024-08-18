<template>
    <div class="row property-service column-space">
        <div class="col-xl-4 col-md-6 wow fadeInUp" v-for="(item, index) in allservices" :key="index">
            <div class="service-box">
                <div class="icon-round">
                    <Icon :name="item.icon" class="text-white" />
                </div>
                <h3><nuxt-link to="/page/otherpages/services">{{ item.title }}</nuxt-link></h3>
                <p>{{ item.details }}</p>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
interface Service {
    icon: string;
    path: string;
    title: string;
    details: string
}
interface FetchResponse {
    data: {
        value: {
            services3: Service[];
        };
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/services.json')
let allservices: Service[] = data.value.services3
</script>

<style lang="scss" scoped></style>