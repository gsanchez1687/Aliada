<template>
    <div class="filter-cards">
        <div class="advance-card">
            <h6>Request exploration</h6>
            <div class="category-property">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input placeholder="phone number" class="form-control" name="mobnumber" id="tbNumbers" type="tel"
                            maxlength="9" required>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Message" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient color-2 btn-block btn-pill">Submit
                        Request</button>
                </form>
            </div>
        </div>
        <PropertySingle1Filteroptions />
        <div class="advance-card">
            <h6>Recently Added</h6>
            <div class="recent-property">
                <ul>
                    <li v-for="(item, index) in Added" :key="index">
                        <div class="media">
                            <img :src="item.img" class="img-fluid" alt="">
                            <div class="media-body">
                                <h5>{{ item.title }}</h5>
                                <span>$ {{ item.price }} / <span>Month</span></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Added {
    title: string;
    img: string;
    price: string;
}
interface FetchResponse {
    data: {
        value: {
            added: Added[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/left-sidebar-filter.json')
const Added: Added[] = data.value.added
</script>

<style scoped></style>