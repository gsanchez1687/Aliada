<template>
    <section class="portfolio-section portfolio-grid creative-3">
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
                                        <span>For Sale</span>
                                    </li>
                                    <li :class="active == 'rent' ? 'active' : ''" @click="getvalue('rent')">
                                        <Icon name="material-symbols:location-on-outline" class="fs-1" />
                                        <span>For Rent</span>
                                    </li>
                                    <li :class="active == 'trend' ? 'active' : ''" @click="getvalue('trend')">
                                        <Icon name="fluent:document-one-page-24-regular" class="fs-1" />
                                        <span>Trend</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <masonry-wall :items="getdata" :ssr-columns="4" :column-width="400"
                        class="row grid ratio_square  zoom-gallery-multiple m-0">
                        <template #default="{ item, index }">
                            <div class="overlay">
                                <div class="portfolio-image">
                                    <nuxt-link to="javascript:void(0)" @click="showsingle(index)">
                                        <img :src="item.src" class="bg-img img-fluid" alt="">
                                    </nuxt-link>
                                </div>
                            </div>
                        </template>
                    </masonry-wall>
                </div>
            </div>
        </div>
    </section>
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script setup lang="ts">
interface Creative { src: string, type: string }
interface MyProps { data: Creative[] }
let props = defineProps<MyProps>()
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string[]>([])
let active = ref<string>('all')
let getdata = computed<Creative[]>(() => {
    if (active.value == 'all') {
        return props.data
    }
    return props.data.filter((item: Creative) => item.type == active.value)
})
function showsingle(i: number) {
    index.value = i
    props.data.forEach((element) => {
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