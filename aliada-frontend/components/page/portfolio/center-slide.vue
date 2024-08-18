<template>
    <section class="p-0 center-slides">
        <div class="container-fluid p-0">
            <swiper :loop="true" :centeredSlides="true" :slidesPerView="3" class="center-slider">
                <swiper-slide v-for="(item, index) in data" :key="index">
                    <div class="img-center bg-size background" :style="'background-image:url(' + item.src + ')'">
                        <img :src="item.src" class="img-fluid d-none bg-img" alt="">
                        <div class="center-content">
                            <div>
                                <h3>{{ item.title }}</h3>
                                <h6>{{ item.details }}</h6>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </section>
</template>

<script setup lang="ts">
let props = defineProps({
    data: Object
})
</script>

<style scoped></style>