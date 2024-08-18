<template>
    <div class="col-xl-6 col-lg-7 contact_section contact_wrap_2">
        <div class="row contact-detail theme-card">
            <div class="col-lg-12 p-0">
                <div class="contact-content">
                    <h2>Aliada Real Estate a tu servicio</h2>
                    <p class="font-roboto">Estamos aquí para ayudarte. Visita nuestra página de contacto para enviar tus consultas, 
                        programar una cita o hablar directamente con nuestro equipo experto. En Aliada, tu éxito inmobiliario 
                        es nuestra prioridad.</p>
                </div>
            </div>
            <div class="col-sm-6 p-0" v-for="(item, index) in alldata" :key="index">
                <div class="contact_wrap shadow-none text-start ps-0">
                    <Icon :name="item.icon" />
                    <h4>{{ item.title }} </h4>
                    <p class="font-roboto" v-if="item.phone">
                        {{ item.add }} <br>
                        {{ item.add2 }} <br>
                        {{ item.phone }} r
                    </p> 
                    <ul v-if="item.phone2">
                        <li>Inquiries: {{ item.inq }}</li>
                        <li>Support: {{ item.supp }}</li>
                        <li>{{ item.site }}</li>
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
    site?: string
}
interface FetchResponse {
    data: {
        value: {
            details: contact[];
        };
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/contact.json')
let alldata: contact[] = data.value.details
</script>

<style scoped></style>