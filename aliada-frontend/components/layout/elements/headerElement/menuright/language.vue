<template>
<li class="dropdown language">
    <a href="javascript:void(0)" @click.prevent="toggle()">
        <Icon name="bi:globe2" style="font-size:18px" />
    </a>
    <ul class="nav-submenu" :class="open">
        <li v-for="item in Languages" :key="item.code" @click="SetLang(item.code)"><nuxt-link to="javascript:void(0)">{{ item.name }}</nuxt-link></li>

    </ul>
</li>
</template>

<script lang="ts" setup>
import { useI18n } from 'vue-i18n'
const i18n = useI18n();
let Languages= [
    {
        name:'English',
        code:'en'
    },
    {
        name:'French',
        code:'fr'
    },
    {
        name:'Spanish',
        code:'es'
    },
    {
        name:'Arabic',
        code:'ar'
    }
]
let show = ref(false);
let open = ref('');

function toggle() {
    show.value = !show.value
    if (show.value) {
        open.value = 'open'
    } else {
        open.value = ''
    }
}
function SetLang(code:string){
    i18n.locale.value = code
}
</script>

<style lang="scss" scoped>

</style>
