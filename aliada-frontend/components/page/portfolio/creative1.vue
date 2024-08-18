<template>
    <section class="portfolio-creative odd-even ratio_55">
        <div class="container">
            <div class="row m-0" v-for="(item, index) in data" :key="index">
                <div :class="item.class">
                    <div class="wow zoomIn bg-size background" :style="'background-image:url(' + item.src + ')'">
                        <img :src="item.src" class="bg-img img-fluid d-none" alt="">
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="content-sec wow zoomIn">
                        <div>
                            <h3><nuxt-link to="/page/portfolio/details">{{ item.title }}</nuxt-link></h3>
                            <p class="font-roboto">{{ item.details }}</p>
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