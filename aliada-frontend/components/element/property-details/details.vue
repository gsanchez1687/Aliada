<template>
  <div class="property-details">
    <p class="font-roboto state-muinipality">

      <span v-if="item.type_property.name === 'Casa'">
        {{ item.type_property.name }}
      </span>
      <span v-else-if="item.type_property.name === 'Departamento'" class="ellipsis">
        {{ item.type_property.name }}
      </span>
      en {{ item.state_name }} - {{ item.municipality_name }}
    </p>
    <div class="style-name-property">
      <h3><nuxt-link :to="'/property/single-property/' + item.slug" target="_blank">{{ item.title }}</nuxt-link></h3>
    </div>
    
    <h6>${{ formatNumber(item.price) }} MXN</h6>
    <p class="font-roboto description-trim">{{ item.description }}</p>
    <ul>
      <li>
        <img src="/image/svg/icon/double-bed.svg" class="img-fluid" alt="" /><!-- {{
          "Recámaras"
        }}
        : --> {{ item.rooms }}
      </li>
      <li>
        <img src="/image/svg/icon/bathroom.svg" class="img-fluid" alt="" /><!-- {{
          "Baños"
        }}
        : --> {{ item.bathroom }}
      </li>
      <li>
        <img src="/image/svg/icon/square-ruler-tool.svg" class="img-fluid ruler-tool" alt="" /> {{ item.square_meters }}
        m<sup>2</sup>
      </li>
    </ul>
    <div class="property-btn d-flex">

      <nuxt-link :to="'/property/single-property/' + item.slug" class="btn btn-dashed btn-pill color-4" :class="color"
        @click="getimges(item.images)">Ver más</nuxt-link>
    </div>
    <!-- <span>{{ formatDate(item.created_at) }}</span> -->
  </div>
</template>

<script setup lang="ts">
  import { format } from "date-fns";
  interface MyProps {
    item: any;
    color: string;
  }
  let props = defineProps<MyProps>();
  function getimges(value: string[]) {
    let images = useCookie<string[]>("images");
    images.value = value;
  }
  function formatDate(dateString: any) {
    return format(new Date(dateString), "dd/MM/yyyy");
  }
  const formatNumber = (number: number) => {
   return new Intl.NumberFormat("es-ES").format(number);
  };
</script>

<style scoped>
.state-muinipality {
  font-size: 14px;
  margin-top: -10px;
  margin-bottom: 5px;
}

.description-trim {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-bottom: 10px;
  max-width: 300px;
  /* Adjust width as necessary to fit your design */
}
.style-name-property{
  color:#6332B8;
}
.style-name-property h3 a{
  color:#6332B8;
}
.style-name-property h3 a:hover{
  color:#7158e2;
}
</style>
