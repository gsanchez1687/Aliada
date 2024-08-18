<template>
    <div class="col-xl-3 col-md-6 order-xl">
        <div class="footer-links">
            <h5 class="footer-title" @click="toggle = !toggle">{{ props.title }}
                <span class="according-menu"><i :class="toggle?'fas fa-chevron-up':'fas fa-chevron-down'"></i></span>
            </h5>
            <div class="footer-content"  :class="toggle?'d-block':'d-none d-md-block'">
                <div class="footer-map">
                    <iframe
                        title="realestate location"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946229!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563449626439!5m2!1sen!2sin"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
let props = defineProps({
    title:String
})
let toggle = ref<boolean>(false)
</script>

<style lang="scss" scoped>

</style>