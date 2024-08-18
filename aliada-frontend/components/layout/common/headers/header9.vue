<template>
    <header class="header-1 header-9 inner-page light-header shadow-cls">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="menu">
                        <div class="brand-logo">
                            <nuxt-link to="/">
                                <img src="/image/logo/10.png" alt="" class="img-fluid for-light">
                                <img src="/image/logo/1.png" alt="" class="img-fluid for-dark">
                            </nuxt-link>
                        </div>
                        <nav>
                            <div class="main-navbar">
                                <div id="mainnav">

                                    <LayoutElementsHeaderElementNavmenu color="text-black" />
                                </div>
                            </div>
                        </nav>
                        <LayoutElementsHeaderElementMenuright />
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script lang="ts" setup>
</script>

<style lang="scss" scoped></style>