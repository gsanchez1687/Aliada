<template>
    <footer class="footer-light">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="footer-links footer-details">
                            <h5 class="footer-title d-md-none" @click="toggle = !toggle">
                                {{ title }}
                                <span class="according-menu">
                                    <i :class="toggle ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                                </span>
                            </h5>
                            <div class="footer-content" :class="toggle ? 'd-block' : 'd-none d-md-block'">
                                <nuxt-link to="/">
                                    <img src="/image/logo/aliada-realestate-color-logo.png" class="for-light" alt="" style="margin-top: -2em !important; margin-bottom: 2em !important;">
                                    <img src="/image/logo/aliada-realestate-white-logo.png" class="for-dark" alt="" style="margin-top: -2em !important; margin-bottom: 2em !important;">
                                </nuxt-link>
                                <p class="mt-2">{{ content }}</p>
                                <div class="footer-contact">
                                    <ul>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> {{ address }}
                                        </li>
                                        <li>
                                            <i class="fas fa-phone-alt"></i> {{ number }}
                                        </li>
                                        <li>
                                            <i class="fas fa-envelope"></i> {{ email }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <LayoutElementsFooterElementFooter4 />
                </div>
            </div>
        </div>
        <LayoutElementsFooterElementSubfooter1 classname="sub-footer-dark" />
    </footer>
</template>

<script lang="ts" setup>
let title: string = 'Contáctanos'
let content: string = 'Tu Socio Estratégico Para Hacer Negocios Inmobiliarios'
let address: string = 'Cancún, México.'
let number: string = '(+52) 111 111 111'
let email: string = 'info@aliadarealestate.com'
let toggle = ref<boolean>(false)
</script>

<style lang="scss" scoped>

@media (max-width: 767px) {
    footer.footer-light .footer-links .footer-content {
        padding: 15px 10px;
    }

    footer.footer-light .footer-links .footer-content img.for-light {
        padding-top: 25px !important;
    }
}

</style>