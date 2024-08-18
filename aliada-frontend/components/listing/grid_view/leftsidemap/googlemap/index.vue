<template>
    <ListingGridViewLeftsidemapGooglemapList :data="store.alllistdata" />
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
onMounted(() => {
    store.mapfilterdata()
})
</script>
 
<style scoped></style>