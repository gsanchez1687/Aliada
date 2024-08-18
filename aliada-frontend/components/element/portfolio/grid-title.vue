<template>
    <section class="portfolio-section portfolio-grid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter-panel">
                        <div class="top-panel tab-icon">
                            <div class="filters respon-filter-content filter-button-group">
                                <ul>
                                    <li :class="active == 'all' ? 'active' : ''" @click="getvalue('all')">
                                        <Icon name="ic:round-house" class="fs-1" />
                                        <span>All Property</span>
                                    </li>
                                    <li :class="active == 'sale' ? 'active' : ''" @click="getvalue('sale')">
                                        <Icon name="solar:sale-linear" class="fs-1" />
                                        <span>Venta</span>
                                    </li>
                                    <li :class="active == 'rent' ? 'active' : ''" @click="getvalue('rent')">
                                        <Icon name="material-symbols:location-on-outline" class="fs-1" />
                                        <span>Renta</span>
                                    </li>
                                    <li :class="active == 'trend' ? 'active' : ''" @click="getvalue('trend')">
                                        <Icon name="fluent:document-one-page-24-regular" class="fs-1" />
                                        <span>Trend</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="column-sm row grid ratio2_3  zoom-gallery-multiple">
                        <div class="sale grid-item wow fadeInUp" :class="classes" v-for="(item, index) in getdata"
                            :key="index">
                            <div class="grid-box">
                                <div class="overlay">
                                    <div class="portfolio-image">
                                        <nuxt-link to="javascript:void(0)" :style="'background-image:url(' + item.src + ')'"
                                            class="bg-size background" @click="showsingle(index)">
                                            <img :src="item.src" class="bg-img d-none" alt="">
                                        </nuxt-link>
                                    </div>
                                </div>
                                <div class="property-text">
                                    <h3><nuxt-link to="/page/portfolio/details">{{ item.title }}</nuxt-link></h3>
                                    <h6>{{ item.details }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script setup lang="ts">
interface MyProps {
    classes: string;
    data: GridTitle[]
}
interface GridTitle {
    src: string;
    type: string;
    title: string;
    details: string;
}
interface img {
    src: string,
    type: string
}
let props = defineProps<MyProps>()
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string[]>([])
let active = ref<string>('all')
let getdata = computed(() => {
    if (active.value == 'all') {
        return props.data
    }
    return props.data.filter((item: img) => item.type == active.value)
})
function showsingle(i: number) {
    index.value = i
    props.data.forEach((element: img) => {
        imgs.value.push(element.src)
    });
    visible.value = true
}
function handleHide() {
    visible.value = false
}
function getvalue(value: string) {
    active.value = value
}
</script>

<style scoped></style>