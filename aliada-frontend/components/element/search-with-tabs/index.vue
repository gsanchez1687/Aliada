<template>
    <div class="search-with-tab">
        <ul class="nav nav-tabs" id="home-tab" role="tablist">
            <li class="nav-item"><nuxt-link data-bs-toggle="tab" @click="selectButton('Venta')" class="nav-link active" to="#sell">{{ 'En Venta' }}</nuxt-link></li>
           <!---<li class="nav-item"><nuxt-link data-bs-toggle="tab" @click="selectButton('Renta')" class="nav-link" to="#rent">{{ 'En Renta' }}</nuxt-link></li>-->
        </ul>
        <div class="tab-content" id="home-tabContent">
            <ElementSearchWithTabsSelltab :category="categoryProperty"  />
        </div>
    </div>
</template>

<script lang="ts" setup>
const categoryProperty = ref('Venta')

const selectButton = (category : string)=>{
    categoryProperty.value = category;
}

</script>

<style lang="scss" scoped></style>