<template>
    <div class="col-lg-4 contact_section contact_right">
        <div class="row">
            <div class="col-lg-12 col-sm-6" v-for="(item, index) in alldata" :key="index">
                <div class="contact_wrap">
                    <Icon :name="item.icon" />
                    <h4>{{ item.title }}</h4>
                    <p class="font-roboto" v-if="item.phone">{{ item.add }} <br>
                        {{ item.add2 }} <br>
                        {{ item.phone }}
                    </p>
                    <ul v-if="item.phone2">
                        <li>Inquiries: {{ item.inq }}</li>
                        <li>Support: {{ item.supp }}</li>
                        <li>{{ item.phone2 }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface contact {
    icon: string,
    title: string,
    add?: string,
    add2?: string
    phone?: string,
    inq?: string,
    supp?: string,
    phone2?: string,
}
interface FetchResponse {
    data: {
        value: {
            address: contact[];
        };
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/contact.json')
let alldata: contact[] = data.value.address
</script>

<style scoped></style>