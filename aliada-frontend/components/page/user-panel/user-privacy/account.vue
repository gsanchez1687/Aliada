<template>
    <div class="privacy-content">
        <h5>Account settings</h5>
        <div class="privacy-content">
            <div class="media" v-for="(item, index) in privacy" :key="index">
                <div class="media-body">
                    <h6 class="font-roboto">{{ item.title }}</h6>
                    <p class="font-roboto">{{ item.desc }}</p>
                </div>
                <label class="switch">
                    <input type="radio" name="radio1" value="option1" :checked="item.checked"><span
                        class="switch-state"></span>
                </label>
            </div>
            <button type="button" class="btn btn-gradient color-2 btn-pill">Save changes</button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Privacy {
    title: string,
    desc: string,
    checked: boolean
}
interface FetchResponse {
    data: {
        value: {
            account: Privacy[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/user-payment.json')
const privacy: Privacy[] = data.value.account
</script>

<style scoped></style>