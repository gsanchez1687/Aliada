<template>
    <section class="property-section">
        <div class="container">
            <div class="row ratio_55">
                <ListingTablayoutTableftsidebarTablisting :data="store.alllistdata" />
                <div class="col-xl-3 col-lg-4">
                    <div class="left-sidebar">
                        <div class="filter-cards">
                            <div class="advance-card">
                                <div class="back-btn d-lg-none d-block">
                                    Back
                                </div>
                                <h5 class="mb-0 advance-title">Advance search </h5>
                            </div>
                            <div class="advance-card">
                                <h6>{{ 'filter' }}</h6>
                                <div class="row gx-2">
                                    <ElementFilteroptionStatus :data="data" />
                                    <ElementFilteroptionType :data="data" />
                                    <ElementFilteroptionRooms :data="data" />
                                    <div class="col-sm-6 m-0">
                                        <ElementFilteroptionBed :data="data" />
                                    </div>
                                    <div class="col-sm-6 m-0">
                                        <ElementFilteroptionBath :data="data" />
                                    </div>
                                    <ElementFilteroptionAgencies :data="data" />
                                    <ElementFilteroptionPrice label="Price" width="width: 262px" />
                                    <ElementFilteroptionArea label="Area" width="width: 262px" />
                                    <div class="col-12">
                                        <nuxt-link to="/" class="btn btn-gradient color-2 btn-block btn-pill mt-2">Search
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                            <ListingListViewListingLeftsidebarAdvanceCard />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { useSidebarfilterStore } from '~/store/sidebarfilter'
import { useFiltersStore } from "~/store/filter.js";
import type {rent} from '~/static/data/types/letestforrent'
interface FetchResponse {
    data: {
        value: {
            LatestPropertyListingInEnterprise: rent[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>
let route = useRoute();
let router = useRouter();
let store = useSidebarfilterStore();
const data = useFiltersStore().data;
let { data: apidata } = await useFetch(useurl + '/data/left-sidebar-filter.json');
let { data: listdata } = await useFetch(useurl + '/data/property.json')
store.getdata(listdata.value.LatestPropertyListingInEnterprise);
watch(store.filterobject, () => {
    return router.push({
        path: route.fullPath,
        query: { propertyStatus: store.filterobject.propertyStatus, propertyType: store.filterobject.propertyType, rooms: store.filterobject.rooms, bed: store.filterobject.bed, bath: store.filterobject.bath, agencies: store.filterobject.agencies }
    })
})
watch(store.setfilter, () => {
    store.setfilter();
})
onMounted(() => {
    store.setfilter()
})
</script>
    