<template>
  <div v-if="propertiesData !== null" >
    <div v-if="propertiesData.data.length > 0">
    <ListingListViewMapGoogleList :properties="propertiesData" />
  </div>
  <div v-else>
    <div class="not-found-wrapper">
      <p><img class="icon-house-not-found" src="/svg/home-not-found.svg"/></p>
      <h3>Lo sentimos...</h3>
      <p>No encontramos propiedades que coincidan con tu búsqueda.
      </p>
      <p><!-- Link to the property map -->
        <NuxtLink class="btn btn-gradient color-4" to="/">Buscar propiedades</NuxtLink></p>
      </div>
  </div>
</div>
</template>
<script setup lang="ts">
import { useRouter } from "vue-router";
import backendServices from "~/services/BackendServices";
const propertiesData = ref<any>(null);
  const router = useRouter();
const filter = {
  "categoryProperty": router.currentRoute.value.query.categoryProperty,
  "priceProperty": router.currentRoute.value.query.priceProperty,
  "typeProperty" : router.currentRoute.value.query.typeProperty,
  "areaProperty" : router.currentRoute.value.query.areaProperty,
  "roomsProperty" : router.currentRoute.value.query.roomsProperty,
  "bathsProperty" : router.currentRoute.value.query.bathsProperty,
} 

const fetchData = async () => {
  await backendServices
    .getAllProperty( filter,1)
    .then((response: any) => {
      propertiesData.value = response.data;

    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });
};

onMounted(() => {
  fetchData();
});


</script>

<style scoped>

.icon-house-not-found{
  display: block;
  width: 100px;
}

.not-found-wrapper{
  display: flex;
  flex-direction: column;
  align-items: center; /* This aligns the child vertically */
  justify-content: center; /* This aligns the child horizontally */
  height: 70vh;
  padding: 3em;
}

.not-found-wrapper p{
  text-align: center;
}

</style>
