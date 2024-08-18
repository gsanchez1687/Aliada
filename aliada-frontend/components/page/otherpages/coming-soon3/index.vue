<template>
    <div class="coming-soon comingsoon-countdown coming-left background bg-size"
        style="background-image:url(/image/inner-pages/coming-soon2.jpg)">
        <img src="/image/inner-pages/coming-soon2.jpg" alt="" class="img-fluid bg-img d-none">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-md-8 offset-md-2">
                    <div class="coming-soon-detail">
                        <div>
                            <div class="logo">
                                <nuxt-link to="/home/corporate">
                                    <img src="/image/logo/3.png" alt="" class="img-fluid">
                                </nuxt-link>
                            </div>
                            <h2 class="font-roboto">
                                <span>Counter </span> site is coming soon...
                            </h2>
                            <div class="timer">
                                <ul>
                                    <li><span id="days">{{ days }}</span>days</li>
                                    <li><span id="hours">{{ hours }}</span>Hour</li>
                                    <li><span id="minutes">{{ minutes }}</span>min</li>
                                    <li><span id="seconds">{{ seconds }}</span>sec</li>
                                </ul>
                            </div>
                            <form action="#" class="theme-form w-100">
                                <div class="form-group">
                                    <input type="text" name="password" id="name" class="form-control"
                                        placeholder="Enter your email address">
                                    <button type="submit" class="btn btn-solid color-3 btn-flat">subscribe</button>
                                </div>
                            </form>
                            <div class="social-coming">
                                <ul>
                                    <li><nuxt-link to="https://www.facebook.com/"><i
                                                class="fab fa-facebook-f"></i></nuxt-link></li>
                                    <li><nuxt-link to="https://twitter.com/"><i class="fab fa-twitter"></i></nuxt-link></li>
                                    <li><nuxt-link to="https://account.google.com"><i
                                                class="fab fa-google-plus-g"></i></nuxt-link></li>
                                </ul>
                                <p>Copyright 2023, All Right Reserved Aliada </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const td = ref<number>(0)
const days = ref<number>(0)
const hours = ref<number>(0)
const minutes = ref<number>(0)
const seconds = ref<number>(0)
const startTime = ref<string | number>('')
const endTime = ref<string | number>('')
function timer() {
    setInterval(() => {
        endTime.value = new Date().getTime()
        startTime.value = new Date('10 Jun, 2023 00:00:00').getTime(),
            td.value = endTime.value - startTime.value
        if (td.value >= 0) {
            seconds.value = Math.floor(td.value / 1000 % 60);
            minutes.value = Math.floor(td.value / 1000 / 60 % 60);
            hours.value = Math.floor(td.value / (1000 * 60 * 60) % 24);
            days.value = Math.floor(td.value / (1000 * 60 * 60 * 24));
        } else {
            seconds.value = minutes.value = hours.value = days.value = 0;
        }
    });

}
onMounted(() => {
    timer()
})
</script>

<style scoped></style>