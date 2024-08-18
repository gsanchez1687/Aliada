<template>
    <!-- <div class="wizard-form-details log-in"> -->
    <div class="title-3 text-start">
        <h2>Add your Location</h2>
    </div>
    <form class="row" id="needs-validation1" :class="classes" novalidate>
        <div class="form-group col-md-12">
            <div class="input-group">
                <div class="input-group-text">
                    <Icon name="ph:map-pin" />
                </div>
                <input type="text" class="form-control" v-model="store.address" id="address"
                    placeholder="Enter your Address" required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="input-group">
                <div class="input-group-text">
                    <Icon name="ph:map-pin" />
                </div>
                <input type="text" class="form-control" v-model="store.city" id="city_name" placeholder="Enter your city"
                    required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="input-group">
                <div class="input-group-text">
                    <Icon name="ph:map-pin" />
                </div>
                <input type="text" class="form-control" v-model="store.state" id="state_name" placeholder="Enter your state"
                    required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="input-group">
                <div class="input-group-text">
                    <Icon name="material-symbols:map-outline" />
                </div>
                <input type="text" class="form-control" v-model="store.country" id="country_name"
                    placeholder="Enter your country" required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="input-group">
                <div class="input-group-text">
                    <Icon name="ph:map-pin" />
                </div>
                <input type="number" class="form-control" v-model="store.pincode" id="pin_code"
                    placeholder="Enter your pin code" required>
            </div>
        </div>
    </form>
    <!-- </div> -->
</template>

<script setup lang="ts">
import { usewizaredStore } from '~/store/wizard'
defineProps({
    classes: String
})
let store = usewizaredStore();
</script>

<style scoped></style>