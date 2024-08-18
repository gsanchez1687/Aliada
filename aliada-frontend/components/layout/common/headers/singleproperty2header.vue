<template>
    <header class="inner-page light-header shadow-cls" :class="classes">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="menu">
                        <div class="brand-logo">
                            <nuxt-link to="/">
                                <img src="/image/logo/4.png" class="img-fluid for-light" alt="">
                                <img src="/image/logo/9.png" alt="" class="img-fluid for-dark">
                            </nuxt-link>
                        </div>
                        <nav>
                            <div class="main-navbar">
                                <div id="mainnav">
                                    <LayoutElementsHeaderElementNavmenu color="text-black" />
                                </div>
                            </div>
                        </nav>
                        <layout-elements-header-element-menuright />
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
    
<script setup lang="ts">
defineProps({
    classes: String
})
</script>
    
<style lang="scss" scoped></style>
    