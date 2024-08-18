<template>
    <div class="col-xl-3 col-lg-4">
        <div class="sticky-cls blog-sidebar">
            <div class="filter-cards">
                <div class="advance-card">
                    <div class="search-bar">
                        <input type="text" placeholder="Search here..">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="advance-card">
                    <h6>Category</h6>
                    <div class="category-property">
                        <ul>
                            <li v-for="(item, index) in alldata" :key="index"><nuxt-link to="javascript:void(0)"><i
                                        class="fas fa-arrow-right me-2"></i>{{ item.name }} <span class="float-end">({{
                                            item.totle }})</span></nuxt-link></li>
                        </ul>
                    </div>
                </div>
                <div class="advance-card">
                    <h6>Recently Added</h6>
                    <div class="recent-property">
                        <ul>
                            <li v-for="(add, index) in added" :key="index">
                                <div class="media">
                                    <img :src="add.img" class="img-fluid" alt="">
                                    <div class="media-body">
                                        <h5>{{ add.title }}</h5>
                                        <span>${{ add.price }} / <span>Month</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="advance-card">
                    <h6>Popular Tags</h6>
                    <div class="tags">
                        <ul>
                            <li v-for="(item, index) in tags" :key="index">
                                <a href="javascript:void(0)">{{ item }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface FetchResponse {
    data: {
        value: {
            category: Category[];
            added: Added[]
        }
    }
}
interface Category {
    name: string;
    totle: string;
}
interface Added {
    img: string;
    title: string;
    price: string;
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/left-sidebar-filter.json')
let alldata: Category[] = data.value.category
let added: Added[] = data.value.added
let tags: string[] = ['Villas', 'Apartment', 'Hotels', 'Condominiums', 'Duplex', 'Triplex']
</script>

<style scoped></style>