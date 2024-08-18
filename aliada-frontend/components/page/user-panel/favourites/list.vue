<template>
    <div class="col-lg-9">
        <div class="dashboard-content">
            <div class="tab-listing" id="listing">
                <div class="property-section">
                    <div class="property-grid-2 ratio_63">
                        <div class="filter-panel">
                            <div class="top-panel">
                                <div>
                                    <h2>My Listing</h2>
                                    <span class="show-result">Showing <span>{{ showdata?.start }}- {{ showdata?.end }} of {{
                                        wishlist.length }}</span> Listings</span>
                                </div>
                                <ul class="grid-list-filter">
                                    <li>
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span>{{
                                                selected }}</span> <i class="fas fa-angle-down ms-lg-3 ms-2"></i></span>
                                            <div class="dropdown-menu text-start">
                                                <nuxt-link class="dropdown-item" to="javascript:void(0)"
                                                    v-for="(item, index) in sorting" :key="index"
                                                    @click="getvalue(item)">{{ item }}</nuxt-link>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <PageUserPanelFavouritesListdata @showdata="getdata" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import type {rent} from '~/static/data/types/letestforrent'
interface ShowData {
    start: number;
    end: number
}
let selected = ref('Sort by Newest')
let sorting: string[] = ['Sort by Newest', 'Sort by Oldest', 'Sory by featured', 'Sort by price (Low to high)'];
function getvalue(value: string) {
    selected.value = value
}
let wishlist = ref<rent[]>([])
let showdata = ref<ShowData>()
function getdata(value: ShowData) {
    showdata.value = value;
}
onMounted(() => {
    if (!process.client) return;
    let ParseData = localStorage.getItem('wishlist')
    if (ParseData) {
        wishlist.value = JSON.parse(ParseData)
    }
})
</script>

<style scoped></style>