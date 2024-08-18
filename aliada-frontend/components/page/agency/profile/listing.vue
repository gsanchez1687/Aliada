<template>
    <div class="agent-property">
        <div class="filter-panel">
            <div class="top-panel">
                <div>
                    <h3>Properties Listing</h3>
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
                </ul>
            </div>
        </div>
    </div>
    <PageAgencyProfileListdata :classes="classes" :lview="lview" />
</template>

<script setup lang="ts">
let sorting: string[] = ['Sort by Newest', 'Sort by Oldest', 'Sory by featured', 'Sort by price (Low to high)'];
let classes = ref<string>('col-md-6')
let lview = ref<string>('')
let selected = ref('Sort by Newest')
let active = ref<string>('grid')
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
    classes.value = 'col-md-6'
}
</script>

<style scoped></style>