<template>
    <section class="user-dashboard terms-section">
        <div class="container">
            <div class="row log-in">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-user sticky-cls">
                        <div class="dashboard-list">
                            <h5>Related Topics</h5>
                            <ul class="nav nav-tabs right-line-tab">
                                <li class="nav-item"><nuxt-link class="nav-link"
                                        :class="active == 'Introduction' ? 'active' : ''" to="#intro"
                                        @click="getlink('Introduction')">Introduction</nuxt-link></li>
                                <li class="nav-item"><nuxt-link class="nav-link"
                                        :class="active == 'Restrictions' ? 'active' : ''" to="#restriction"
                                        @click="getlink('Restrictions')">Restrictions</nuxt-link></li>
                                <li class="nav-item"><nuxt-link class="nav-link" :class="active == 'Limitation' ? 'active' : ''"
                                        to="#limitation" @click="getlink('Limitation')">Limitation</nuxt-link></li>
                                <li class="nav-item"><nuxt-link class="nav-link"
                                        :class="active == 'Reservation' ? 'active' : ''" to="#reservation"
                                        @click="getlink('Reservation')">Reservation of Rights</nuxt-link>
                                </li>
                                <li class="nav-item"><nuxt-link class="nav-link" :class="active == 'Disclaimer' ? 'active' : ''"
                                        to="#disclaimer" @click="getlink('Disclaimer')">Disclaimer</nuxt-link></li>
                            </ul>
                            <div class="terms-bottom-content">
                                <img src="/image/others/1.svg" alt="" class="img-fluid">
                                <nuxt-link to="javascript:void(0)" class="btn btn-gradient color-2 btn-pill"
                                    download>Download Doc</nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
                <PageOtherpagesTermsConditionDetails />
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
let active = ref<string>('Introduction')
function getlink(value: string) {
    active.value = value
}
</script>

<style scoped></style>