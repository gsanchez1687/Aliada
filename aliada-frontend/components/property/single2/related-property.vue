<template>
  <section class="property-section pt-t-40">
    <div class="container">
      <div class="title-3 text-start inner-title">
        <h2>Propiedades Similares</h2>
      </div>
      <div class="row ratio_55">
        <div class="col-12 property-grid-3">
          <div
            class="property-2 row column-sm zoom-gallery property-label property-grid"
          >
            <div
              class="col-md-6 sale grid-item wow fadeInUp"
              v-for="(item, index) in propertyRelated"
              :key="index"
            >
              <div class="property-box">
                <div class="property-image btn-color">
                  <swiper
                    :loop="true"
                    navigation
                    :modules="[Navigation, Pagination]"
                    :pagination="{ clickable: true }"
                    class="property-slider"
                  >
                    <swiper-slide
                      v-for="(img, index) in item.images"
                      :key="index"
                    >
                      <a
                        href="javascript:void(0)"
                        :style="
                          'background-image:url(' +
                          config.public.baseURL +
                          '/storage/' +
                          img.url +
                          ')'
                        "
                        class="bg-size background"
                      >
                        <img
                          :src="config.public.baseURL + '/storage/' + img.url"
                          class="bg-img d-none"
                          alt=""
                        />
                      </a>
                    </swiper-slide>
                  </swiper>
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
                  <div class="seen-data">
                    <Icon name="material-symbols:android-camera-outline" />
                    <span>{{ item.images.length }}</span>
                  </div>
                  <div class="overlay-property-box">
                    <!-- <nuxt-link
                      to="javascript:void(0)"
                      class="effect-round"
                      data-bs-toggle="tooltip"
                      data-bs-placement="left"
                      title="compare"
                      @click="compare(item)"
                    >
                      <Icon
                        name="material-symbols:shuffle"
                        class="text-black"
                      />
                    </nuxt-link>
                    <nuxt-link
                      to="javascript:void(0)"
                      class="effect-round like added"
                      data-bs-toggle="tooltip"
                      data-bs-placement="left"
                      title="wishlist"
                      @click="wishlist(item)"
                    >
                      <Icon
                        :name="
                          'heart-straight-thin'
                        "
                        class="text-black"
                      />
                    </nuxt-link> -->
                  </div>
                </div>
                <ElementPropertyDetails :item="item" color="color-4" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { Navigation, Pagination } from "swiper";

import { useSidebarfilterStore } from "~/store/sidebarfilter";
const props = defineProps({
  propertyRelated: Object,
});
const config = useRuntimeConfig();

let compareproduct = ref<rent[]>([]);
let store = useSidebarfilterStore();

let favproduct = ref<rent[]>([]);
function compare(value: rent) {
  compareproduct.value.push(value);
  store.compare(compareproduct.value);
}
function wishlist(value: rent) {
  favproduct.value.push(value);
  store.wishlist(favproduct.value);
}
</script>

<style scoped></style>
