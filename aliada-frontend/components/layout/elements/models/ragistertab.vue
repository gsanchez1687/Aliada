<template>
    <div id="signup" class="tab-pane fade">
        <h4>Register</h4>
        <form>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <Icon name="material-symbols:person" />
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter your name" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <Icon name="material-symbols:mail-outline-rounded" />
                        </div>
                    </div>
                    <input type="email" class="form-control" placeholder="Enter email address" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <Icon name="ic:outline-lock" />
                        </div>
                    </div>
                    <input :type="show ? 'text' : 'password'" id="pwd-input1" class="form-control" placeholder="Password"
                        required>
                    <div class="input-group-apend">
                        <div class="input-group-text">
                            <Icon :name="show ? 'ic:outline-remove-red-eye' : 'ph:eye-slash'" @click="show = !show" />
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-gradient color-4 btn-flat">{{ 'Create account' }}</button>
            <span class="d-block mt-3 font-rubik">{{ 'Already have an acoount ?' }}<nuxt-link to="/"
                    class="float-end text-color-4">{{ ' Login here' }}</nuxt-link></span>
        </form>
    </div>
</template>

<script lang="ts" setup>
let show = ref<boolean>(false) 
</script>

<style lang="scss" scoped></style>