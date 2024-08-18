<template>
    <div class="col-xl-9 col-lg-8 col-12">
        <div class="theme-card">
            <h2>Privacy policy for Aliada</h2>
            <div class="terms-wrap">
                <div class="terms-wrapper">
                    <p>At Aliada, accessible at Aliada.com, one of our main priorities is the privacy of
                        our visitors. This Privacy Policy document contains types of information that is
                        collected and recorded by Aliada and how we use it.</p>
                    <p>If you have additional questions or require more information about our Privacy
                        Policy, do not hesitate to contact us through email at <nuxt-link
                            to="javascript:void(0)">test@Aliada.com</nuxt-link></p>
                </div>
                <div class="terms-wrapper" :id="intro.id" v-for="(intro, index) in introduction" :key="index">
                    <h4>{{ intro.title }}</h4>
                    <p v-for="(item, index) in intro.details" :key="index">{{ item.detail }}</p>
                </div>
                <div class="terms-wrapper" id="howuse">
                    <h4>How we use your information</h4>
                    <p>We use the information we collect in various ways, including to:</p>
                    <ul>
                        <li v-for="(item, index) in alldata" :key="index">{{ item.details }}</li>
                    </ul>
                </div>
                <div class="terms-wrapper" :id="item.id" v-for="(item, index) in allprivacy" :key="index">
                    <h4>{{ item.title }}</h4>
                    <p>{{ item.details }}</p>
                    <p>{{ item.details2 }}</p>
                    <p v-if="item.details3">{{ item.details3 }}</p>
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
    details2?: string;
    details3?: string;
}
interface Intro {
    id: string;
    title: string;
    details: detail[]
}
interface detail {
    detail: string
}
interface FetchResponse {
    data: {
        value: {
            howuse: Data[],
            privacy: Terms[],
            intro: Intro[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/terms.json')
const alldata: Data[] = data.value.howuse
const allprivacy: Terms[] = data.value.privacy
const introduction: Intro[] = data.value.intro
</script>

<style scoped></style>