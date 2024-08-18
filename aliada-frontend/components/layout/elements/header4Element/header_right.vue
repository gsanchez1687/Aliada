<template>
    <ul class="header-right">
        <!--
        <li v-if="router.fullPath == '/home/classic'">
            <div class="search-box" :class="toggle ? 'open' : ''">
                <i class="fas fa-search search-icon" @click="toggle = !toggle"></i>
                <span class="font-roboto">{{ 'Search' }}</span>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search here..">
                </div>
            </div>
        </li>
        -->
        <!--
            <li>
            <nuxt-link to="/">
                <Icon name="material-symbols:home-outline"></Icon>
            </nuxt-link>
        </li>
        -->
        <li>
            <a target="_blank" :href="getLoginUrl()">
                <Icon name="ic:twotone-person-outline"></Icon>
            </a>
            <!--data-bs-toggle="modal" data-bs-target="#login-modal" DON'T DELETE -->
        </li>
    </ul>
    <teleport to='body'>
        <Transition name="modals">
            <LayoutElementsModelsLoginModel />
        </Transition>
    </teleport>
</template>

<script lang="ts" setup>
let toggle = ref<boolean>(false)
let router = useRoute()

const getLoginUrl = () => {
  return process.env.NODE_ENV === "development" ? 'http://localhost:3002/login' : 'https://admin.aliadarealestate.com';
}

</script>

<style lang="scss" scoped></style>