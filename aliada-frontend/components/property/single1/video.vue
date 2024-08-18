<template>
    <div class="desc-box">
        <div class="page-section ratio_40" id="video">
            <h4 class="content-title">video</h4>
            <div class="play-bg-image">
                <div class="bg-size background" style="background-image:url('/image/property/11.jpg')">
                    <img src="/image/property/11.jpg" class="bg-img d-none" alt="">
                </div>
                <div class="icon-video">
                    <nuxt-link to="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#videomodal">
                        <i class="fas fa-play"></i>
                    </nuxt-link>
                </div>
            </div>
        </div>
    </div>
    <teleport to='body'>
        <Transition name="modals">
            <div class="modal fade video-modal" id="videomodal">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <iframe title="realestate" src="https://www.youtube.com/embed/Sz_1tkcU0Co"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </teleport>
</template>

<script setup lang="ts">

</script>

<style scoped></style>