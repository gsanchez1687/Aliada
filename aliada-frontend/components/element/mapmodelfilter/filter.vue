<template>
    <div class="col-xl-3 col-lg-4">
        <div class="left-sidebar" :style="showfilter ? 'left:-1px' : 'left:-365px'">
            <div class="filter-cards">
                <div class="advance-card">
                    <div class="back-btn d-lg-none d-block" @click="hidefilter()">
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
                        <div class="col-sm-12 mb-3">
                            <ElementFilteroptionBed :data="data" />
                        </div>
                        <div class="col-sm-12 mb-3">
                            <ElementFilteroptionBath :data="data" />
                        </div>
                        <ElementFilteroptionAgencies :data="data" />
                        <ElementFilteroptionPrice label="Price" width="width: 262px" />
                        <ElementFilteroptionArea label="Area" width="width: 262px" />
                        <div class="col-12">
                            <nuxt-link to="/" class="btn btn-gradient color-2 btn-block btn-pill mt-2">Search </nuxt-link>
                        </div>
                    </div>
                </div>
                <ElementMapmodelfilterAdvacecard />
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { useSidebarfilterStore } from '~/store/sidebarfilter';
import type {rent} from '~/static/data/types/letestforrent'
import { useFiltersStore } from "~/store/filter.js";
let props = defineProps({
    showfilter: Boolean
})
interface FetchResponse {
    data: {
        value: {
            LatestPropertyListingInEnterprise: rent[]

        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let left = ref<boolean>(false)
left.value = props.showfilter
let route = useRoute();
let router = useRouter();
let store = useSidebarfilterStore();
const data = useFiltersStore().data;
let { data: listdata } = await useFetch(useurl + '/data/property.json')
let emit = defineEmits(['hide'])
store.getdata(listdata.value.LatestPropertyListingInEnterprise);
watch(store.filterobject, () => {
    return router.push({
        path: route.fullPath,
        query: { propertyStatus: store.filterobject.propertyStatus, propertyType: store.filterobject.propertyType, rooms: store.filterobject.rooms, bed: store.filterobject.bed, bath: store.filterobject.bath, agencies: store.filterobject.agencies }
    })
}, { deep: true })
watch(store.setfilter, () => {
    store.setfilter()
})
function hidefilter() {
    left.value = false
    emit('hide', left.value)
}
onMounted(() => {
    store.setfilter()
})
</script>
    