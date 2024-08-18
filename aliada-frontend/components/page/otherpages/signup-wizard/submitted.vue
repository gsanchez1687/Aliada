<template>
    <!-- <div class="wizard-form-details log-in"> -->
    <div class="title-3 text-start">
        <h2>complete details</h2>
    </div>
    <div class="input-data">
        <div class="account-content">
            <h3>Account information</h3>
            <ul>
                <li>Name : <span class="first_name">{{ store.name }}</span></li>
                <li>phone number : <span class="phone_number">{{ store.phone }}</span></li>
                <li>Email : <span class="email_add">{{ store.email }}</span></li>
            </ul>
        </div>
        <div class="account-content">
            <h3>Location Details</h3>
            <ul>
                <li>Address : <span class="address-type">{{ store.address }}</span></li>
                <li>city : <span class="city-name">{{ store.city }}</span></li>
                <li>state : <span class="state-name">{{ store.state }}</span></li>
                <li>country : <span class="country-name">{{ store.country }}</span></li>
                <li>pincode : <span class="pin-code">{{ store.pincode }}</span></li>
            </ul>
        </div>
    </div>
    <!-- </div> -->
</template>

<script setup lang="ts">
import { usewizaredStore } from '~/store/wizard'
defineProps([

])
let store = usewizaredStore();
</script>

<style scoped></style>