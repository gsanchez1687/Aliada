<template>
  <section class="without-top property-main small-section">
    <div class="single-property-section">
      <div class="container">
        <div class="single-title">
          <div class="left-single">
            <div class="d-flex">
              <h2 class="mb-0">{{props.property.title}}</h2>
              <span><span class="label label-shadow ms-2">{{ props.property.label.name }}</span></span>
            </div>
            <p v-if="props.property.category.name == 'Venta'" class="mt-3">
              {{ props.property.type_property.name }} a la {{ props.property.category.name }} en <b>{{ props.property.state_name }} -
              {{ props.property.municipality_name }}</b>
            </p>
            <p v-if="props.property.category.name == 'Renta'" class="mt-3">
              {{ props.property.type_property.name }} en {{ props.property.category.name }} en <b>{{ props.property.state_name }} -
              {{ props.property.municipality_name }}</b>
            </p>
            <ul>
              <li v-if="props.property.rooms">
                <div>
                  <img
                    :src="'/image/svg/icon/double-bed.svg'"
                    class="img-fluid"
                    alt=""
                  />
                  <span>Habitaciones: {{ props.property.rooms }}</span>
                </div>
              </li>
              <li v-if="props.property.bathroom">
                <div>
                  <img
                    :src="'/image/svg/icon/bathroom.svg'"
                    class="img-fluid"
                    alt=""
                  />
                  <span>Baños: {{ props.property.bathroom }}</span>
                </div>
              </li>
              <li>
                <div>
                  <img
                    :src="'/image/svg/icon/bathroom.svg'"
                    class="img-fluid"
                    alt=""
                  />
                </div>
              </li>
              <li v-if="props.property.square_meters">
                <div>
                  <img
                    :src="'/image/svg/icon/square-ruler-tool.svg'"
                    class="img-fluid"
                    alt=""
                  />
                  <span
                    >Área:
                    {{ props.property.square_meters }} m²</span
                  >
                </div>
              </li>
              <li v-if="props.property.parking">
                <div>
                  <img
                    :src="'/image/svg/icon/car.svg'"
                    class="img-fluid"
                    alt=""
                  />
                  <span>Estacionamientos: {{ props.property.parking }}</span>
                </div>
              </li>
            </ul>
            <div class="share-buttons">
              <div class="d-inline-block">
                <!--<nuxt-link to="javascript:void(0)" class="btn btn-gradient btn-pill color-4"><i
                                        class="far fa-share-square"></i>
                                    Compartir
                                </nuxt-link>-->
                <div class="share-hover social-icons">
                  <ul>
                    <li>
                      <a href="https://www.facebook.com/" class="icon-facebook">
                        <Icon name="icon-park:facebook" />
                      </a>
                    </li>
                    <li>
                      <a href="https://twitter.com/" class="icon-twitter">
                        <Icon name="icon-park:twitter" />
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://www.instagram.com/"
                        class="icon-instagram"
                      >
                        <Icon name="skill-icons:instagram" />
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <!--<a href="javascript:void(0)" class="btn btn-dashed btn-pill color-2 ms-md-2 ms-1 save-btn"><i
                                    class="far fa-heart"></i>
                                Save</a>-->
              <!--<a href="javascript:void(0)" class="btn btn-dashed btn-pill color-2 ms-md-2 ms-1"
                                @click="getprint()">
                                <Icon name="mdi:printer" />
                                Imprimir
                            </a>-->
            </div>
          </div>
          <div class="right-single">
            <!--<div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>-->
            <h2 class="price">
              ${{ formatNumber(props.property.price) }} MXN <span>/ Desde</span>
            </h2>
            <div class="feature-label">
              Top Amenidades:

              <span
                v-for="amenity in filteredAmenities"
                :key="amenity.id"
                class="btn btn-dashed color-4 btn-pill"
                
                >{{ amenity.amenity.name }}</span
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const props = defineProps({
  property: Object,
});
const formatNumber = (number:number) =>{
 return new Intl.NumberFormat('es-ES').format(number);
}
const filteredAmenities = computed(() => {
  if (props.property !== null && Array.isArray(props.property.amenities)) {
    return props.property.amenities.slice(0, 5);
  } else {
    return [];
  }
});

</script>

<style scoped>

.share-buttons {
  display: none !important;
}

@media (max-width: 575px) {
    .single-property-section .single-title .label {
        padding: 3px 6px;
        text-align: center;
        line-height: 1.2em;
    }
}

</style>
