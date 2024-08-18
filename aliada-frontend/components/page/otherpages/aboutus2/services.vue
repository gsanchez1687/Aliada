<template>
    <section class="service-section service-2 bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-2">
                        <h2>Provided Services</h2>
                        <p>Residences can be classified into different type of housing tenure can used for same physical
                            type.</p>
                    </div>
                    <div class="row property-service column-space about-service">
                        <div class="col-xl-4 col-md-6 fadeInUp" v-for="(item, index) in Services_data" :key="index">
                            <div class="service-box ">
                                <div class="hover-line">
                                    <svg class="service-icon">
                                        <use :xlink:href="item.svg"></use>
                                    </svg>
                                    <div>
                                        <svg class="icon-line-color">
                                            <use :xlink:href="item.svg1"></use>
                                        </svg>
                                    </div>
                                </div>
                                <nuxt-link to="/page/otherpages/services">
                                    <h3>{{ item.title }}</h3>
                                </nuxt-link>
                                <p class="font-roboto">{{ item.details }}</p>
                                <nuxt-link to="/page/otherpages/services" class="btn btn-light-bg color-2 "><span>{{ 'view more'}}</span></nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Services {
    svg: string;
    svg1: string;
    title: string;
    details: string;
}
interface FetchResponse {
    data: {
        value: {
            services: Services[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/services.json')
const Services_data: Services[] = data.value.services
</script>

<style scoped></style>