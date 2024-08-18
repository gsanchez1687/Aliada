<template>
    <div class="col-xl-9 col-lg-8 property-grid-2">
        <div class="col-12 property-grid-3">
            <div class="filter-panel tab-top-panel">
                <div class="top-panel">
                    <div class="filters respon-filter-content filter-button-group">
                        <ul>
                            <li :class="tab == 'allproperty' ? 'active' : ''" data-filter="*"
                                @click="allproperty('allproperty')"><span>All Property</span></li>
                            <li :class="tab == 'forsale' ? 'active' : ''" data-filter=".sale" @click="forsale('forsale')">
                                <span>For Sale</span></li>
                            <li :class="tab == 'forrent' ? 'active' : ''" data-filter=".rent" @click="forrent('forrent')">
                                <span>For rent</span></li>
                        </ul>
                    </div>
                    <ul class="grid-list-filter">
                        <li>
                            <div class="dropdown">
                                <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span>{{ selected
                                }}</span> <i class="fas fa-angle-down ms-lg-3 ms-2"></i></span>
                                <div class="dropdown-menu text-start">
                                    <nuxt-link class="dropdown-item" to="javascript:void(0)"
                                        v-for="(item, index) in sorting" :key="index" @click="getvalue(item)">{{ item
                                        }}</nuxt-link>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <ListingTablayoutTableftsidebarListingdata :data="store.alllistdata" />
        </div>
    </div>
</template>

<script setup lang="ts">
import { useSidebarfilterStore } from '~/store/sidebarfilter'
let store = useSidebarfilterStore();
let tab = ref<string>('allproperty')
let sorting: string[] = ['Sort by Newest', 'Sort by Oldest', 'Sory by featured', 'Sort by price (Low to high)'];
let selected = ref('Sort by Newest')
function getvalue(value: string) {
    selected.value = value
}
function allproperty(value: string) {
    tab.value = value
    store.allproperty()

}
function forsale(value: string) {
    tab.value = value
    store.saledata()
}
function forrent(value: string) {
    tab.value = value
    store.rentdata();
}
</script>

<style scoped></style>