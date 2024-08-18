<template>
  <swiper class="testimonial-2 " :slides-per-view="1" dir="ltr" v-bind="setting" :autoplay="{
    delay: 2500,
  }" navigation>
    }" navigation>
    <swiper-slide v-for="(item, index) in AllClient" :key="index">
      <div class="client-slider light-bg">
        <div class="user-list">
          <ul>
            <li>
              <img :src="item.img2" alt="">
            </li>
            <li>
              <img :src="item.img1" alt="">
              <div class="heart-bg"></div>
              <img src="/image/testimonial/heart.png" class="heart-icon" alt="">
            </li>
            <li>
              <img :src="item.img3" alt="">
            </li>
          </ul>
          <p>{{ item.detail }}</p>
          <h6>{{ 'real estate' }}</h6>
          <ul class="client-rating">
            <li><i class="fas fa-star"></i></li>
            <li><i class="fas fa-star"></i></li>
            <li><i class="fas fa-star"></i></li>
            <li><i class="fas fa-star"></i></li>
            <li><i class="fas fa-star"></i></li>
          </ul>
          <nuxt-link to="/agent/agent-profile">
            <span class="label label-white label-lg">
              <span class="gradient-1 color-6">{{ item.name }}</span>
            </span>
          </nuxt-link>
        </div>
      </div>
    </swiper-slide>
  </swiper>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
import "swiper/css/navigation";
import { Navigation, EffectFade, Autoplay } from 'swiper';
interface HappyClient {
  img1: string;
  img2: string;
  img3: string;
  name: string,
  detail: string,
}
interface FetchResponse {
  data: {
    value: {
      HappyClient: HappyClient[]
    }
  }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/clientAgent.json')
let AllClient: HappyClient[] = data.value.HappyClient
let setting = {
  modules: [Navigation, EffectFade, Autoplay],

}

</script>

<style lang="scss" scoped></style>