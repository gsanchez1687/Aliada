<template>
    <div class="col-xl-9 col-lg-8 property-grid-2">
        <div class="filter-panel">
            <div class="top-panel">
                <div>
                    <h2>Todas las propiedades</h2>
                    <span class="show-result">Mostrando <span>1-{{ store.alldata.to }} de {{ store.alldata.total }}</span> Propiedades</span>
                </div>
                <ul class="grid-list-filter d-flex">
                    <!-- <li>
                        <div class="dropdown">
                            <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span>{{ selected }}</span>
                                <i class="fas fa-angle-down ms-lg-3 ms-2"></i></span>
                            <div class="dropdown-menu text-start">
                                <nuxt-link class="dropdown-item" to="javascript:void(0)" v-for="(item, index) in sorting"
                                    :key="index" @click="getvalue(item)">{{ item }}</nuxt-link>
                            </div>
                        </div>
                    </li> -->
                    <!-- <li class="collection-grid-view" :class="active == 'list' ? 'd-none' : ''">
                        <ul>
                            <li @click="classes = 'col-lg-6'"><img src="/image/icon/2.png" alt=""
                                    class="product-2-layout-view"></li>
                            <li @click="classes = 'col-lg-4'"><img src="/image/icon/3.png" alt=""
                                    class="product-3-layout-view"></li>
                            <li @click="classes = 'col-xl-3'"><img src="/image/icon/4.png" alt=""
                                    class="product-4-layout-view"></li>
                        </ul>
                    </li> -->
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
                    <li class="d-lg-none d-block">
                        <div>
                            <h6 class="mb-0 mobile-filter font-roboto" @click="showfilter()">Filtros de búsqueda
                                <Icon name="uim:align-center" />
                            </h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <ListingGridView2GridViewLeftSidebarListingdata :classes="classes" :data="props.data" :lview="lview" />
    </div>
</template>

<script setup lang="ts">
// import type { rent } from '~/static/data/types/letestforrent';
import { useSidebarfilterStore } from '~/store/sidebarfilter';
import { Navigation, Pagination } from 'swiper';
interface MyProps {
    data: any[]
}
let store = useSidebarfilterStore();
let props = defineProps<MyProps>();
let show = ref(false)
let classes = ref<string>('col-md-6')
let lview = ref<string>('')
let sorting: string[] = ['Lo más nuevo', 'Lo más antiguo', 'Destacadas', 'Por precio (menor a mayor)'];
let selected = ref('Filtrar por...')
let active = ref<string>('grid')
let emit = defineEmits(['showfilter'])
function getvalue(value: string) {
    selected.value = value
    store.newtoolddata(value)
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
function showfilter() {
    show.value = true
    emit('showfilter', show.value)
}
</script>

<style lang="scss" scoped></style>
