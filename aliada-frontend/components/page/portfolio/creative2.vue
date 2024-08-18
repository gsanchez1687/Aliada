<template>
    <section class="portfolio-creative ratio_55">
        <div class="container">
            <div class="row m-0 order-section">
                <div class="col-lg-4 p-0" v-for="(item, index) in data" :key="index">
                    <div v-if="item.src" :style="'background-image:url(' + item.src + ')'" class="bg-size background">
                        <img :src="item.src" class="bg-img img-fluid d-none" alt="">
                    </div>
                    <div class="content-sec center-con" v-if="item.title">
                        <div>
                            <h3><nuxt-link to="/page/portfolio/details">{{ item.title }}</nuxt-link></h3>
                            <p class="font-roboto">
                                {{ item.details }}
                            </p>
                            <nuxt-link to="/page/portfolio/details" class="btn btn-gradient btn-pill color-2">Read
                                More</nuxt-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
defineProps({
    data: Object
})
</script>

<style scoped></style>