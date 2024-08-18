<template>
    <section class="portfolio-details">
        <div class="container">
            <div class="row details-row " v-for="(item, index) in alldata" :key="index">
                <div class="col-lg-6 ratio_70">
                    <div class="details-image grid-box">
                        <div class="overlay">
                            <div class="portfolio-image bg-size background" :style="'background-image:url(' + item.src + ')'">
                                <img :src="item.src" alt="" class="bg-img d-none">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="details-right">
                        <div>
                            <h3>{{ item.title }}</h3>
                            <p>{{ item.details }}</p>
                            <ul class="agent-social">
                                <li v-for="(icon, index) in item.icons" :key="index"><nuxt-link :to="icon.link"
                                        :class="icon.aclass"><i :class="icon.iclass"></i></nuxt-link></li>
                            </ul>
                        </div>
                        <div class="project-details">
                            <h3>Project Detail</h3>
                            <div class="detail-container d-flex" v-for="(detail, index) in details" :key="index">
                                <div class="portfolio-left">
                                    <h6 class="text-start">{{ detail }} :</h6>
                                </div>
                                <div class="portfolio-right">
                                    <h6>{{ item[detail] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row portfolio-section zoom-gallery-multiple gy-md-4 gy-3 ratio_square">
                <div class="grid-item col-lg-3 col-sm-6" v-for="(item, index) in getdata()" :key="index">
                    <div class="grid-box">
                        <div class="overlay">
                            <div class="portfolio-image">
                                <nuxt-link tp="javascript:void(0)" :style="'background-image:url(' + item.src + ')'"
                                    class="bg-size background" @click="showsingle(index)">
                                    <img :src="item.src" class="bg-img d-none" alt="">
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="theme-pagination" v-if="alldata[0].img.length > parpagedata">
                <ul class="pagination">
                    <li class="page-item">
                        <nuxt-link class="page-link" to="javascript:void(0)" aria-label="Previous" @click="currentpage--">
                            <span aria-hidden="true">«</span>
                        </nuxt-link>
                    </li>
                    <li class="page-item" :class="currentpage == page ? 'active' : ''" v-for="(page, index) in  totalpage"
                        :key="index"><nuxt-link class="page-link" to="javascript:void(0)" @click="pageview(page)">{{ page
                        }}</nuxt-link></li>
                    <li class="page-item">
                        <nuxt-link class="page-link" to="javascript:void(0)" aria-label="Next" @click="currentpage++">
                            <span aria-hidden="true">»</span>
                        </nuxt-link>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>
<script setup lang="ts">
import Details from '~/static/data/types/details'
interface MyProps { data: Details[] }
let props = defineProps<MyProps>()
let alldata = props.data
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string[]>([])
let details: string[] = ['client', 'date', 'link']
let parpagedata = ref<number>(6)
let currentpage = ref<number>(1)
let totalpage: number = Math.ceil(alldata[0].img.length / parpagedata.value)
function showsingle(i: number) {
    index.value = i
    alldata.forEach((element) => {
        element.img.forEach((item) => {
            imgs.value.push(item.src)
        })
    });
    visible.value = true
}
function handleHide() {
    visible.value = false
}
function getdata() {
    let start = (currentpage.value - 1) * parpagedata.value;
    let end = start + parpagedata.value
    return alldata[0].img.slice(start, end)
}
function pageview(page: number) {
    currentpage.value = page
}
</script>