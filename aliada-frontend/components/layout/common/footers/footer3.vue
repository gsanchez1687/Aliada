<template>
    <footer>
        <div class="footer footer-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="footer-details text-center">
                            <nuxt-link to="/">
                                <img src="/image/logo/footer-logo.png" alt="">
                            </nuxt-link>
                            <p>Elegant retreat in a quiet Coral Gables setting. This home provides
                                wonderful entertaining spaces with a chef kitchen opening
                            </p>
                            <h6>Contact us</h6>
                            <ul class="icon-list">
                                <li><nuxt-link to="/contact/contact-3"><i class="fas fa-map-marker-alt"></i></nuxt-link>
                                </li>
                                <li><nuxt-link to="/contact/contact-3"><i class="fas fa-phone-alt"></i></nuxt-link></li>
                                <li><nuxt-link to="/page/otherpages/signup"><i class="fas fa-envelope"></i></nuxt-link></li>
                                <li><nuxt-link to="/contact/contact-3"><i class="fas fa-globe"></i></nuxt-link></li>
                                <li><nuxt-link to="/contact/contact-3"><i class="fas fa-wifi"></i></nuxt-link></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <LayoutElementsFooterElementFooter3Footerlinks />
                        </div>
                        <LayoutElementsFooterElementFooter3Footerblog />
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer footer-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="copy-right">
                            <p class="mb-0">Copyright 2023, All Right Reserved Aliada</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 text-end">
                        <ul class="sub-footer-link">
                            <li><nuxt-link to="/home/corporate">Home</nuxt-link></li>
                            <li><nuxt-link to="/page/otherpages/terms-condition">Terms</nuxt-link></li>
                            <li><nuxt-link to="/page/otherpages/privacy-policy">Privacy policy</nuxt-link></li>
                            <li><nuxt-link to="/contact/contact-2">Contact</nuxt-link></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script lang="ts" setup>
</script>

<style lang="scss" scoped></style>