<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="single-gallery mb-4">
                <div class="blog-sidebar modal-form">
                    <div class="filter-cards">
                        <div class="advance-card">
                            <h6>Request exploration</h6>
                            <div class="category-property">
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="phone number" class="form-control" name="mobnumber"
                                            id="tbNumbers" type="tel" maxlength="9" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea placeholder="Message" class="form-control" rows="3"></textarea>
                                    </div>
                                    <nuxt-link to="/agent/submit-property" type="submit"
                                        class="btn btn-gradient color-2 btn-block btn-pill">Submit
                                        Request</nuxt-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <swiper class="gallery-for" :loop="true" :thumbs="{ swiper: thumbsSwiper }" :effect="'fade'"
                    :modules="setting">
                    <swiper-slide v-for="(img, index) in Gallery" :key="index" class="height">
                        <div class="bg-size background" :style="'background-image:url(' + img.src + ')'">
                            <img :src="img.src" class="bg-img d-none img" alt="">
                        </div>
                    </swiper-slide>
                </swiper>
                <swiper @swiper="setThumbsSwiper" :loop="true" :slidesPerView="4" :freeMode="true" :modules="setting"
                    :watchSlidesProgress="true" class="gallery-nav">
                    <swiper-slide v-for="(img, index) in Gallery" :key="index" class="thumbnail-image">
                        <img :src="img.src" class="img-fluid" alt="">
                    </swiper-slide>
                </swiper>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import { FreeMode, Navigation, EffectFade, Thumbs } from 'swiper';
import "swiper/css/effect-fade";
interface Gallery { src: string }
interface FetchResponse {
    data: {
        value: {
            gallary: Gallery[]
        }
    }
}
let { data: single }: FetchResponse = await useFetch(useurl + '/data/propertysingleiamge.json')
const Gallery: Gallery[] = single.value.gallary
let thumbsSwiper = ref();
let setting = [FreeMode, Navigation, Thumbs, EffectFade]
const setThumbsSwiper = (swiper: null) => {
    thumbsSwiper.value = swiper;
}

</script>

<style scoped></style>