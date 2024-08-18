<template>
    <div class="col-lg-3">
        <div class="sidebar-user sticky-cls">
            <div class="user-profile">
                <div class="media">
                    <div class="change-pic">
                        <img src="/image/avatar/3.jpg" class="img-fluid update_img" alt="">
                        <div class="change-hover">
                            <button type="button" class="btn">
                                <Icon name="material-symbols:android-camera-outline" />
                            </button>
                            <input class="updateimg" type="file" name="img">
                        </div>
                    </div>
                    <div class="media-body">
                        <h5>Zack Lee</h5>
                        <h6 class="font-roboto">zackle@gmail.com</h6>
                        <h6 class="font-roboto mb-0">+91 846 - 547 - 210</h6>
                    </div>
                </div>
                <div class="connected-social">
                    <h6>Connect with</h6>
                    <ul class="agent-social">
                        <li v-for="(item, index) in socials" :key="index"><nuxt-link :to="item.link" :class="item.class"><i
                                    :class="item.icon"></i></nuxt-link></li>
                    </ul>
                </div>
            </div>
            <ElementUserPanelNavtabs :active="active" />
        </div>
    </div>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Social {
    link: string,
    class: string,
    icon: string
}
interface FetchResponse {
    data: {
        value: {
            social: Social[];
        };
    }
}
defineProps({
    active: String
})
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/agency.json')
const socials: Social[] = data.value.social

</script>

<style scoped></style>