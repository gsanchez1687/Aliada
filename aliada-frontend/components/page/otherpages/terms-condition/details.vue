<template>
    <div class="col-xl-9 col-lg-8 col-12">
        <div class="theme-card">
            <h2>Terms & Conditions</h2>
            <div class="terms-wrap">
                <div class="terms-wrapper" id="intro">
                    <h4>Introduction</h4>
                    <p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our
                        website, Aliada accessible at Aliada.com.</p>
                    <p>These Terms will be applied fully and affect to your use of this Website. By using this Website, you
                        agreed to accept all terms and conditions written in here. You must not use this Website if you
                        disagree with any of these Website Standard Terms and Conditions.</p>
                </div>
                <div class="terms-wrapper" id="restriction">
                    <h4>Restrictions</h4>
                    <p>You are specifically restricted from all of the following:</p>
                    <ul>
                        <li v-for="(item, index) in alldata" :key="index">
                            {{ item.details }}
                        </li>
                    </ul>
                </div>
                <div class="terms-wrapper" :id="item.id" v-for="(item, index) in allterms" :key="index">
                    <h4>{{ item.title }}</h4>
                    <p>{{ item.details }}</p>
                    <p v-if="item.details2">{{ item.details2 }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Data {
    details: string
}
interface Terms {
    id: string;
    title: string;
    details?: string;
    details2?: string
}
interface FetchResponse {
    data: {
        value: {
            data: Data[],
            terms: Terms[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/terms.json')
const alldata: Data[] = data.value.data
const allterms: Terms[] = data.value.terms
</script>

<style scoped></style>