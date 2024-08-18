<template>
    <div class="page-wrapper">
        <LayoutHeader/>
        <div class="page-body-wrapper">
            <LayoutSidebar/>
            <slot/>
            <LayoutFooter/>
            <div class="tap-top" :class="top?'top':''" @click="totop()">
                <div>
                    <i class="fas fa-arrow-up"></i>
                </div>
            </div>
            <LayoutCustomizer/>
        </div>
    </div>
</template>

<script setup lang="ts">
onMounted(() => {
    window.addEventListener('scroll' , handelscroll)
})
let top = ref(false)
function totop(){
  window.scrollTo({top:0 , behavior:'smooth'})
}
function handelscroll(){
  if(window.scrollY > 600){
    top.value = true
  }
  else{
    top.value = false
  }
}
definePageMeta({
    middleware: ['sanctum:auth'],
});
</script>

<style scoped>

</style>