<template>
    <div class="our-agent theme-card">
        <div class="row">
            <div class="col-sm-6 ratio_landscape">
                <div class="agent-image bg-size"
                    style="background-image: url(/image/agency/5.png); background-size: cover; background-position: center center; background-repeat: no-repeat; display: block;">
                    <span class="label label-shadow">10 Properties</span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="agent-wrap">
                    <div class="our-agent-details">
                        <h3>{{ Details.title }}</h3>
                        <h6>{{ Details.subtitle }}</h6>
                        <ul>
                            <li v-for="(items, index) in Details.media" :key="index" :class="items.type ? 'with-link' : ''">
                                <div class="media">
                                    <div class="icons-square">
                                        <Icon :name="items.name" />
                                    </div>
                                    <div class="media-body" v-if="items.type">
                                        <h6><nuxt-link to="javascript:void(0)">{{ items.body }}</nuxt-link></h6>
                                    </div>
                                    <div class="media-body" v-else>
                                        <h6>{{ items.body }}</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="agent-social">
                        <li v-for="(item, index) in Social" :key="index"><nuxt-link :to="item.link" :class="item.class"><i
                                    :class="item.icon"></i></nuxt-link></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="about-agent theme-card" v-for="(item, index) in About" :key="index">
        <h3>{{ item.title }}</h3>
        <div class="row">
            <p class="font-roboto col-xl-4" v-for="(desc, index) in item.details" :key="index"> {{ desc.detail }}</p>
        </div>
    </div>
    <PageAgencyProfileOuragent />
    <PageAgencyProfileListing />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import type {agency} from '~/static/data/types/agency'
interface Social {
    link: string;
    class: string;
    icon: string;
}
interface About {
    title: string;
    details: {
        detail: string
    }[]
}
interface FetchResponse {
    data: {
        value: {
            details: agency
            social: Social[]
            about: About[]
        }
    }
}
const { data }: FetchResponse = await useFetch(useurl + '/data/agency.json')
const Details: agency = data.value.details
const Social: Social[] = data.value.social
const About: About[] = data.value.about
</script>

<style scoped></style>