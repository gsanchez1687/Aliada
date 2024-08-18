<template>
    <section class="subscribe-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="video-details">
                        <span class="label label-light label-flat color-2">{{ '#Realestate' }}</span>
                        <h2>{{ title }}</h2>
                        <p class="font-roboto">{{ details }}</p>
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Your Email Address" required>
                            </div>
                            <button type="submit" class="btn btn-gradient color-2 btn-lg">{{ 'Subscribe Now' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
let title: string = 'Stay Up to Date';
let details: string = 'Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef kitchen opening Elegant retreat in a quiet Coral Gables setting.'
</script>

<style lang="scss" scoped></style>