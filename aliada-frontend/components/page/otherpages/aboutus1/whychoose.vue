<template>
    <section class="why-choose ratio_40 service-section service-1 bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-2">
                        <h2>Why choose us</h2>
                        <p class="font-roboto">Elegant retreat in Coral Gables setting. This home provides entertaining
                            spaces with
                            kitchen opening</p>
                    </div>
                    <div class="row property-service column-space">
                        <div class="col-xl-4 col-md-6" v-for="(item, index) in chooseus" :key="index">
                            <div class="service-box">
                                <div class="icon-round">
                                    <Icon :name="item.icon" class="text-white" />
                                </div>
                                <h3><nuxt-link href="/page/otherpages/services">{{ item.title }}</nuxt-link></h3>
                                <p>{{ item.desc }}</p>
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
interface Chooes {
    title: string,
    desc: string,
    icon: string
}
interface FetchResponse {
    data: {
        value: {
            choose: Chooes[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/aboutus.json')
const chooseus: Chooes[] = data.value.choose;
</script>

<style scoped></style>