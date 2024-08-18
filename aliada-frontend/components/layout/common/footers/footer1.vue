<template>
    <footer class="footer-brown">
        <div class="footer footer-custom-col">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-md-6 order-xl">
                        <div class="footer-links footer-details">
                            <h5 class="footer-title d-md-none" @click="toggle = !toggle">
                                {{ 'Contact us' }}
                                <span class="according-menu">
                                    <i :class="toggle ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                                </span>
                            </h5>
                            <div class="footer-content" :class="toggle ? 'd-block' : 'd-none d-md-block'">
                                <nuxt-link to="/">
                                    <img v-if="logo" src="/image/logo/1.png" class="img-fluid" />
                                    <img v-else src="/image/logo/6.png" class="img-fluid" />
                                </nuxt-link>
                                <p>{{ peragraph }}</p>
                                <div class="footer-contact">
                                    <ul>
                                        <li>
                                            <Icon name="material-symbols:location-on" class="me-3" />
                                            {{ 'A-32, Albany, Newyork.' }}
                                        </li>
                                        <li>
                                            <Icon name="material-symbols:call" class="me-3" />
                                            (+066) 518 - 457 - 5181
                                        </li>
                                        <li>
                                            <Icon name="material-symbols:mail" class="me-3" />
                                            Contact@gmail.com
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <LayoutElementsFooterElementAboutfooter />
                    <LayoutElementsFooterElementLocationfooter />
                    <LayoutElementsFooterElementTagfooter />
                    <LayoutElementsFooterElementBlogfooter />
                </div>
            </div>
        </div>
        <LayoutElementsFooterElementSubfooter1 />
    </footer>
</template>

<script lang="ts" setup>
defineProps({
    logo: String
})
const peragraph = ref<string>('This home provides entertaining spaces with a kitchen opening...')
let toggle = ref<boolean>(false)
</script>

<style lang="scss" scoped></style>