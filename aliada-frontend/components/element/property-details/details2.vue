<template>
    <div class="property-details">
        <h3>
            <nuxt-link :to="'/property/single-property-6/' + item.id" @click="getimges(item.img)">{{ item.title }}</nuxt-link>
            <p class="font-roboto">{{ item.details }}</p>
            <ul class="icon-property">
                <li>
                    <div class="d-flex">
                        <div class="property-icon" :class="color">
                            <svg class="property-svg">
                                <use xlink:href="/svg/icons.svg#home-heart"></use>
                            </svg>
                        </div>
                        <span>{{ item.home }}</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <div class="property-icon" :class="color">
                            <svg class="property-svg">
                                <use xlink:href="/svg/icons.svg#ruler"></use>
                            </svg>
                        </div>
                        <span>{{ item.sqft }} {{ 'm2' }}</span>
                    </div>
                </li>
            </ul>
            <ul class="icon-property mb-0">
                <li>
                    <div class="d-flex">
                        <div class="property-icon" :class="color">
                            <svg class="property-svg">
                                <use xlink:href="/svg/icons.svg#key"></use>
                            </svg>
                        </div>
                        <span>{{ item.rooms }} {{ 'Rooms' }}</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <div class="property-icon " :class="color">
                            <svg class="property-svg">
                                <use xlink:href="/svg/icons.svg#safety"></use>
                            </svg>
                        </div>
                        <span>{{ item.date }} </span>
                    </div>
                </li>
            </ul>
            <div class="mt-3 text-start">
                <nuxt-link :to="'/property/single-property-6/' + item.id" @click="getimges(item.img)"
                    class="btn btn-light-bg btn-flat" :class="color">{{ 'View Details' }}</nuxt-link>
            </div>
        </h3>
    </div>
</template>

<script setup lang="ts">
import type {rent} from '~/static/data/types/letestforrent'
interface MyProps {
    item: rent;
    color: string;
}
defineProps<MyProps>()
function getimges(value: string[]) {
    let images = useCookie<string[]>('images')
    images.value = value
}
</script>

<style scoped></style>