<template>
    <section class="property-section property-list-thumbnail">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-12 property-grid-slider property-grid-3">
                    <div class="filter-panel">
                        <div class="top-panel">
                            <div>
                                <h2>Properties Listing</h2>
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
                                        <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span>{{ selected
                                        }}</span> <i class="fas fa-angle-down ms-lg-3 ms-2"></i></span>
                                        <div class="dropdown-menu text-start">
                                            <nuxt-link class="dropdown-item" to="javascript:void(0)"
                                                v-for="(item, index) in sorting" :key="index" @click="getvalue(item)">{{
                                                    item }}</nuxt-link>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ElementDropdownfilter :showfilter="showfilter" @closefilter="close" />
                    <ListingListViewVideoVideolist :data="store.alllistdata" />
                </div>
            </div>
        </div>
    </section>
</template>
 
<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
import type {rent} from '~/static/data/types/letestforrent'
interface FetchResponse {
    data: {
        value: {
            LatestPropertyListingInEnterprise: rent[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>
let sorting: string[] = ['Sort by Newest', 'Sort by Oldest', 'Sory by featured', 'Sort by price (Low to high)'];
let showfilter = ref<boolean>(false)
let selected = ref('Sort by Newest')
let store = useSidebarfilterStore();
let route = useRoute();
let router = useRouter();
let { data: listdata } = await useFetch(useurl + '/data/property.json')
store.getdata(listdata.value.LatestPropertyListingInEnterprise);
watch(store.filterobject, () => {
    return router.push({
        path: route.fullPath,
        query: { propertyStatus: store.filterobject.propertyStatus, propertyType: store.filterobject.propertyType, rooms: store.filterobject.rooms, bed: store.filterobject.bed, bath: store.filterobject.bath, agencies: store.filterobject.agencies }
    })
}, { deep: true })
watch(store.mapfilterdata, () => {
    store.mapfilterdata()
})
function close(value: boolean) {
    showfilter.value = value;
}
function getvalue(value: string) {
    selected.value = value
}
onMounted(() => {
    store.mapfilterdata()
})
</script>
 
<style scoped></style>