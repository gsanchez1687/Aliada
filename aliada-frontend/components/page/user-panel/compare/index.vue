<template>
    <section class="compare-section">
        <div class="container">
            <div class="compare-page">
                <div class="table-wrapper table-responsive text-center">
                    <table class="table" v-if="compare.length > 0">
                        <thead>
                            <tr class="th-compare">
                                <td>Action</td>
                                <th class="item-row" v-for="(i, index) in compare" :key="index">
                                    <button type="button" class="remove" @click="remove(index)">Remove</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table-compare">
                            <tr>
                                <th class="property-name">Property Image</th>
                                <td class="item-row" v-for="(item, index) in compare" :key="index">
                                    <img :src="item.img[0]" alt="" class="featured-image">
                                    <div class="property_price">
                                        <h6 class="color-2">
                                            <nuxt-link to="/agent/submit-property">{{ item.title }}</nuxt-link>
                                        </h6>
                                        <span class="color-2">${{ item.price }}</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="property-name">Property Description</th>
                                <td class="item-row" v-for="(item, index) in compare" :key="index">
                                    <p class="description-compare">{{ item.details }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class="property-name">Recámaras</th>
                                <td v-for="(item, index) in compare" :key="index"><span>{{ item.bed }}</span></td>
                            </tr>
                            <tr>
                                <th class="property-name">Baño</th>
                                <td v-for="(item, index) in compare" :key="index"><span>{{ item.bath }}</span></td>
                            </tr>
                            <tr>
                                <th class="property-name">m2</th>
                                <td v-for="(item, index) in compare" :key="index"><span>{{ item.sqft }}</span></td>
                            </tr>
                            <tr>
                                <th class="property-name">Ubicación</th>
                                <td v-for="(item, index) in compare" :key="index"><span>{{ item.country }}</span></td>
                            </tr>
                            <tr>
                                <th class="property-name">Disponible</th>
                                <td v-for="(item, index) in compare" :key="index"><span>{{ item.type }}</span></td>
                            </tr>
                            <tr>
                                <th class="property-name">Lista de deseos</th>
                                <td class="available-stock" v-for="(i, index) in compare.length" :key="index">
                                    <nuxt-link to="/" class="add-to-wish btn btn-gradient color-2 btn-block btn-pill">Add to
                                        wishlist</nuxt-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <ElementEmptydataEmptycomper v-else />
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import type {rent} from '~/static/data/types/letestforrent'
let compare = ref<rent[]>([])

function remove(index: number) {
    compare.value.splice(index, 1)
    localStorage.setItem('campare', JSON.stringify(compare.value))
}
onMounted(() => {
    if (!process.client) return;
    const storedCompare = localStorage.getItem('campare');
    if (storedCompare) {
        try {
            compare.value = JSON.parse(storedCompare);
        } catch {
        }
    }
})
</script>

<style scoped></style>