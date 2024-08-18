<template>
    <section class="single-property mt-0 pt-0">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-xl-9 col-lg-8">
                    <div class="description-section tab-description">
                        <div class="image_section row zoom-gallery-multiple gx-3">
                            <div class="col-sm-8">
                                <a href="javascript:void(0)" @click="showsingle()">
                                    <img src="/image/parallax/4.jpg" class="img-fluid bg-img h-100" alt="">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="img-property">
                                            <a href="javascript:void(0)" @click="showsingle()">
                                                <img src="/image/property/15.jpg" class="img-fluid bg-img" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="img-property">
                                            <a href="javascript:void(0)" @click="showsingle()">
                                                <img src="/image/property/14.jpg" class="img-fluid bg-img" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desc-box">
                            <ElementSinglepropertytabs />
                        </div>
                        <PropertySingle1Singlereview />
                        <PropertySingle2RelatedProperty />
                    </div>
                </div>
                <PropertySingle1Filter />
            </div>
        </div>
    </section>
    <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="imgs" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script setup lang="ts">
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<string[]>([])
let image: string[] = ['/image/parallax/4.jpg', '/image/property/15.jpg', '/image/property/14.jpg']
function showsingle() {
    imgs.value = image
    visible.value = true
}

function handleHide() {
    visible.value = false
}
</script>

<style scoped></style>