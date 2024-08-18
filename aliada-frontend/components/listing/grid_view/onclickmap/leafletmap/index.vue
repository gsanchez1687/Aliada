<template>
    <section class="property-section">
        <div class="container">
            <div class="row ratio_63">
                <ElementMapmodelfilterFilter :showfilter="showfilter" @hide="hidefilter" />
                <ListingGridViewOnclickmapLeafletmapList :data="store.alllistdata" @show="show" />
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { useSidebarfilterStore } from '~/store/sidebarfilter';
let store = useSidebarfilterStore();
let showfilter = ref<boolean>(false)
function show(value: boolean) {
    showfilter.value = value
}
function hidefilter(value: boolean) {
    showfilter.value = value;
}
</script>

<style scoped></style>