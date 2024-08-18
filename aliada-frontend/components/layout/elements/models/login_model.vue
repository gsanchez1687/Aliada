<template>
    <div class="modal fade signup-modal" id="login-modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body ratio_asos">
                    <div class="row m-0">
                        <div class="col-lg-6 p-0">
                            <div class="login-img bg-size background"
                                style="background-image:url('/image/property/15.jpg')">
                                <img src="/image/property/15.jpg" class="bg-img d-none" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 p-0">
                            <div class="signup-tab theme-tab-4 log-in">
                                <ul id="tabs" class="nav nav-tabs">
                                    <li class="nav-item"><a href="" data-bs-target="#login" data-bs-toggle="tab"
                                            class="nav-link active">{{ 'Log In' }}</a></li>
                                    <li class="nav-item"><a href="" data-bs-target="#signup" data-bs-toggle="tab"
                                            class="nav-link">{{ 'Register' }}</a></li>
                                </ul>
                                <div id="tabsContent" class="tab-content">
                                    <div id="login" class="tab-pane fade active show">
                                        <h4>{{ 'Log in' }}</h4>
                                        <form>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <Icon name="material-symbols:person" />
                                                    </div>
                                                    <input type="email" class="form-control" placeholder="Enter Email"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <Icon name="ic:outline-lock" />
                                                        </div>
                                                    </div>
                                                    <input :type="show ? 'text' : 'password'" id="pwd-input"
                                                        class="form-control" placeholder="Password" required>
                                                    <div class="input-group-apend">
                                                        <div class="input-group-text">
                                                            <Icon :name="show ? 'ic:outline-remove-red-eye' : 'ph:eye-slash'"
                                                                @click="show = !show" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <label class="d-block mb-0" for="chk-ani">
                                                    <input class="checkbox_animated color-4" id="chk-ani" type="checkbox">
                                                    {{ 'Remember me' }}
                                                </label>
                                                <nuxt-link to="/page/otherpages/forgot-password"
                                                    class="font-rubik text-color-4">{{ 'Forgot password ?' }}</nuxt-link>
                                            </div>
                                            <button type="submit" class="btn btn-gradient btn-flat color-4">{{ 'Log in '}}</button>
                                        </form>
                                    </div>
                                    <LayoutElementsModelsRagistertab />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
let show = ref<boolean>(false) 
</script>

<style lang="scss" scoped></style>
