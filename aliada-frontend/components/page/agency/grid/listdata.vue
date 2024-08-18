<template>
    <div class="property-wrapper-grid">
        <div class="property-2 row column-sm property-label property-grid" :class="lview">
            <div class="wow fadeInUp" v-for="(agent, index) in ouragent" :key="index" :class="classes">
                <div class="property-box">
                    <div class="agent-image">
                        <div :style="'background-image:url(' + agent.src + ')'" class="background bg-size">
                            <img :src="agent.src" class="bg-img d-none" alt="">
                            <span class="label label-shadow">{{ agent.label }}</span>
                            <div class="agent-overlay"></div>
                            <div class="overlay-content">
                                <ul>
                                    <li v-for="(icon, index) in agent.icon" :key="index"><nuxt-link :to="icon.to"><img
                                                :src="icon.img" alt=""></nuxt-link>
                                    </li>
                                </ul>
                                <span>Connect</span>
                            </div>
                        </div>
                    </div>
                    <div class="agent-content">
                        <h3><nuxt-link to="/agent/agent-profile">{{ agent.name }}</nuxt-link></h3>
                        <p class="font-roboto">{{ agent.detail }}</p>
                        <ul class="agent-contact">
                            <li v-for="(content, index) in agent.content" :key="index" class="d-flex align-items-center">
                                <i :class="content.icon"></i>
                                {{ content.content }}
                                <span class="phone-number d-block" v-if="agent.name == agentname && show">{{
                                    content.contact }}</span>
                                <span class="character" v-else>{{ content.contact1 }}</span>
                                <span class="label label-light label-flat color-2" v-if="content.labels"
                                    @click="shownumber(agent.name)">
                                    <span style="font-size:14px;"> {{ agent.name == agentname && show ? 'show' : 'hide' }}
                                    </span>
                                </span>
                            </li>
                        </ul>
                        <nuxt-link to="/agent/agent-profile">View profile <i class="fas fa-arrow-right"></i></nuxt-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import type{agent} from '@/static/data/types/agencyagent'
interface FetchResponse {
    data: {
        value: {
            agencygrid: agent[];
        }
    }
}
defineProps({
    classes: String,
    lview: String
})
let { data }: FetchResponse = await useFetch(useurl + '/data/agency.json')
let ouragent: agent[] = data.value.agencygrid;
let show = ref<boolean>(false)
let agentname = ref('')
function shownumber(name: string) {
    show.value = !show.value
    agentname.value = show.value ? name : ''
}
</script>

<style scoped></style>