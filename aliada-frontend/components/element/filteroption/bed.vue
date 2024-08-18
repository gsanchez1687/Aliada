<template>
    <div :class="props.label ? 'col-lg-6' : 'col-lg-12'">
        <div class="form-group m-0">
            <label v-if="props.label">{{ props.label }}</label>
            <label v-if="props.labels">{{ props.labels }}</label>
            <div class="dropdown">
                <span class="dropdown-toggle font-rubik d-flex justify-content-between align-items-center"
                    data-bs-toggle="dropdown" @click="open = !open"><span>{{ route.query.bed ? route.query.bed : bed }}</span>
                    <Icon name="material-symbols:keyboard-arrow-down" class="fs-5" />
                </span>
                <div class="dropdown-menu text-start" :class="open ? 'show' : ''">
                    <nuxt-link class="dropdown-item" v-for="(bed, index) in data" :key="index"
                        @click.prevent="getstatus(bed.name)" to="javascript:void(0)">{{ bed.name }}</nuxt-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useSidebarfilterStore } from '~/store/sidebarfilter'
let props = defineProps({
    label: String,
    data: Object,
    labels: String
})
let store = useSidebarfilterStore();
let router = useRouter();
let route = useRoute();
let bed = ref<string>('Área (M²)')
let open = ref<boolean>(false);
let data = computed<void>(() => {
    return props.data.filter((item: string) => item.filter === 'bed')[0].bed
})
function getstatus(value: string) {
    bed.value = value;
    store.getbed(value)
    store.filterdata();
    store.mapfilterdata();
}
</script>

<style lang="scss" scoped></style>