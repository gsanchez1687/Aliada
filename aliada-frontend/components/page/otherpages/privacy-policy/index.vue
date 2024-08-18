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
                                        :class="active == 'Information' ? 'active' : ''" to="#intro"
                                        @click="getlink('Information')">Information</nuxt-link></li>
                                <li class="nav-item"><nuxt-link class="nav-link" :class="active == 'How We Use' ? 'active' : ''"
                                        to="#howuse" @click="getlink('How We Use')">How We Use</nuxt-link></li>
                                <li class="nav-item"><nuxt-link class="nav-link"
                                        :class="active == 'Third-Party Privacy' ? 'active' : ''" to="#thirdparty"
                                        @click="getlink('Third-Party Privacy')">Third-Party Privacy</nuxt-link></li>
                                <li class="nav-item"><nuxt-link class="nav-link"
                                        :class="active == 'Advertising' ? 'active' : ''" to="#advertising"
                                        @click="getlink('Advertising')">Advertising</nuxt-link>
                                </li>
                                <li class="nav-item"><nuxt-link class="nav-link"
                                        :class="active == 'GDPR Privacy' ? 'active' : ''" to="#dpr"
                                        @click="getlink('GDPR Privacy')">GDPR Privacy</nuxt-link></li>
                            </ul>
                            <div class="terms-bottom-content">
                                <img src="/image/others/1.svg" alt="" class="img-fluid">
                                <nuxt-link to="javascript:void(0)" class="btn btn-gradient color-2 btn-pill"
                                    download>Download Doc</nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
                <PageOtherpagesPrivacyPolicyDetails />
            </div>
        </div>
    </section>
</template>
 
<script setup lang="ts">
let active = ref<string>('Information')
function getlink(value: string) {
    active.value = value
}
</script>
 
<style scoped></style>