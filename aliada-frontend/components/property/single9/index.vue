<template>
    <section class="breadcrumb-section p-0 bg-size background" style="background-image:url('/image/inner-background.jpg')">
        <img src="/image/inner-background.jpg" class="bg-img img-fluid d-none" alt="">
        <div class="container">
            <div class="breadcrumb-content">
                <div>
                    <h2>property page</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb ms-0">
                            <li class="breadcrumb-item"><nuxt-link href="/">Home</nuxt-link></li>
                            <li class="breadcrumb-item active" aria-current="page">property page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <PropertySingle9SinglePropertyHader />
    <PropertySingle9SingleProperty />
</template>

<script setup lang="ts">

</script>

<style scoped></style>