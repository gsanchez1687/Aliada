<template>
    <div class="col-lg-3 col-md-4">
        <div class="footer-links footer-left-space">
            <h5 class="footer-title" @click="toggle = !toggle">Useful links
                <span class="according-menu"> <i :class="toggle ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i></span>
            </h5>
            <ul class="footer-content" :class="toggle ? 'd-block' : 'd-none d-md-block'">
                <li v-for="(item, index) in Links_Data" :key="index">
                    <nuxt-link :to="item.link">{{ item.name }}</nuxt-link>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-2 col-md-4">
        <div class="footer-links">
            <h5 class="footer-title" @click="feature = !feature">feature
                <span class="according-menu"><i :class="feature ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i></span>
            </h5>
            <ul class="footer-content" :class="feature ? 'd-block' : 'd-none d-md-block'">
                <li v-for="(item, index) in Feature_Data" :key="index">
                    <nuxt-link :to="item.link">{{ item.name }}</nuxt-link>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-2 col-md-4">
        <div class="footer-links">
            <h5 class="footer-title" @click="social = !social">social
                <span class="according-menu"><i :class="social ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i></span>
            </h5>
            <ul class="footer-content" :class="social ? 'd-block' : 'd-none d-md-block'">
                <li v-for="(item, index) in social_Data" :key="index">
                    <nuxt-link :to="item.link">{{ item.name }}</nuxt-link>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="footer-links">
            <h5 class="footer-title" @click="subscribe = !subscribe">subscribe
                <span class="according-menu"><i :class="subscribe ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i></span>
            </h5>
            <div class="footer-content" :class="subscribe ? 'd-block' : 'd-none d-md-block'">
                <p class="mb-0">
                    Real estate investing involves the purchase, Improvement of realty, management and sale or rental of
                    real estate for profit.
                </p>
                <form>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Email Address" required>
                        <span class="input-group-apend">
                            <button type="submit" class="input-group-text" id="basic-addon2"><i
                                    class="fas fa-paper-plane"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
interface Links {
    name: string;
    link: string;
}
interface FetchResponse {
    data: {
        value: {
            links: Links[]
            feature: Links[]
            social: Links[]
        }
    }
}
const { data }: FetchResponse = await useFetch(useurl + '/data/footer3.json')
const Links_Data: Links[] = data.value.links
const Feature_Data: Links[] = data.value.feature
const social_Data: Links[] = data.value.social
let toggle = ref<boolean>(false)
let feature = ref<boolean>(false)
let social = ref<boolean>(false)
let subscribe = ref<boolean>(false)
</script>

<style lang="scss" scoped></style>
