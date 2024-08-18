<template>
    <div class="loader-wrapper" v-if="loader">
        <div class="row loader-img">
            <div class="col-12">
                <img src="/image/loader/aliada_loader.gif" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <LayoutCommonHeadersHeader8 />
    <slot />
    <LayoutCommonFootersFooter4 />
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