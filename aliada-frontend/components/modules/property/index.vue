<template>
    <HomeImagecontentSale />
    <div class="bg-light">
        <HomeEnterprisePropertyListing />
    </div>
    <div class="section-pb">
        <HomeCorporatePropertyListing />
    </div>
    <div class="bg-light">
        <HomeClassicLetestProperty />
    </div>
    <section class="property-section slick-between slick-shadow">
        <div class="container">
            <div class="row ratio_landscape">
                <div class="col">
                    <div class="title-2">
                        <h2>{{ 'Latest Property Listing' }}</h2>
                        <p class="font-roboto">Residences can be classified into different type of housing tenure can used
                            for same physical type.</p>
                        <hr />
                    </div>
                    <div class="listing-hover-property row">
                        <ElementForsaleSale1 :data="Letest_For_sell" color="color-4" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { useurl } from '~/composable/apiurl'
import {propertydata} from '~/static/data/types/letestforsaledata'
interface FetchResponse {
    data: {
        value: {
            LatestForSalePropertyData: propertydata[]
        }
    }
}
declare function useFetch(url: string): Promise<FetchResponse>
let { data } = await useFetch(useurl + '/data/property.json')
let Letest_For_sell = <propertydata[]>data.value.LatestForSalePropertyData
</script>

<style scoped></style>