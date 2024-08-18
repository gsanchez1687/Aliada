<template>
    <section class="layout-home8 bg-img-2 ratio_landscape">
        <div class="container p-0">
            <div class="row m-0">
                <div class="col-xl-8 col-lg-8">
                    <div class="home-left-content">
                        <div class="home-content">
                            <h1 class="mx-0 p-0">{{ 'Las mejores propiedades de Tulum en un solo lugar' }}<br /><!--{{ 'inmobiliarios' }}--></h1>
                            <!--<h6 class="font-roboto">{{ details }}</h6>-->
                        </div>
                    </div>
                    <ElementSearchWithTabs />
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
//let details: string = 'Uniendo experiencia y visión: Transformamos transacciones inmobiliarias en oportunidades de crecimiento, forjando un futuro próspero en bienes raíces.'
</script>

<style lang="scss" scoped>

.home-content h1{
    text-transform: initial !important;
}

@media (max-width: 575px) {
    .layout-home8 {
        height: 600px;
    }
}

</style>