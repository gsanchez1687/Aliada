<template>
    <div class="toggle-nav">
        <Icon name="octicon:three-bars" :class="color ? color : 'text-white'" class="fs-3" @click="toggle = true" />
    </div>
    <ul class="nav-menu" :class="toggle ? 'open' : ''">
        <li class="back-btn">
            <div class="mobile-back text-end" @click="toggle = false">
                <span>{{ 'Atrás' }}</span>
                <Icon name="ic:baseline-chevron-right" />
            </div>
        </li>
        <li :class="item.magamenu ? 'mega-menu' : props.header ? item.right ? 'dropdown dropdown-right' : 'dropdown' : 'dropdown'"
            v-for="(item, index) in Nav_Data" :key="index" @click="toogleclass(item.title)">
            <a href="javascript:void(0)" class="nav-link menu-title" @click="accordiontoggle = !accordiontoggle">
                <Icon v-if="router.fullPath == '/home/corporate' || router.fullPath == '/home/parallaximage'"
                    :name="item.icon" style="width:18px; height:" class="me-0" />
                {{ $t(item.title) }}
                <span class="according-menu" v-if="toggle">{{ item.title == subtoogle && accordiontoggle ? '-' : '+'
                }}</span>
            </a>
            <ul class="nav-submenu menu-content"
                :class="toggle ? item.title == subtoogle && accordiontoggle ? 'd-block' : '' : ''"
                v-if="item.magamenu == false">
                <li v-for="(child, index) in item.children" :key="index" @click="togglesubclass(child.name)">
                    <nuxt-link class="menu-title-level1" v-if="child.path" :to="child.path" target="_parent">{{ child.name
                    }}<span class="label">{{ child.label }}</span>
                        <Icon v-if="child.children" name="ic:baseline-chevron-right" />
                        <Icon v-if="child.icon" class="label" :name="child.icon" style="font-size:15px" />
                    </nuxt-link>
                    <a href="javascript:void(0)" class="menu-title-level1" v-else
                        @click="subaccordiontoggle = !subaccordiontoggle">
                        {{ child.name }}<span class="label">{{ child.label }}</span>
                        <Icon v-if="child.children" name="ic:baseline-chevron-right" />
                        <span class="according-menu" v-if="toggle">{{ item.title == subtoogle ? child.name == subname
                            && subaccordiontoggle ? '-' : '+' : '' }}</span>
                    </a>
                    <ul v-if="child.children" class="nav-sub-childmenu level1"
                        :class="toggle ? item.title == subtoogle ? child.name == subname && subaccordiontoggle ? 'd-block' : '' : '' : ''">
                        <li v-for="(subchild, index) in child.children" :key="index"
                            @click="togglechildclass(subchild.name)">
                            <nuxt-link class="submenu-title" :to="subchild.path"
                                @click="childaccordiontoggle = !childaccordiontoggle">{{ subchild.name }}
                                <Icon v-if="subchild.children" name="ic:baseline-chevron-right" />
                                <span class="according-menu" v-if="toggle">{{ item.title == subtoogle ? child.name ==
                                    subname ? subchild.name == childname && childaccordiontoggle ? '-' : '+' : '' : ''
                                }}</span>
                            </nuxt-link>
                            <ul v-if="subchild.children" class="nav-sub-childmenu submenu-content level2"
                                :class="toggle ? item.title == subtoogle ? child.name == subname ? subchild.name == childname && childaccordiontoggle ? 'd-block' : '' : '' : '' : ''">
                                <li v-for="(sub, index) in subchild.children" :key="index">
                                    <nuxt-link class="submenu-title" :to="sub.path" target="_parent">{{ sub.name
                                    }}</nuxt-link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <LayoutElementsHeaderElementNavpagelink :data="item" :toggle="toggle" :accordion="accordiontoggle"
                :subtoggle="subtoogle" />
        </li>
    </ul>
</template>

<script lang="ts" setup>
import menulink from '~/static/data/headers/headers1/menulink';
import type { title } from '~/static/data/types/header';
let props = defineProps({
    header: String,
    color: String
})
const Nav_Data: title[] = menulink
let accordiontoggle = ref<boolean>(false)
let subaccordiontoggle = ref<boolean>(false)
let childaccordiontoggle = ref<boolean>(false)
let toggle = ref<boolean>(false)
let subtoogle = ref<string>('')
let subname = ref<string>('')
let childname = ref<string>('')
let router = useRoute()
function toogleclass(title: string) {

    subtoogle.value = title
}
function togglesubclass(name: string) {
    subname.value = name;
}
function togglechildclass(name: string) {
    childname.value = name;
}

</script>

<style lang="scss" scoped></style>
