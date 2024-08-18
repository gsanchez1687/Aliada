<template>
    <head>
        <title>Aliada - Tu socio estratégico para hacer negocios inmobiliarios.</title>
    </head>
    <LayoutLayoutsLayout8>
        <HomeSearchtab />
        <HomeSearchtabProperty1 :title="'Oportunidades destacadas en Venta'" :details="''" :data="sales"  />
        <!--<HomeSearchtabProperty1 :title="'Oportunidades en Renta'" :details="''" :data="rent"  />-->
        <!--<HomeSearchtabFetureProperty />
        <HomeSearchtabPropertyServices />
        <HomeSearchtabPropertyListing />-->
        <HomeSearchtabVideo />
        <HomeSearchtabHappyclient />
        <!--<HomeSearchtabSubscribe />-->
        <HomeSearchtabAgent />
        <!--<HomeSearchtabBrand />-->
        <ElementTaptopTapTop6 />
    </LayoutLayoutsLayout8>
</template>

<script lang="ts" setup>
import backendServices from "~/services/BackendServices";
const sales = ref<Object>()
const rent = ref<Object>()
const fetchData = async () => {
    
 await backendServices
    .getHomePropertySales()
    .then((response: any) => {
        sales.value = response.data    
    })
    .catch((error: any) => {
      console.error("Error al obtener datos sales:", error);
    });

await backendServices
    .getHomePropertyRent()
    .then((response: any) => {
        rent.value = response.data    
    })
    .catch((error: any) => {
      console.error("Error al obtener datos sales:", error);
    });
};

fetchData()

import { usecustomizerStore } from '~/store/costomizer';
let themes = ref({
    theme1: '--theme-default6',
    theme2: '--theme-default7',
})
usecustomizerStore().getproperty(themes.value)

useHead({
      title: "Tu socio estratégico para hacer negocios inmobiliarios."
})

</script>

<style lang="scss" scoped></style>