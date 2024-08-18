<template>
    <section class="property-section">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-12 property-grid-3">
                    <div class="filter-panel tab-top-panel">
                        <div class="top-panel">
                            <div class="filters respon-filter-content filter-button-group">
                                <ul>
                                    <li :class="tab == 'allproperty' ? 'active' : ''" data-filter="*"
                                        @click="allproperty('allproperty')"><span>All Property</span></li>
                                    <li :class="tab == 'forsale' ? 'active' : ''" data-filter=".sale"
                                        @click="forsale('forsale')"><span>For Sale</span></li>
                                    <li :class="tab == 'forrent' ? 'active' : ''" data-filter=".rent"
                                        @click="forrent('forrent')"><span>For rent</span></li>
                                </ul>
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
                    <ListingTablayoutTablayoutTablisting :data="store.alllistdata" />
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
let tab = ref<string>('allproperty')
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
    store.mapfilterdata();
})
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
function getvalue(value: string) {
    selected.value = value
}
function close(value: boolean) {
    showfilter.value = value
}
onMounted(() => {
    store.mapfilterdata()
})
</script>
