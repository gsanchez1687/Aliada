<template>
    <div class="mega-menu-container menu-content"
        :class="toggle ? data.title == subtoggle && accordion ? 'd-block' : '' : ''" v-if="data.magamenu">
        <div class="container">
            <div class="row">
                <div class="col mega-box" v-for="(subitem, index) in data.children" :key="index">
                    <div class="link-section">
                        <div class="submenu-title" @click="togglesubname(subitem.name)">
                            <h5> {{ subitem.name }}</h5>
                            <span class="according-menu" v-if="toggle">{{ data.title == subtoggle ? subitem.name == subname
                                &&
                                pageaccordion ? '-' : '+' : '' }}</span>
                        </div>
                        <div class="submenu-content opensubmegamenu"
                            :class="toggle ? data.title == subtoggle ? subitem.name == subname && pageaccordion ? 'd-block' : 'd-none' : '' : ''">
                            <ul class="list">
                                <li v-for="(child, index) in subitem.children" :key="index">
                                    <nuxt-link :to="child.path">{{ child.name }}
                                        <Icon v-if="child.icon" class="label" :name="child.icon" style="font-size:15px" />
                                    </nuxt-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div v-if="subitem.section">
                        <div class="link-section" v-for="(subchild, index) in subitem.section" :key="index">
                            <div class="submenu-title" @click="togglesubchildname(subchild.name)">
                                <h5>{{ subchild.name }}</h5>
                                <span class="according-menu" v-if="toggle">{{ data.title == subtoggle ? subchild.name ==
                                    subchildname && subpageaccordion ? '-' : '+' : '' }}</span>
                            </div>
                            <div class="submenu-content opensubmegamenu"
                                :class="toggle ? data.title == subtoggle ? subchild.name == subchildname && subpageaccordion ? 'd-block' : 'd-none' : '' : ''">
                                <ul class="list">
                                    <li v-for="(link, index) in subchild.children" :key="index">
                                        <nuxt-link :to="link.path">{{ link.name }}
                                            <span class="label">{{ link.label }}</span>
                                        </nuxt-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div v-if="subitem.section2">
                        <div class="link-section" v-for="(sublink, index) in subitem.section2" :key="index">
                            <div class="submenu-title" @click="togglechildname(sublink.name)">
                                <h5>{{ sublink.name }}</h5>
                                <span class="according-menu" v-if="toggle">{{ data.title == subtoggle ? sublink.name ==
                                    childname && subchildaccordion ? '-' : '+' : '' }}</span>
                            </div>
                            <div class="submenu-content opensubmegamenu"
                                :class="toggle ? data.title == subtoggle ? sublink.name == childname && subchildaccordion ? 'd-block' : 'd-none' : '' : ''">
                                <ul class="list">
                                    <li v-for="(data, index) in sublink.children" :key="index">
                                        <nuxt-link :to="data.path">{{ data.name }}
                                            <Icon v-if="data.icon" class="label" :name="data.icon" style="font-size:15px" />
                                        </nuxt-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import type {title} from '~/static/data/types/header'
interface MyProps {
    data: title;
    toggle: boolean;
    subtoggle: string;
    accordion: boolean;
}
defineProps<MyProps>()
let subname = ref<string>('')
let subchildname = ref<string>('')
let childname = ref<string>('')
let pageaccordion = ref<boolean>(false)
let subpageaccordion = ref<boolean>(false)
let subchildaccordion = ref<boolean>(false)
function togglesubname(name: string) {
    pageaccordion.value = !pageaccordion.value
    subname.value = name;
}
function togglesubchildname(name: string) {
    subpageaccordion.value = !subpageaccordion.value
    subchildname.value = name
}
function togglechildname(name: string) {
    subchildaccordion.value = !subchildaccordion.value
    childname.value = name
}
</script>

<style lang="scss" scoped></style>
