<template>
    <section class="property-section slick-between slick-shadow">
        <div class="container">
            <div class="row ratio_landscape">
                <div class="col">
                    <div class="title-3 text-start">
                        <h2>{{ 'Descubre lo Nuevo en Bienes Raíces' }}</h2>
                        <p>{{ details }}</p>
                    </div>
                    <ElementPropertyLetest4 />
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
let details: string = 'Explora las últimas propiedades seleccionadas, ideales por su ubicación y potencial, para encontrar tu espacio ideal en el dinámico mercado inmobiliario.'
</script>

<style lang="scss" scoped></style>