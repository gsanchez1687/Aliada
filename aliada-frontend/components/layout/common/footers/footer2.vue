<template>
    <footer class="footer-dark">
        <div class="footer footer-custom-col">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-md-6 order-xl">
                        <div class="footer-links footer-details">
                            <h5 class="footer-title d-md-none active" @click="toggle = !toggle">{{ 'Contact us' }} <span
                                    class="according-menu"><i
                                        :class="toggle ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i></span></h5>
                            <div class="footer-content" :class="toggle ? 'd-block' : 'd-none d-md-block'">
                                <nuxt-link to="/">
                                    <img src="/image/logo/3.png" alt="">
                                </nuxt-link>
                                <p>{{ 'This home provides entertaining spaces with a kitchen opening...' }}</p>
                                <LayoutElementsFooterElementFooter2Contact :data="Contact_Data" />
                            </div>
                        </div>
                    </div>
                    <LayoutElementsFooterElementFooter2About :data="About_Data" />
                    <LayoutElementsFooterElementFooter2Location title="Our Location" />
                    <LayoutElementsFooterElementFooter2Tag :data="Tag_Data" />
                </div>
            </div>
        </div>
        <LayoutElementsFooterElementSubfooter1 classname="sub-footer-dark" />
    </footer>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Contact {
    icon: string;
    title: string;
}
interface About {
    title: string;
    children: {
        name: string;
        link: string;
    }[]
}
interface Tag {
    title: string;
    children: {
        name: string;
        link: string;
    }[]
}
interface FetchResponse {
    data: {
        value: {
            contact: Contact[]
            about: About[]
            tag: Tag[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/footer2.json')
const Contact_Data: Contact[] = data.value.contact
const About_Data: About[] = data.value.about
const Tag_Data: Tag[] = data.value.tag
let toggle = ref<boolean>(false)
</script>

<style lang="scss" scoped></style>
