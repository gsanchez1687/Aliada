<template>
    <ElementLoaderLoader1 />
    <LayoutCommonHeadersSingleproperty2header classes="shadow-cls" />
    <section class="error-section small-section">
        <div class="container">
            <div class="row">
                <div class="col text-center not-found">
                    <img src="/image/inner-pages/2.svg" class="img-fluid" alt="">
                    <h2>Whoops! something went wrong ?</h2>
                    <p class="font-roboto">we are sorry but the page you are looking for doesn't exist or has been removed.
                        please check or search again.</p>
                    <div class="btns">
                        <nuxt-link to="/home/classic" class="btn btn-gradient color-4">go to home page</nuxt-link>
                        <nuxt-link to="javascript:void(0)" class="btn btn-dashed color-4 ms-2">Report problem</nuxt-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <ElementTaptopTapTop1 />
</template>

<script setup lang="ts">
useHead({
    title: "Aliada - 404 Error Page"
})
</script>

<style scoped></style>