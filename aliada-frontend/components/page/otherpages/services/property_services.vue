<template>
    <section class="service-section service-1">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-2">
                        <h2>{{ title }}</h2>
                        <p>{{ details }}</p>
                    </div>
                    <ElementServicesServices3 />
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
let title: string = 'Property Services';
let details: string = 'Discover New York’s best things to do, restaurants, theatre, nightlife and more'
</script>

<style lang="scss" scoped></style>