<template>
    <section class="testimonial-style-1">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-2">
                        <h2>{{ title }}</h2>
                        <p>{{ details }}</p>
                    </div>
                    <testimonial_3 />
                    <ElementHappyClinetTestimonial3 />
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
let title: string = 'What people Say'
let details: string = 'Cum doctus civibus efficiantur in imperdiet deterruisset.'
</script>

<style lang="scss" scoped></style>