<template>
    <div v-if="property !== null">
    <PropertySingle2SinglePropertyHader :property="property" />
     <PropertySingle2SingleProperty :property="property"/>

     <a :href="info" class="float-whatsapp-aliada" target="_blank">
      <i class="fab fa-whatsapp my-float"></i>
      </a>
      
</div> 
</template>

<script setup lang="ts">
import backendServices from "~/services/BackendServices";
const route = useRoute()
const info = ref('')
const slug = route.params.id
const property = ref<any>(null)
  const config = useRuntimeConfig();
const fetchData = async () => {
 await backendServices
    .getPropertyBySlug(slug)
    .then((response: any) => {
        property.value = response.data
       info.value = "https://api.whatsapp.com/send?phone=+529841156650&text=Hola 👋, quiero más información sobre la propiedad: *" +response.data.title + "*. %0A%0A🔗 Enlace: https://aliadarealestate.com/property/single-property/"+response.data.slug+" "  
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });
};  

/* const fetchData = async () => {
  try {
    const response = await backendServices.getPropertyBySlug(slug);
    property.value = response.data;
    
    const baseURL = config.public.baseURL;
    const propertySlug = response.data.slug;
    
    
    info.value = `https://api.whatsapp.com/send?phone=+56965474833&text=Hola, quiero más información sobre la propiedad: ${response.data.title} Link: ${baseURL}/property/single-property/${propertySlug}`;

  } catch (error) {
    console.error("Error al obtener datos:", error);
  }
}; */



fetchData()
</script>

<style scoped>

.float-whatsapp-aliada{
	position:fixed;
	width:60px;
	height:60px;
	bottom:5%;
	right:5%;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #ccc;
  z-index:100;
}

.my-float{
	margin-top:16px;
}

</style>
