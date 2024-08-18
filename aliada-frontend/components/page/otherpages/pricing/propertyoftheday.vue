<template>
    <section class="banner-section new-property pricing-property">
        <div class="container">
            <div class="row ratio_landscap feature-section">
                <div class="col">
                    <div class="title-2">
                        <h2>{{ title }}</h2>
                        <p>{{ details }}</p>
                    </div>
                    <ElementBannersBanner3 />
                </div>
            </div>
        </div>
    </section>
</template>
  
<script lang="ts" setup>
let title: string = 'Property of the day'
let details: string = 'Discover New York’s best things to do, restaurants, theatre, nightlife and more'
</script>
  
<style lang="scss" scoped></style>