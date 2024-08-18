<template>
    <div class="col-lg-9">
        <div class="dashboard-content">
            <div class="privacy-setting" id="privacy">
                <div class="common-card">
                    <div class="common-header">
                        <h5>Privacy</h5>
                        <p class="font-roboto">Define your privacy settings</p>
                    </div>
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
                    <PageUserPanelUserPrivacyAccount />
                </div>
            </div>
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
            privacy: Privacy[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/user-payment.json')
const privacy: Privacy[] = data.value.privacy
</script>

<style scoped></style>