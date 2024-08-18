<template>
    <div class="footer-contact">
        <ul>
            <li v-for="(item, index) in props.data" :key="index">
                <i :class="item.icon"></i>
                {{ item.title }}
            </li>
        </ul>
    </div>
</template>

<script lang="ts" setup>
interface Contact {
    icon: string;
    title: string;
}
interface MyProps {
    data: Contact[]
}
let props = defineProps<MyProps>()

</script>

<style lang="scss" scoped></style>