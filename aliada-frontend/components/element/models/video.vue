<template>
    <div class="modal fade video-modal" :id="id">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <iframe title="realestate" src="https://www.youtube.com/embed/Sz_1tkcU0Co" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps({
    id: String
})
</script>

<style scoped></style>