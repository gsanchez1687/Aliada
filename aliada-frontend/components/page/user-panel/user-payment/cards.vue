<template>
    <div class="col-xl-4 col-sm-6" v-for="(card, index) in allcards" :key="index">
        <div class="payment-card" :class="card.type">
            <div class="card-details">
                <div class="text-end">
                    <h6>{{ card.title }}</h6>
                </div>
                <div class="card-number">
                    <div>
                        <img :src="card.src1" class="img-fluid" alt="">
                        <img :src="card.src2" class="img-fluid" alt="">
                    </div>
                    <h3>{{ card.number }}</h3>
                </div>
                <div class="valid-detail">
                    <div class="title">
                        <span>valid</span>
                        <span>thru</span>
                    </div>
                    <div class="date">
                        <h3>{{ card.date }}</h3>
                    </div>
                </div>
                <div class="name-detail">
                    <div class="name">
                        <h5>{{ card.name }}</h5>
                    </div>
                    <div class="card-img">
                        <img :src="card.typesrc" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="edit-card">
                <nuxt-link data-bs-toggle="modal" data-bs-target="#edit-card" to="javascript:void(0)">edit</nuxt-link>
                <nuxt-link to="javascript:void(0)">delete</nuxt-link>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="payment-card add-card">
            <div data-bs-toggle="modal" data-bs-target="#add-card" class="card-details">
                <div>
                    <i class="fas fa-plus-circle"></i>
                    <h5>add new card</h5>
                </div>
            </div>
        </div>
    </div>
    <teleport to='body'>
        <Transition name="modals">
            <ElementModelsEditCard />
        </Transition>
        <Transition name="modals">
            <ElementModelsAddCard />
        </Transition>
    </teleport>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import Cards from '~/static/data/types/card'
interface FetchResponse {
    data: {
        value: {
            cards: Cards[]
        }
    }
}
let { data }: FetchResponse = await useFetch(useurl + '/data/user-payment.json')
let allcards: Cards[] = data.value.cards
</script>

<style scoped></style>