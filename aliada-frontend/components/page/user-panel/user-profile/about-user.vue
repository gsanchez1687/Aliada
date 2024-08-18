<template>
    <div class="common-card">
        <div class="row">
            <div class="col-xxl-6 col-xl-7">
                <div class="information-detail">
                    <div class="common-header">
                        <h5>About</h5>
                    </div>
                    <div class="information">
                        <ul>
                            <li>
                                <span>Gender :</span>
                                <p>Female</p>
                            </li>
                            <li>
                                <span>Birthday :</span>
                                <p>20/11/1995</p>
                            </li>
                            <li>
                                <span>Phone number :</span>
                                <a href="javascript:void(0)">
                                    +91 846 - 547 - 210
                                </a>
                            </li>
                            <li>
                                <span>Address :</span>
                                <p>549 Sulphur Springs Road, Downers, IL</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="information-detail">
                    <div class="common-header">
                        <h5>Login Details</h5>
                    </div>
                    <div class="information">
                        <ul>
                            <li>
                                <span>Email :</span>
                                <a href="javascript:void(0)">zackle@gmail.com</a>
                                <span data-bs-toggle="modal" data-bs-target="#edit-address"
                                    class="label label-light label-flat color-4">Edit</span>
                            </li>
                            <li>
                                <span>Password :</span>
                                <a href="javascript:void(0)">&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;</a>
                                <span data-bs-toggle="modal" data-bs-target="#edit-password"
                                    class="label label-light label-flat color-4">Edit</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 offset-xxl-1 col-xl-5 offset-xl-0">
                <div class="about-img d-xl-block d-none">
                    <img src="/image/inner-pages/2.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
    <teleport to='body'>
        <Transition name="modals">
            <ElementModelsEditEmail />
        </Transition>
        <Transition name="modals">
            <ElementModelsEditPassword />
        </Transition>
    </teleport>
</template>

<script setup lang="ts">

</script>

<style scoped></style>