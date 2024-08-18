<template>
    <div class="dashboard-list">
        <ul class="nav nav-tabs right-line-tab">
            <li class="nav-item"><nuxt-link class="nav-link" to="/page/user-panel/deshbord"
                    :class="active == 'dashboard' ? 'active' : ''">Dashboard</nuxt-link></li>
            <li class="nav-item"><nuxt-link class="nav-link" to="/page/user-panel/user-listing"
                    :class="active == 'listing' ? 'active' : ''">My Listing</nuxt-link></li>
            <li class="nav-item"><nuxt-link class="nav-link" to="/page/user-panel/create-property"
                    :class="active == 'create' ? 'active' : ''">create property</nuxt-link></li>
            <li class="nav-item"><nuxt-link class="nav-link" :class="active == 'profile' ? 'active' : ''"
                    to="/page/user-panel/user-profile">My profile</nuxt-link>
            </li>
            <li class="nav-item"><nuxt-link class="nav-link" :class="active == 'favourites' ? 'active' : ''"
                    to="/page/user-panel/user-favourties">favourites</nuxt-link></li>
            <li class="nav-item"><nuxt-link class="nav-link" to="/page/user-panel/user-payment"
                    :class="active == 'payment' ? 'active' : ''">Cards & payment</nuxt-link></li>
            <li class="nav-item"><nuxt-link class="nav-link" to="/page/user-panel/user-privacy"
                    :class="active == 'privacy' ? 'active' : ''">Privacy</nuxt-link></li>
            <li class="nav-item"><nuxt-link to="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#logout"
                    class="nav-link">Log out</nuxt-link></li>
        </ul>
    </div>
    <teleport to='body'>
        <Transition name="modals">
            <element-models-logout />
        </Transition>
    </teleport>
</template>

<script setup lang="ts">
defineProps({
    active: String
})
</script>

<style scoped></style>