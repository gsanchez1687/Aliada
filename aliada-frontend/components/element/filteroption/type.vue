<template>
    <div class="col-lg-12">
        <div class="form-group m-0">
            <div class="dropdown">
                <span class="dropdown-toggle font-rubik d-flex justify-content-between align-items-center"
                    data-bs-toggle="dropdown" @click="dropdownToggle(open)">
                    <span>{{ selectedType || 'Tipo de propiedad' }}</span>
                    <Icon name="material-symbols:keyboard-arrow-down" class="fs-5" />
                </span>
                <div class="dropdown-menu text-start" :class="open ? 'show' : ''">
                    <nuxt-link class="dropdown-item" v-for=" (typeProperty, index) in props.data.data" :key="index"
                        @click.prevent="selectType(typeProperty.name)" >
                        {{ typeProperty.name }}
                    </nuxt-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
let props = defineProps({
    data: Object
})
let open = ref(false);
let selectedType = ref(null);
const emits = defineEmits(['typeSelected']);

function dropdownToggle(value: boolean) {
    open.value = !value;
}
function selectType(type: string) {
    selectedType.value = type;
    emits('typeSelected', type);
}


</script>

<style lang="scss" scoped></style>
