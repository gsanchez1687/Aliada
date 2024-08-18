<template>
    <section class="p-0 parallax-section">
        <div class="full_banner bg-size background" v-for="(item, index) in data" :key="index"
            :style="'background-image:url(' + item.src + ')'">
            <img :src="item.src" class="img-fluid bg-img d-none" alt="">
            <div class="center-content">
                <div>
                    <h2>{{ item.title }}</h2>
                    <h6>{{ item.details }}</h6>
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