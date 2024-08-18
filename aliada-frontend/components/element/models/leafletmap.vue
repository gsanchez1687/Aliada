<template>
    <div class="modal fade map-modal" id="leaflet" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-3 col-lg-5">
                                <div class="left-sidebar">
                                    <div class="filter-cards">
                                        <div class="advance-card">
                                            <h6>filter</h6>
                                            <div class="row gx-2">
                                                <ElementFilteroptionStatus :data="data" />
                                                <ElementFilteroptionType :data="data" />
                                                <ElementFilteroptionRooms :data="data" />
                                                <div class="col-sm-12 mb-3">
                                                    <ElementFilteroptionBed :data="data" />
                                                </div>
                                                <div class="col-sm-12 mb-3">
                                                    <ElementFilteroptionBath :data="data" />
                                                </div>
                                                <ElementFilteroptionAgencies :data="data" />
                                                <ElementFilteroptionPrice label="Price" width="width: 262px" />
                                                <ElementFilteroptionArea label="Area" width="width: 262px" />
                                                <div class="col-12">
                                                    <nuxt-link to="/"
                                                        class="btn btn-gradient color-2 btn-block btn-pill mt-2">Search
                                                    </nuxt-link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-7 map-section mt-0">
                                <ElementMapsLefletmap />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { useFiltersStore } from "~/store/filter.js";
const data = useFiltersStore().data;
</script>

<style lang="scss" scoped></style>