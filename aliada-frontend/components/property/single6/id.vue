<template>
  <section class="p-0 ratio3_2">
    <swiper
      :breakpoints="breakpoints"
      :slidesPerView="'auto'"
      :loop="true"
      class="single-property-slider zoom-image-box zoom-gallery-multiple"
    >
    
      <swiper-slide v-for="(item, index) in images" :key="index">
        <nuxt-link
          to="javascript:void(0)"
          class="zoom"
          @click="showsingle(index)"
        >
          <div
            :style="
              'background-image: url(http://localhost:8000/storage/' + item.url + ')'
            "
            class="bg-size background"
          >
         <img
              :src="'http://localhost:8000/storage/' + item.url"
              class="bg-img d-none"
              alt=""
            />  
          </div>
        </nuxt-link>
      </swiper-slide>
    </swiper>
  </section>
  <PropertySingle6SinglePropertyHader />
   <!-- <PropertySingle6SingleProperty />
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox> -->
</template>

<script setup lang="ts">
let images = useCookie<string[]>("images");
console.log(JSON.stringify(images.value) + "images");
let visible = ref<boolean>(false);
let index = ref<number>(0);
let imgs = ref<string[]>([]);
let image: string[] = images.value;
let breakpoints = {
  320: {
    slidesPerView: 1,
  },
  575: {
    slidesPerView: 2,
  },
  992: {
    slidesPerView: 3,
  },
};
function showsingle(i: number) {
  index.value = i;
  imgs.value = image;
  visible.value = true;
}
function handleHide() {
  visible.value = false;
}
</script>

<style scoped></style>
