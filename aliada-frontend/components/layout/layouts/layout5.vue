<template>
    <div class="loader-wrapper" v-if="loader">
        <div class="row loader-text">
            <div class="col-12">
                <img src="/image/loader/aliada_loader.gif" class="img-fluid" alt="">
            </div>
            <div class="col-12">
                <div>
                    <h3 class="mb-0">Please wait real estate Template loading/layout.</h3>
                </div>
            </div>
        </div>
    </div>
    <LayoutCommonHeadersHeader5 />
    <slot />
    <LayoutCommonFootersFooter1 />
</template>

<script lang="ts" setup>
let loader = ref<boolean>(false);

onMounted(() => {
    loader.value = true
    setTimeout(() => {
        loader.value = false;
    }, 3000);
})
</script>

<style lang="scss" scoped></style>