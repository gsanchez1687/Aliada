<template>
    <header class="header-3 fixed-header" :class="fixed ? 'fixed' : ''">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-layout-3">
                        <nav>
                            <div class="main-navbar">
                                <div id="mainnav">
                                    <LayoutElementsHeaderElementNavmenu color=""/>
                                </div>
                            </div>
                        </nav>
                        <div class="contact-number">
                            <i class="fas fa-phone-alt"></i>
                            <span class="font-roboto">{{ '(880)-123 789 / (800)- 561 456' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script  setup>
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