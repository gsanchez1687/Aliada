<template>
    <ul class="nav nav-tabs pagination-tab" id="top-tab" role="tablist">
        <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" :class="content == 1 ? 'active' : ''"
                href="javascript:void(0)" @click="getitem(1)">1</a></li>
        <li class="nav-item"><a data-bs-toggle="tab" :class="content == 2 ? 'active' : ''" class="nav-link"
                href="javascript:void(0)" @click="getitem(2)">2</a></li>
        <li class="nav-item"><a data-bs-toggle="tab" :class="content == 3 ? 'active' : ''" class="nav-link"
                href="javascript:void(0)" @click="getitem(3)">3</a></li>
    </ul>
</template>

<script lang="ts" setup>
let content = ref<number>(1);
let emit = defineEmits(['contentvalue'])
function getitem(value: number) {
    content.value = value
    emit('contentvalue', content.value)
}
</script>

<style lang="scss" scoped></style>