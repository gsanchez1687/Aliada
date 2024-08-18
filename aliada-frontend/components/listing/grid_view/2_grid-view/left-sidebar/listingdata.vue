<template>
  <ListingGridView2GridViewLeftSidebarFilterTag />
  <div class="property-wrapper-grid">
    <div
      class="property-2 row column-sm zoom-gallery property-label property-grid"
      :class="lview">
      <div
        class="wow fadeInup"
        :class="classes"
        v-for="(item, index) in props.data.data"
        :key="index"
      >
        <div class="property-box">
          <div class="property-image btn-color">
            <swiper :loop="true" navigation :modules="[Navigation , Pagination]" :pagination="{clickable:true}" class="property-slider">
              <swiper-slide v-for="(img, index) in item.images" :key="index">
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
              <!-- <span v-if="item.type_property.name == 'En venta'" class="label label-success">{{ item.type_property.name }}</span>-->
            </div>
            <div class="seen-data">
              <Icon name="material-symbols:android-camera-outline" />
              <span>{{ item.images.length }}</span>
            </div>
            <div class="overlay-property-box">
              <nuxt-link
                to="javascript:void(0)"
                class="effect-round"
                data-bs-toggle="tooltip"
                data-bs-placement="left"
                title="compare"
                @click="compare(item)"
              >
                <Icon name="material-symbols:shuffle" />
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
                    fill?.find((ele) => ele.id == item.id)
                      ? 'ph:heart-straight-fill'
                      : 'ph:heart-straight-thin'
                  "
                  class="text-black"
                />
              </nuxt-link>
            </div>
          </div>
          <ElementPropertyDetails :item="item" color="color-2" />
        </div>
      </div>
    </div>
  </div>
  <nav class="theme-pagination" v-if="props.data.length > parpagedata">
    <ul class="pagination">
      <li class="page-item">
        <nuxt-link
          class="page-link"
          to="javascript:void(0)"
          aria-label="Previous"
          @click="currentpage--"
        >
          <span aria-hidden="true">«</span>
        </nuxt-link>
      </li>
      <li
        class="page-item"
        :class="currentpage == page ? 'active' : ''"
        v-for="(page, index) in totalpage"
        :key="index"
      >
        <nuxt-link
          class="page-link"
          to="javascript:void(0)"
          @click="pageview(page)"
          >{{ page }}</nuxt-link
        >
      </li>
      <li class="page-item">
        <nuxt-link
          class="page-link"
          to="javascript:void(0)"
          aria-label="Next"
          @click="currentpage++"
        >
          <span aria-hidden="true">»</span>
        </nuxt-link>
      </li>
    </ul>
  </nav>
</template>
<script setup lang="ts">
import { Navigation, Pagination } from 'swiper';
import { useSidebarfilterStore } from '~/store/sidebarfilter';
interface MyProps {
  data: any;
  classes: string;
  lview: string;
}
let props = defineProps<MyProps>();
let fill = ref<any>([]);
let parpagedata = ref<number>(6);
let currentpage = ref<number>(1);

let totalpage: number = 1;
let store = useSidebarfilterStore();

let compareproduct = ref<any[]>([]);
let favproduct = ref<any[]>([]);
const config = useRuntimeConfig();

function compare(value: any) {
  compareproduct.value.push(value);
  store.compare(compareproduct.value);
}
function wishlist(value: any) {
  favproduct.value.push(value);
  store.wishlist(favproduct.value);
}
function pageview(page: number) {
  currentpage.value = page;
}
onMounted(() => {
  if (!process.client) return;
  const storedData = localStorage.getItem("wishlist");
  if (storedData) {
    try {
      fill.value = JSON.parse(storedData);
    } catch (error) {
      console.error("Error parsing wishlist data:", error);
    }
  }
});
</script>
