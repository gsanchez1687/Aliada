<template>
    <header class="header-1 fixed-header" :class="fixed ? 'fixed' : ''">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="menu">
                        <div class="brand-logo">
                            <nuxt-link to="/">
                                <img src="/image/logo/1.png" alt="" class="img-fluid">
                            </nuxt-link>
                        </div>
                        <layout-elements-header-element />
                        <layout-elements-header-element-menuright />
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script lang="ts" setup>
let fixed = ref(false)
onMounted(() => {
    window.addEventListener('scroll', function headfix() {
        if (window.scrollY > 600) {
            fixed.value = true
        }
        else {
            fixed.value = false
        }
    })
})
</script>

<style lang="scss" scoped></style>