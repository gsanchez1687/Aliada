<template>
    <div class="col-xl-2 col-md-3 order-lg">
        <div class="footer-links footer-left-space" v-for="item in props.data" :key="item">
            <h5 class="footer-title" @click="toggle = !toggle">{{ item.title }}
                <span class="according-menu"> <i :class="toggle ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i></span>
            </h5>
            <ul class="footer-content" :class="toggle ? 'd-block' : 'd-none d-md-block'">
                <li v-for="link in item.children" :key="link">
                    <nuxt-link :to="link.link">{{ link.name }}</nuxt-link>
                </li>
            </ul>
        </div>
    </div>
    <layout-elements-footer-element-blogfooter />
</template>

<script lang="ts" setup>
let props = defineProps({
    data: Object
})
let toggle = ref<boolean>(false)
</script>

<style lang="scss" scoped></style>