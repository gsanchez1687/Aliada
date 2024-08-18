<template>
    <div class="col-xl-4 col-md-6 wow fadeInUp" v-for="(item, index) in props.data" :key="index">
        <div class="property-box">
            <div class="property-image">
                <nuxt-link to="/"
                class="bg-size d-block"
                :style="'background-image: url(' + config.public.baseURL + '/storage/' + item.images[0].url + ');'">
                    <img :src="config.public.baseURL + '/storage/' +item.images[0].url" class="bg-img d-none" alt="">
                    <div class="labels-left">
                        <div>
                            <span
                        v-if="
                          item.label.name == 'Vendido' ||
                          item.label.name == 'No disponible'
                        "
                        :class="'label-shadow'"
                        class="label"
                        >{{ item.label.name }}
                      </span>
                      <span v-else class="label label-success"
                        >{{ item.label.name }}
                      </span>
                        </div>
                     
                    </div>
                </nuxt-link>
                <div class="bottom-property">
                    <div class="d-flex">
                        <div>
                            <h5>
                                <nuxt-link :to="'/property/single-property/' + item.slug">{{ item.title }}</nuxt-link>
                            </h5>
                            <h6> ${{ formatNumber(item.price) }} MXN <small>/ {{ 'Desde' }}</small></h6>
                        </div>
                        <nuxt-link :to="'/property/single-property/' + item.slug" class="btn btn-gradient mt-3"
                            :class="color ? color : 'color-6'" >{{ 'Ver propiedad' }}</nuxt-link>
                    </div>
                    <div class="overlay-option">
                        <ul>
                            <!--<li v-for="(option, index) in catagory" :key="index">
                                <span>{{ option.name }}kkk</span>
                                <h6 v-if="option.key === 'area'">120 m<sup>2</sup></h6>
                                <h6 v-else>{{ item[option.key] }}kk</h6>
                            </li>-->
                            <!-- <li>
                                <span>Tipo</span>
                                <h6>{{ item.type_property.name}}</h6>                     
                            </li> -->

                            <li>
                                <span>Tipo</span>
                                <h6>
                                  <span v-if="item.type_property.name === 'Casa'">
                                    <img class="svg-icon" width="16" src="/svg/home.svg" />
                                    {{ item.type_property.name }}
                                  </span>
                                  <span v-else-if="item.type_property.name === 'Departamento'" class="ellipsis">
                                    <img class="svg-icon" width="16" src="/svg/apartments.svg" />
                                    {{ item.type_property.name }}
                                  </span>
                                  <span v-else-if="item.type_property.name === 'Terreno'">
                                    <img class="svg-icon" width="16" src="/svg/land.svg" /> 
                                    {{ item.type_property.name }}
                                  </span>
                                </h6>
                              </li>

                            <li>
                                <span>Recámaras</span>
                                <h6><img class="svg-icon" width="16" src="/svg/bed.svg" /> {{item.rooms}}</h6>
                            </li>
                            <li>
                                <span>Baños</span>
                                <h6> <img class="svg-icon" width="16" src="/svg/bath-tub.svg" /> {{ item.bathroom }}</h6>
                            </li>
                            <li>
                                <span>Área m<sup>2</sup></span>
                                <h6><img class="svg-icon" width="12" src="/svg/angle.svg" /> {{ item.square_meters }} </h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div style="text-align: center;">
    <p><!-- Link to the home page -->
        <NuxtLink class="btn btn-gradient color-4" to="/listing/list_view/map/map-properties">Ver todas las propiedades</NuxtLink></p>
</div>
</template>

<script lang="ts" setup>
const config = useRuntimeConfig();
const formatNumber = (number: number) => {
  return new Intl.NumberFormat("es-ES").format(number);
};

interface MyProps {
    data: Object;
    color: string
}
let props = defineProps<MyProps>()

</script>

<style  scoped>
.bg-size {
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
}

.property-section .listing-hover-property .property-box .bottom-property .overlay-option ul li:nth-child(1) {
    background-color: #63636300 !important;
}
.property-section .listing-hover-property .property-box .bottom-property .overlay-option ul li:nth-child(2) {
    background-color: #63636300 !important;
}
.property-section .listing-hover-property .property-box .bottom-property .overlay-option ul li:nth-child(3) {
    background-color: #63636300 !important;
}
.property-section .listing-hover-property .property-box .bottom-property .overlay-option ul li:nth-child(4) {
    background-color: #63636300 !important;
}

.property-section .listing-hover-property .property-box .bottom-property .overlay-option {
    background-color: rgb(0 0 0 / 0%) !important;
    padding: 0;
}

.ellipsis {
  display: inline-block;
  max-width: 80px; /* Adjust the max-width as needed */
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.overlay-option li span img {
    margin-top:-5x !important;
}

</style>