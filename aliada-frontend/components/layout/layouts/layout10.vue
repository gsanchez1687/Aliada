<template>
    <div class="loader-wrapper" v-if="loader">
        <div class="row loader-img">
            <div class="col-12">
                <img src="/image/loader/aliada_loader.gif" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <LayoutCommonHeadersHeader10 />
    <slot />
    <LayoutCommonFootersFooter3 />
</template>

<script lang="ts" setup>
let loader = ref<boolean>(true);

onMounted(() => {
    setTimeout(() => {
        loader.value = false;
    }, 1000);
})
</script>

<style lang="scss" scoped></style>