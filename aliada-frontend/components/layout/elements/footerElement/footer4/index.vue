<template>
    <div class="col-xl-2 col-md-3">
        <div class="footer-links footer-left-space">
            <h5 class="footer-title" @click="about = !about">Sitemap <span class="according-menu"><i
                        :class="about ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i></span></h5>
            <ul class="footer-content" :class="about ? 'd-block' : 'd-none d-md-block'">
                <li v-for="(item, index) in About_Data" :key="index">
                    <nuxt-link :to="item.link">
                        <Icon name="material-symbols:chevron-right" />
                        {{ item.name }}
                    </nuxt-link>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-xl-2 col-md-3">
        <div class="footer-links footer-left-space">
            <h5 class="footer-title" @click="Buy = !Buy">Propiedades <span class="according-menu"><i
                        :class="Buy ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i></span></h5>
            <ul class="footer-content" :class="Buy ? 'd-block' : 'd-none d-md-block'">
                <li v-for="(item, index) in Buy_Data" :key="index">
                    <nuxt-link :to="item.link">
                        <Icon name="material-symbols:chevron-right" />
                        {{ item.name }}
                    </nuxt-link>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="footer-links footer-left-space">
            <h5 class="footer-title" @click="Sale = !Sale">Legal <span class="according-menu"><i
                        :class="Sale ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i></span></h5>
            <ul class="footer-content" :class="Sale ? 'd-block' : 'd-none d-md-block'">
                <li v-for="(item, index) in Sell_Data" :key="index">
                    <nuxt-link :to="item.link">
                        <Icon name="material-symbols:chevron-right" />
                        {{ item.name }}
                    </nuxt-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script lang="ts" setup>
interface Links {
    name: string;
    link: string;
}

// Directly define the data in the component
const About_Data: Links[] = [
    { name: "Inicio", link: "#" },
    { name: "Quienes somos", link: "#" },
];

const Buy_Data: Links[] = [
    { name: "Ver propiedades", link: "#" },
    { name: "Mapa de propiedades", link: "#" },
];

const Sell_Data: Links[] = [
    { name: "Políticas de privacidad", link: "#" },
    { name: "Términos y condiciones", link: "#" },
];

const Sale = ref<boolean>(false);
const Buy = ref<boolean>(false);
const about = ref<boolean>(false);
</script>
