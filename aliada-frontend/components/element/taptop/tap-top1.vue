<template>
  <div class="tap-top color-4" :class="top ? 'top' : 'd-none'" @click="totop()">
    <div>
      <i class="fas fa-arrow-up"></i>
    </div>
  </div>
</template>

<script setup lang="ts">
let top = ref(false)
function totop() {
  window.scrollTo({ top: 0, behavior: 'smooth' })
}
function handelscroll() {
  if (window.scrollY > 600) {
    top.value = true
  }
  else {
    top.value = false
  }
}
onMounted(() => {
  window.addEventListener('scroll', handelscroll)
})
</script>

<style scoped></style>