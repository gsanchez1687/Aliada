<template>
  <div class="loader-wrapper img-gif" v-if="loader">
    <img src="/image/loader/aliada_loader.gif" class="img-fluid" alt="">
  </div>
  <LayoutCommonHeadersHeader7 />
  <slot />
  <LayoutCommonFootersFooter2 />
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