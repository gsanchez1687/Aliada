<template>
    <div class="theme-card">
        <div class="card-header bg-transparent border-bottom">
            <h5 class="f-w-600">State</h5>
        </div>
        <div class="card-body pb-0">
            <nuxtlink to="javascript:void(0)" class="btn btn-primary btn-lg active me-1" role="button" aria-pressed="true">
                Active</nuxtlink>
            <nuxtlink to="javascript:void(0)" class="btn btn-secondary btn-lg active me-1" role="button"
                aria-pressed="true">Active</nuxtlink>

            <button type="button" class="btn btn-lg btn-primary me-1" disabled>Disabled</button>
            <button type="button" class="btn btn-secondary btn-lg" disabled>Disabled</button>
        </div>
    </div>
</template>

<script setup lang="ts">

</script>

<style scoped></style>