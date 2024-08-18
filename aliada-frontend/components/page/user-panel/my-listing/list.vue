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
                                    <span class="show-result">Showing <span>1-15 of 69</span> Listings</span>
                                </div>
                                <ul class="grid-list-filter">
                                    <li @click="showfilter = !showfilter">
                                        <div class="filter-bottom-title">
                                            <h6 class="mb-0 font-roboto">Advance Search
                                                <Icon name="uim:align-center" class="float-end ms-2" />
                                            </h6>
                                        </div>
                                    </li>
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
                        <ElementUserPanelDropdownfilter :showfilter="showfilter" />
                        <PageUserPanelMyListingListdata :data="store.alllistdata" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import type {rent} from '~/static/data/types/letestforrent'
import { useurl } from '~/composable/apiurl'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
interface FetchResponse {
    data: {
        value: {
            LatestPropertyData: rent[]
        }
    }
}
let selected = ref('Sort by Newest')
let sorting: string[] = ['Sort by Newest', 'Sort by Oldest', 'Sory by featured', 'Sort by price (Low to high)'];
let store = useSidebarfilterStore();
let route = useRoute();
let router = useRouter();
let showfilter = ref<boolean>(false)
let { data: listdata }: FetchResponse = await useFetch(useurl + '/data/property.json')
store.getdata(listdata.value.LatestPropertyData);
watch(store.filterobject, () => {
    return router.push({
        path: route.fullPath,
        query: { propertyStatus: store.filterobject.propertyStatus, propertyType: store.filterobject.propertyType, rooms: store.filterobject.rooms, bed: store.filterobject.bed, bath: store.filterobject.bath, agencies: store.filterobject.agencies }
    })
}, { deep: true })
watch(store.mapfilterdata, () => {
    store.mapfilterdata()
})
function getvalue(value: string) {
    selected.value = value
}
onMounted(() => {
    store.mapfilterdata()
})
</script>

<style scoped></style>