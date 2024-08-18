<template>
    <div class="col-lg-12">
        <div class="form-group m-0">
            <label v-if="props.label">{{ props.label }}</label>
            <div class="dropdown">
                <span class="dropdown-toggle font-rubik d-flex justify-content-between align-items-center"
                    data-bs-toggle="dropdown" @click="open = !open"><span>{{
                        route.query.agencies ? route.query.agencies : agencies }}</span>
                    <Icon name="material-symbols:keyboard-arrow-down" class="fs-5" />
                </span>
                <div class="dropdown-menu text-start" :class="open ? 'show' : ''">
                    <nuxt-link class="dropdown-item" v-for="(agency, index) in data" :key="index"
                        @click.prevent="getstatus(agency.name)" to="javascript:void(0)">{{ agency.name }}</nuxt-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useSidebarfilterStore } from '~/store/sidebarfilter'
let props = defineProps({
    label: String,
    data: Object
})
let route = useRoute();
let router = useRouter();
let store = useSidebarfilterStore();
let agencies = ref<string>('Agencies')
let open = ref<boolean>(false);
let data = computed<void>(() => {
    return props.data.filter((item: string) => item.filters === 'agencies')[0].agencies
})

function getstatus(value: string) {
    agencies.value = value;
    store.getagency(value);
    store.filterdata();
    store.mapfilterdata();
}
</script>

<style lang="scss" scoped></style>