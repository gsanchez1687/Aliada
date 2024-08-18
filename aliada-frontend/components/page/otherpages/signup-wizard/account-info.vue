<template>
    
    <div class="title-3 text-start">
        <h2>Get started</h2>
    </div>
    <form class="row needs-validation" :class="classes" id="needs-validation" novalidate>
        <div class="form-group col-md-12">
            <div class="input-group">
                <div class="input-group-text">
                    <Icon name="material-symbols:person-2-outline" />
                </div>
                <input type="text" class="form-control" v-model="store.name" id="first-name" name="firstname"
                    placeholder="Enter your Name" required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="input-group">
                <div class="input-group-text">
                    <Icon name="ph:phone" />
                </div>
                <input class="form-control" v-model="store.phone" name="mobnumber" id="tbNumbers"
                  type="number" maxlength="10"
                    placeholder="Enter your phone number" required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="input-group">
                <div class="input-group-text">
                    <Icon name="material-symbols:mail-outline" />
                </div>
                <input type="email" v-model="store.email" class="form-control" id="email" placeholder="e.g,demo@gmail.com"
                    required>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <div class="input-group">
                <div class="input-group-text">
                    <Icon name="material-symbols:lock-outline" />
                </div>
                <input :type="type" v-model="store.password" id="pwd-input" class="form-control" placeholder="Password"
                    maxlength="8" required>
                <div class="input-group-text">
                    <i id="pwd-icon" :class="showpassword ? ' far fa-eye' : 'far fa-eye-slash'" @click="show()"></i>
                </div>
            </div>
            <div class="important-note mb-4">
                password should be a minimum of 8 characters and should contains letters and numbers
            </div>
            <div class="text-end">
                <p>Alerady have an account ?
                    <nuxt-link to="/page/otherpages/login" class="btn btn-dashed btn-pill color-2">Log in</nuxt-link>
                </p>
            </div>
        </div>
    </form>
</template>

<script setup lang="ts">
import { usewizaredStore } from '~/store/wizard'
defineProps({
    classes: String
})
let store = usewizaredStore();
let showpassword = ref<boolean>(false);
let type = ref<string>('password')
function show() {
    showpassword.value = !showpassword.value
    if (showpassword.value == true) {
        type.value = 'text'
    }
    else {
        type.value = 'password'
    }
}
</script>

<style scoped></style>