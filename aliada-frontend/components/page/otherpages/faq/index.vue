<template>
    <section class="faq-section log-in">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <div class="faq-image text-center">
                        <img src="/image/inner-pages/3.svg" class="img-fluid" alt="">
                        <h3>Have Any Questions ?</h3>
                        <p class="font-roboto">You can ask anything you want to know</p>
                    </div>
                    <form>
                        <div class="form-group mb-0">
                            <label>Let me know</label>
                            <input type="text" class="form-control" placeholder="Ask a question" required>
                        </div>
                        <button type="submit" class="btn btn-gradient color-2">Send</button>
                    </form>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="faq-questions" v-for="(item, index) in alldata" :key="index">
                        <div class="title-3 text-start">
                            <h2>{{ item.title }}</h2>
                        </div>
                        <div id="accordion" class="accordion">
                            <div class="card" v-for="(card, index) in item.accordion" :key="index">
                                <div class="card-header">
                                    <nuxt-link class="card-link" data-bs-toggle="collapse" :to="card.link"
                                        aria-expanded="true">
                                        {{ card.heading }}
                                    </nuxt-link>
                                </div>
                                <div :id="card.id" class="collapse" :class="card.id == 'collapseOne' ? 'show' : ''"
                                    data-bs-parent="#accordion">
                                    <div class="card-body">
                                        {{ card.details }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
interface Faq {
    title: string,
    accordion: Accordian[]
}
interface Accordian {
    link: string,
    heading: string,
    id: string,
    details: string
}
interface FetchResponse {
    data: {
        value: {
            faq: Faq[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/faq.json')
let alldata: Faq[] = data.value.faq
</script>

<style scoped></style>