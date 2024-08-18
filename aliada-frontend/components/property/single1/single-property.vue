<template>
    <section class="single-property">
        <div class="container">
            <div class="row ratio_65">
                <div class="col-xl-9 col-lg-8">
                    <div class="description-section">
                        <div class="description-details">
                            <div class="desc-box">
                                <div class="menu-top py-0" :class="fixed ? 'sticky' : ''" id="searchBar">
                                    <div class="container">
                                        <ul class="nav">
                                            <li class="active"><nuxt-link to="#about" class="nav-link">about</nuxt-link>
                                            </li>
                                            <li><nuxt-link class="nav-link" to="#feature">feature</nuxt-link></li>
                                            <li><nuxt-link class="nav-link" to="#gallery">gallery</nuxt-link></li>
                                            <li><nuxt-link class="nav-link" to="#video">video</nuxt-link></li>
                                            <li><nuxt-link class="nav-link" to="#details">details</nuxt-link></li>
                                            <li><nuxt-link class="nav-link" to="#floor_plan">Floor plan</nuxt-link></li>
                                            <li><nuxt-link class="nav-link" to="#location-map">Location</nuxt-link></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="about page-section" id="about">
                                    <h4>Property Brief</h4>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p>Residences can be classified by and how they are connected to neighbouring
                                                residences and land.
                                                Different types of housing tenure can be used for the same physical type.
                                            </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p>connected residences might be owned by a single entity and leased out, or
                                                owned separately
                                                with an agreement covering the relationship between units and common.</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p>they are connected to neighbouring residences and land.
                                                Different types of housing tenure can be used for the same physical type.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <PropertySingle1SingleFeature />
                            <PropertySingle1SingleGallery />
                            <PropertySingle1Video />
                            <PropertySingle1Detail />
                            <PropertySingle1Florplan />
                            <PropertySingle1Location />
                            <PropertySingle1Singlereview />
                        </div>
                    </div>
                </div>
                <PropertySingle1Filter />
            </div>
        </div>
    </section>
    <PropertySingle1RelatedProperty />
</template>

<script setup lang="ts">
let fixed = ref(false)
onMounted(() => {
    window.addEventListener('scroll', function headfix() {
        if (window.scrollY > 600) {
            fixed.value = true
        }
        else {
            fixed.value = false
        }
    })
})
</script>

<style scoped></style>