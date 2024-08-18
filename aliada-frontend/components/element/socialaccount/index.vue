<template>
  <div class="divider">
    <h6>or</h6>
  </div>
  <div>
    <h6>Log in with</h6>
    <div class="row social-connect">
      <div class="col-6" v-for="(item, index) in Social" :key="index">
        <nuxt-link :to="item.link" class="btn btn-social btn-flat p-0" :class="item.class"><i :class="item.icon"></i>
          <span>{{ item.class }}</span>
        </nuxt-link>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Social {
  link: string,
  class: string,
  icon: string
}
interface FetchResponse {
  data: {
    value: {
      social: Social[];
    };
  }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/agency.json')
const Social: Social[] = data.value.social
</script>

<style scoped></style>