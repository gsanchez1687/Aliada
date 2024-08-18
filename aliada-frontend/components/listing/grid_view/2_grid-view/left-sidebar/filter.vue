<template>
  <section class="property-section">
    <div class="container">
      <div class="row ratio_63">
        <div class="col-xl-3 col-lg-4">
          <div class="left-sidebar" :style="left ? 'left:-1px' : 'left:-365px'">
            <div class="filter-cards">
              <div class="advance-card">
                <div class="back-btn d-lg-none d-block" @click="left = false">
                  Atrás
                </div>
                <h5 class="mb-0 advance-title">Filtro de búsqueda</h5>
              </div>
              <div class="advance-card">
                <h6>{{ "Filtros" }}</h6>
                <div class="row gx-2">
                  <ElementFilteroptionStatus :data="data" />
                  <ElementFilteroptionType :data="data" />
                  <ElementFilteroptionRooms :data="data" />
                  <ElementFilteroptionBath :data="data" />
                 <!--  <div class="col-sm-6 mb-3">
                    <ElementFilteroptionBed :data="data" />
                  </div>
                  <div class="col-sm-6 mb-3">
                    
                  </div> -->
                  <!-- <ElementFilteroptionAgencies :data="data" /> -->
                  <ElementFilteroptionPrice
                    label="Precio"
                    width="width: 262px"
                  />
                  <ElementFilteroptionArea label="Superficie" width="width: 262px" />
                  <div class="col-12">
                    <nuxt-link
                      to="/"
                      class="btn btn-gradient color-4 btn-block btn-pill mt-2"
                      >Buscar propiedades
                    </nuxt-link>
                  </div>
                </div>
              </div>
              <ListingGridView2GridViewLeftSidebarAdvanceCard />
            </div>
          </div>
        </div>
        <ListingGridView2GridViewLeftSidebarListing
          :data="store.alllistdata"
          @showfilter="showfilter"
        />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import backendServices from "~/services/BackendServices";
import { useFiltersStore } from "~/store/filter";
import { useSidebarfilterStore } from "~/store/sidebarfilter";

let left = ref<boolean>(false);
let route = useRoute();
let router = useRouter();
let store = useSidebarfilterStore();
const data = useFiltersStore().data;

const fetchData = async () => {
  await backendServices
    .getAllProperty({},1)
    .then((response: any) => {
      const listdata = response.data;
      store.getdata(listdata);
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });
};

watch(
  store.filterobject,
  () => {
    return router.push({
      path: route.fullPath,
      query: {
        propertyStatus: store.filterobject.propertyStatus,
        propertyType: store.filterobject.propertyType,
        rooms: store.filterobject.rooms,
        bed: store.filterobject.bed,
        bath: store.filterobject.bath,
        agencies: store.filterobject.agencies,
      },
    });
  },
  { deep: true }
);
watch(store.filterdata, () => {
  store.filterdata();
});
function showfilter(value: boolean) {
  left.value = value;
}

onMounted(() => {
  fetchData();
  store.filterdata();
});
</script>

