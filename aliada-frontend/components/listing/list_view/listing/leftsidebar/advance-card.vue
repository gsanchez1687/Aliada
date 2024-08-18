<template>
    <div class="advance-card">
        <h6>Category</h6>
        <div class="category-property">
            <ul>
                <li v-for="(item, index) in alldata" :key="index"><nuxt-link to="javascript:void(0)"
                        @click="store.filtercategory(item.name)"><i class="fas fa-arrow-right me-2"></i>{{ item.name }}
                        <span class="float-end">({{ item.total }})</span></nuxt-link></li>
            </ul>
        </div>
    </div>
    <div class="advance-card">
        <h6>Contact Info</h6>
        <div class="category-property">
            <ul>
                <li v-for="(detail, index) in info" :key="index">
                    <Icon :name="detail.icon" /> {{ detail.name }}
                </li>
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
</template>

<script setup lang="ts">
import { useSidebarfilterStore } from '~/store/sidebarfilter'
import { useurl } from '~/composable/apiurl'
interface Category {
    name: string;
    total: string
}
interface Info {
    name: string;
    icon: string,
}
interface Added {
    img: string;
    title: string;
    price: string;
}
interface FetchResponse {
    data: {
        value: {
            category: Category[];
            info: Info[];
            added: Added[];
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>
let { data: apidata } = await useFetch(useurl + '/data/left-sidebar-filter.json')
let alldata = apidata.value.category
let store = useSidebarfilterStore();
let info = apidata.value.info
let added = apidata.value.added
</script>

<style scoped></style>