<template>
    <section class="property-section slick-between slick-shadow pt-0 search-tab-items">
        <div class="container">
            <div class="row ratio_landscape">
                <div class="col">
                    <div class="title-3 text-start">
                        <h2>{{ title }}</h2>
                        <p>{{ details }}</p>
                    </div>
                    <div class="listing-hover-property row">
                        <ElementForsaleSale1 :data=" props.data" color=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
const props = defineProps({
    title:String,
  details: String,
  data:Object
});
</script>

<style lang="scss" scoped></style>