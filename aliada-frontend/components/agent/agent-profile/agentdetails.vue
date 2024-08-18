<template>
    <div class="our-agent theme-card">
        <div class="row">
            <div class="col-sm-6 ratio_landscape">
                <div class="agent-image bg-size background" style="background-image:url(/image/avatar/5.jpg)">
                    <img src="/image/avatar/5.jpg" class="img-fluid bg-img d-none" alt="">
                    <span class="label label-shadow">4 Properties</span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="agent-wrap border-0 px-0">
                    <div class="our-agent-details">
                        <h3>{{ alldata?.title }}</h3>
                        <h6>{{ alldata?.subtitle }}</h6>
                        <ul>
                            <li v-for="(item, index) in alldata?.media" :key="index" :class="item.type ? 'with-link' : ''">
                                <div class="media">
                                    <div class="icons-square">
                                        <Icon :name="item.name" />
                                    </div>
                                    <div class="media-body" v-if="item.type">
                                        <h6><nuxt-link to="javascript:void(0)">{{ item.body }}</nuxt-link></h6>
                                    </div>
                                    <div class="media-body" v-else>
                                        <h6>{{ item.body }}</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="agent-social">
                        <li v-for="(item, index) in agent" :key="index"><nuxt-link :to="item.link" :class="item.class"><i
                                    :class="item.icon"></i></nuxt-link></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="about-agent theme-card" v-for="(item, index) in about" :key="index">
        <h3>{{ item.title }}</h3>
        <div class="row">
            <p class="font-roboto col-xl-4" v-for="(desc, index) in item.details" :key="index"> {{ desc.detail }}</p>
        </div>
    </div>
    <AgentAgentProfileListing />
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl';
import type {agency} from '~/static/data/types/agency';
import social from '~/static/data/types/social';
import abouttheagency from '~/static/data/types/abouttheagency';
interface FetchResponse {
    data: {
        value: {
            details: agency;
            social: social[];
            about: abouttheagency[]
        };

    };
}
let alldata = ref()
let agent = ref<social[]>([])
let about = ref<abouttheagency[]>([])
        const { data }:FetchResponse = await useFetch(useurl + '/data/agency.json');
        alldata.value = data.value.details;
        agent.value = data.value.social;
        about.value = data.value.about;
    


</script>

<style scoped></style>