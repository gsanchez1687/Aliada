<template>
    <div class="col-xl-9 col-lg-8 property-grid-2">
        <div class="filter-panel">
            <div class="top-panel">
                <div>
                    <h2>Properties Listing</h2>
                    <span class="show-result">Showing <span>1-15 of 69</span> Listings</span>
                </div>
                <ul class="grid-list-filter d-flex">
                    <li>
                        <div class="dropdown">
                            <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span>{{ selected }}</span>
                                <i class="fas fa-angle-down ms-lg-3 ms-2"></i></span>
                            <div class="dropdown-menu text-start">
                                <nuxt-link class="dropdown-item" to="javascript:void(0)" v-for="(item, index) in sorting"
                                    :key="index" @click="getvalue(item)">{{ item }}</nuxt-link>
                            </div>
                        </div>
                    </li>
                    <li class="collection-grid-view" :class="active == 'list' ? 'd-none' : ''">
                        <ul>
                            <li @click="classes = 'col-md-6'"><img src="/image/icon/2.png" alt=""
                                    class="product-2-layout-view"></li>
                            <li @click="classes = 'col-md-4'"><img src="/image/icon/3.png" alt=""
                                    class="product-3-layout-view"></li>
                            <li @click="classes = 'col-xl-3'"><img src="/image/icon/4.png" alt=""
                                    class="product-4-layout-view"></li>
                        </ul>
                    </li>
                    <li class="grid-btn" :class="active == 'grid' ? 'active' : ''">
                        <nuxt-link to="javascript:void(0)" class="grid-layout-view" @click="gridview()">
                            <Icon name="lucide:layout-grid" />
                        </nuxt-link>
                    </li>
                    <li class="list-btn" :class="active == 'list' ? 'active' : ''">
                        <nuxt-link to="javascript:void(0)" class="list-layout-view" @click="setlistview()">
                            <Icon name="material-symbols:format-list-bulleted" />
                        </nuxt-link>
                    </li>
                    <li class="d-lg-none d-block">
                        <div>
                            <h6 class="mb-0 mobile-filter font-roboto" @click="showfilter()">Advance Search
                                <Icon name="uim:align-center" />
                            </h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <ListingGridView3GridViewLeftSidebarListingdata :classes="classes" :lview="lview" :data="props.data" />
    </div>
</template>
    
<script setup lang="ts">
import type {rent} from '~/static/data/types/letestforrent'
interface MyProps {
    data: rent[]
}
let props = defineProps<MyProps>();
let show = ref(false)
let classes = ref<string>('col-xl-4 col-md-6')
let lview = ref<string>('')
let sorting: string[] = ['Sort by Newest', 'Sort by Oldest', 'Sory by featured', 'Sort by price (Low to high)'];
let selected = ref('Sort by Newest')
let active = ref<string>('grid')
let emit = defineEmits(['showfilter'])
function getvalue(value: string) {
    selected.value = value
}
function setlistview() {
    classes.value = 'col-md-12'
    lview.value = 'list-view';
    active.value = 'list'
}
function gridview() {
    active.value = 'grid';
    lview.value = '';
    classes.value = 'col-md-4'
}
function showfilter() {
    show.value = true
    emit('showfilter', show.value)
}
</script>
    
<style lang="scss" scoped></style>
    