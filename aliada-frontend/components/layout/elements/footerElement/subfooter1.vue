<template>
    <div class="sub-footer" :class="props.classname">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="footer-social sub-footer-link">
                        <ul>
                            <li>
                                <nuxt-link to="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></nuxt-link>
                            </li>
                            <li>
                                <nuxt-link to="https://www.instagram.com/"><i class="fab fa-instagram"></i></nuxt-link>
                            </li>
                            <li>
                                <nuxt-link to="https://accounts.google.com/"><i class="fab fa-linkedin"></i></nuxt-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 text-end">
                    <div class="copy-right">
                        <p class="mb-0">
                            {{ '© Copyright 2024 Aliada | Made with' }}
                            <svg v-if="router.fullPath == '/' || router.fullPath == '/home/filter_slider'"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-heart">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                </path>
                            </svg>
                            <i v-else class="fas fa-heart"></i>
                            {{ 'by Celery Agency' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
let props = defineProps({
    classname: String
})
let router = useRoute()
</script>

<style lang="scss" scoped></style>
