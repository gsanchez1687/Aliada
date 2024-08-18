<template>
    <div v-if="loader" class="loader-wrapper">
        <div class="row loader-text">
            <div class="col-12">
                <img src="/image/loader/aliada_loader.gif" class="img-fluid" alt="" />
            </div>
            <div class="col-12">
                <div>
                    <h3 class="mb-0">Please wait Real estate Template loading...</h3>
                </div>
            </div>
        </div>
    </div>
    <div>
        <LayoutCommonHeadersHeader1 />
        <slot />
        <LayoutCommonFootersFooter1 />
    </div>
</template>

<script lang="ts" setup>
let loader = ref<boolean>(true);

onMounted(() => {
    setTimeout(() => {
        loader.value = false;
    }, 3000);
})
</script>

<style lang="scss" scoped></style>