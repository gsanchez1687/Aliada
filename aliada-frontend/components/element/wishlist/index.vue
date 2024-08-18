<template>
    <nuxt-link to="javascript:void(0)" class="effect-round like added" data-bs-toggle="tooltip" data-bs-placement="left" title="wishlist" @click="wishlist(item)">
        <Icon :name="fill?.find((ele) => ele.id == item.id)?'ph:heart-straight-fill':'ph:heart-straight-thin'" class="text-black"/>
    </nuxt-link>
</template>

<script setup lang="ts">
import {useSidebarfilterStore} from '~/store/sidebarfilter' 
defineProps({
    item:Object
})
let emit = defineEmits(['wishlist'])
let fill = ref([])
onMounted(()=> {
    if(!process.client)return
    fill.value = JSON.parse(localStorage.getItem('wishlist'))
})
let store = useSidebarfilterStore();
let favproduct = ref([])
function wishlist(value){ 
    emit('wishlist' , value)  
}
</script>

<style lang="scss" scoped>

</style>