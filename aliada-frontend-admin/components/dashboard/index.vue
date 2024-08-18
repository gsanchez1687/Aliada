<template>
    <div class="page-body">
        <CommonBreadcrumb title="Bienvenido a Aliada" page="Dashboard"/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 large-12">
                    <div class="row">
                        <div class="large-6 col-xl-12 col-md-6">
                            <div class="card all-properties">
                                <div class="card-body">
                                    <div class="media">
                                        <img src="/image/svg/icon/1.svg" class="img-fluid" alt="">
                                        <div class="media-body">
                                            <h4 class="mb-0">15</h4>
                                            <h6 class="light-font">Propiedades</h6>
                                        </div>
                                        <nuxt-link to="/myproperties/propertylist" class="arrow-animated">
                                           Ver propiedades
                                           <Icon name="material-symbols:chevron-right"  class="fs-2"/>
                                        </nuxt-link>
                                    </div>
                                    <ul class="light-box">
                                        <li v-for="(item , index) in propertydata" :key="index">
                                            <img :src="item.src" class="img-fluid" alt="">
                                            <div>
                                                <h5>{{ item.totle }}</h5>  
                                                <span class="light-font">{{ item.type }}</span>                                                                                                          
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="large-6 col-xl-12 col-md-6">
                            <div class="card invoice-card">
                                <div class="card-header pb-0">
                                   <div>
                                        <h5>Último mes</h5>
                                   </div>
                                </div>
                                <div class="card-body calculations">
                                    <ul>
                                        <li>
                                            <h5 class="font-success">$47,215</h5>
                                            <h6 class="light-font mb-0">Vendidos</h6>
                                        </li>
                                        <li>
                                            <h5 class="font-danger">$5,780</h5>
                                            <h6 class="light-font mb-0">Pendientes</h6>
                                        </li>
                                    </ul>
                                    <div class="d-flex">
                                       <!-- <nuxt-link to="/agent/invoice" class="label label-light color-4">
                                            <i class="fas fa-hand-holding-usd me-1"></i>
                                             Payments Receive</nuxt-link> -->
                                        <nuxt-link href="/agent/invoice" class="arrow-animated">
                                            Ver todos
                                            <Icon name="material-symbols:chevron-right"  class="fs-2"/>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <DashboardChart/>
                <!--<DashboardSalesdetails/>-->
                <!--<DashboardTimeline/>-->
                <DashboardMyproperties/>
                <DashboardReport/>
                <DashboardSoldout/>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { baseUrl } from "@/composable/apiurl";
interface property{
    src:string;
    totle:string;
    type:string
}
const {data} = await useFetch(baseUrl+'/data/dashboard.json');
const propertydata:property[] = data.value.properties
</script>

<style scoped>

</style>