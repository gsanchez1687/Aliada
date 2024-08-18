<template>
    <div class="coming-soon comingsoon-countdown background bg-size"
        style="background-image:url(/image/inner-pages/coming-soon.jpg)">
        <img src="/image/inner-pages/coming-soon.jpg" alt="" class="img-fluid bg-img d-none">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="coming-soon-detail">
                        <div>
                            <div class="logo">
                                <nuxt-link to="/home/corporate">
                                    <img src="/image/logo/footer-logo.png" alt="" class="img-fluid">
                                </nuxt-link>
                            </div>
                            <h2>
                                Our website is <br /> coming soon, follow us for update now !
                            </h2>
                            <form action="#" class="theme-form w-100">
                                <div class="form-group">
                                    <input type="text" name="password" id="name" class="form-control"
                                        placeholder="Enter your email address" required>
                                    <button type="submit" class="btn btn-gradient color-2 btn-flat">subscribe</button>
                                </div>
                            </form>
                            <PageOtherpagesComingSoon1Timer />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cloud-img bg-size background" style="background-image:url(/image/others/cloud.png)">
            <img src="/image/others/cloud.png" alt="" class="img-fluid bg-img d-none">
        </div>
    </div>
</template>
<script lang="ts" setup>

</script>