<template>
    <ul class="top-bar-right">
        <li>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text  dropdown">
                        <span class="dropdown-toggle font-roboto" data-bs-toggle="dropdown"><span>{{ current_cate }}</span>
                            <i class="fas fa-angle-down"></i></span>
                        <div class="dropdown-menu text-start">
                            <a class="dropdown-item" href="javascript:void(0)" v-for="cate in category" :key="cate"
                                @click="select(cate)">{{ cate }}</a>
                        </div>
                    </div>
                </div>
                <input type="text" class="form-control d-lg-inline-block d-none" placeholder="Search Your Property......">
                <div class="input-group-append d-lg-inline-block d-none">
                    <span class="input-group-text d-inline-block">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </li>
    </ul>
    <layout-elements-header-element-menuright />
</template>

<script setup lang="ts">
let open = ref<boolean>(false);
let current_cate = ref<string>('Apartment')
let category: string[] = ['Apartment', 'office', 'House', 'villa']
function select(cate: string) {
    current_cate.value = cate;
}
</script>

<style scoped>
.show {
    position: absolute;
    inset: 0px auto auto 0px;
    margin: 0px;
    transform: translate(30px, 26px);
    display: block;

}
</style>
