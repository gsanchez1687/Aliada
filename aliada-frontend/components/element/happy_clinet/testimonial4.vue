<template>
    <div class="testimonial-4">
        <div class="modern-client row">
            <div class="col-lg-6">
                <swiper :modules="setting" v-bind="data" :loop="true" class="img-testimonial">
                    <swiper-slide v-for="(item, index) in alldata" :key="index">
                        <div class="img-left">
                            <!--<img :src="item.img" alt="" class="img-fluid">-->
                            <img src="/image/others/client_testimonial_1.webp" alt="" class="img-fluid">
                        </div>
                    </swiper-slide>
                </swiper>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-9 col-sm-10">
                <div class="right-height">
                    <swiper :modules="setting" v-bind="data" :spaceBetween="70" class="comment-right">
                        <swiper-slide v-for="(item, index) in alldata" :key="index">
                            <div class="media">
                                <div class="media-body">
                                    <nuxt-link to="/page/user-panel/user-profile">
                                        <h3 class="d-flex">{{ item.name }} <span class="label-heart color-4 ms-2"><i
                                                    class="fas fa-heart"></i></span></h3>
                                    </nuxt-link>
                                </div>
                                <ul class="client-rating">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <h6>{{ item.title }}</h6>
                            <p class="font-roboto">{{ item.details }}</p>
                            <span class="font-roboto">{{ item.email }}</span>
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
    interface Client {
        img: string;
        name: string;
        title: string;
        details: string;
        email: string;
    }
    import { Autoplay } from 'swiper';
    let setting = [Autoplay]
    let data = {
        slidesPerView: 1,
        spaceBetween: 50,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: {
            delay: 6000,
        }
    }
    
    // Directly define the data in the component
    const alldata: Client[] = [
        {
            img: "/image/testimonial/3.jpg",
            name: "Juan Morales",
            title: "Elegant type of the Profile...",
            details: "Different types of housing can be use same physical type. Connected residences might be owned by a single entity or owned separately with an agreement covering the relationship between units and common areas and concerns.",
            email: "Eva@inspirythemes.com"
        },
        {
            img: "/image/testimonial/3.jpg",
            name: "Mariela Salas",
            title: "an elegant wave of the hand...",
            details: "Connected residences might be owned by a single entity or owned separately with an agreement covering the relationship between units and common areas and concerns. Different types of housing can be use same physical type.",
            email: "Adaah@inspirythemes.com"
        }
    ];
    </script>
    

<style lang="scss" scoped></style>