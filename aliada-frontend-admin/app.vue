<template>
  <loader />
  <NuxtLayout>
    
      <NuxtPage />
    
    <UNotifications>
    <template #title="{ title }">
      <span style="color: black" v-html="title" />
    </template>

    <template #description="{ description }">
      <span style="color: black" v-html="description" />
    </template>
  </UNotifications>
  </NuxtLayout>
</template>

<script setup>
const colorMode = useColorMode();

onMounted(async () => {
  await nextTick();
  colorMode.preference = "light";  // or dark
});
</script>
