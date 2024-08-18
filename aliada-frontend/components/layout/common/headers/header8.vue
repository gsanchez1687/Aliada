<template>
    <header class="header-4 fixed-header" :class="fixed ? 'fixed' : ''">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="menu">
                        <div class="brand-logo">
                            <nuxt-link to="/">
                                <img src="/image/logo/aliada-realestate-color-logo.png" class="img-fluid for-light" alt="">
                                <img src="/image/logo/aliada-realestate-white-logo.png" alt="" class="img-fluid for-dark">
                            </nuxt-link>
                        </div>
                        <nav>
                            <div class="main-navbar">
                                <div id="mainnav">
                                    <LayoutElementsHeaderElementNavmenu color="text-black" />
                                </div>
                            </div>
                        </nav>
                        <LayoutElementsHeader4ElementHeaderRight />
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup lang="ts">
let fixed = ref(false)
onMounted(() => {
    window.addEventListener('scroll', function headfix() {
        if (window.scrollY > 600) {
            fixed.value = true
        } else {
            fixed.value = false
        }
    })
})
</script>
    
<style lang="scss" scoped></style>
