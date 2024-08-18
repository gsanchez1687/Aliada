<template>
    <section class="testimonial-client">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-3 text-start">
                        <h2>{{ title }}</h2>
                        <p class="font-roboto">{{ details }}</p>
                    </div>
                    <ElementHappyClinetTestimonial4 />
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
let title: string = 'Comprometidos con Nuestros Clientes';
let details: string = 'Nos enfocamos en brindar servicios inmobiliarios personalizados, asegurando soluciones óptimas y satisfacción completa para cada cliente en Aliada.'
</script>

<style lang="scss" scoped></style>