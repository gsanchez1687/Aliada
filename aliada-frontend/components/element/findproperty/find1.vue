<template>
    <div class="row">
        <div :class="item.class1" v-for="(item, index) in FindProperty" :key="index">
            <div :class="item.class2" class="bg-size background" :style="'background-image: url(' + item.img + ');'">
                <img :src="item.img" class="bg-img d-none" alt="" />
                <div :class="item.class3">
                    <div>
                        <h4>{{ item.totalproperty }}</h4>
                        <h2>{{ item.city }}</h2>
                        <h6 :class="item.class4">{{ item.title }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useurl } from '~/composable/apiurl'
interface Find {
    class1: string;
    class2: string;
    class3: string;
    class4: string;
    title: string;
    img: string;
    city: string;
    totalproperty: string;
    id: string;
}
interface FetchResponse {
    data: {
        value: {
            find: Find[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>;
let { data } = await useFetch(useurl + '/data/findproperty.json')
let FindProperty: Find[] = data.value.find
</script>

