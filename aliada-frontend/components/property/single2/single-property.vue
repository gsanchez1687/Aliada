<template>
    <section class="single-property mt-0 pt-0">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-xl-9 col-lg-8">
                    <div class="description-section tab-description">
                        <div class="image_section row zoom-gallery-multiple gx-3">
                            <div class="col-sm-8">
                                <a href="javascript:void(0)" @click="showsingle()">
                                    <img :src="arrayImages[0]" class="img-fluid bg-img max-height max-width" alt="">
                                </a>
                            </div>
                            <div class="col-sm-4"> <!--max-height-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="img-property">
                                            <a href="javascript:void(0)" @click="showsingle()">
                                                <img :src="arrayImages[1]" class="img-fluid bg-img" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="img-property">
                                            <a href="javascript:void(0)" @click="showsingle()">
                                                <img :src="arrayImages[2]" class="img-fluid bg-img" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="desc-box">
                            <ElementSinglepropertytabs  :property = "props.property"/>
                        </div>
                        <!--<PropertySingle1Singlereview />-->
                    </div>
                    <PropertySingle2RelatedProperty  :propertyRelated = "props.property.property_related"/>
                </div>
                <PropertySingle1Filter />
            </div>
        </div>
    </section>
 <vue-easy-lightbox scrollDisabled escDisabled moveDisabled :visible="visible" :imgs="arrayImages" :index="index"
        @hide="handleHide"></vue-easy-lightbox>
</template>

<script setup lang="ts">
const props = defineProps({
  property: Object,
});

const config = useRuntimeConfig();
console.log(props.property)
let visible = ref<boolean>(false)
let index = ref<number>(0)
let imgs = ref<any>([])

const arrayImages = computed(() => {
  if (props.property !== null && Array.isArray(props.property.images)) {
    let images = []
    props.property.images.forEach(element => {
        images.push(config.public.baseURL+'/storage/'+element.url)
    });
    return images
  } else {
    return [];
  }
});

console.log(arrayImages.value)

function showsingle() {
    imgs.value = arrayImages
    visible.value = true
}

function handleHide() {
    visible.value = false
}
</script>

<style scoped>
.max-height{
    max-height: 600px;
}
.max-width{
    width: 100%;
}
</style>