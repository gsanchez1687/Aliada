<template>
    <div class="tab-pane fade show active about page-section" id="about">
        <h4 class="content-title">Detalles de la propiedad
            <!--<nuxt-link
                to="https://www.google.com/maps/place/New+York,+NY,+USA/@40.697488,-73.979681,8z/data=!4m5!3m4!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728?hl=en"
                target="_blank">
                <i class="fa fa-map-marker-alt"></i> view on map</nuxt-link>-->
        </h4>
        <div class="row">

            <div class="description-text-wrapper">
                <p class="description-text"> <span><b>Descripción:</b></span> {{ props.property.description }}</p>
            </div>

            <div class="col-md-6 col-xl-4 ">
                <ul class="property-list-details">
                    <li><span>Tipo de propiedad :</span> {{ props.property.category.name}}
                    </li>
                    <li><span>Id Propiedad :</span> {{ props.property.id}}
                    </li>
                    <li><span>Estatus :</span> {{ props.property.type_property.name}}
                    </li>
                    <li><span>Publicado :</span> {{ formatDate(props.property.created_at)}}
                    </li>
                  
                </ul>
            </div>
            <div class="col-md-6 col-xl-4">
                <ul class="property-list-details">
                    <li><span>Precio :</span>$ {{ props.property.price }}
                    </li>
                    <li><span>Metros cuadrados :</span> {{ props.property.square_meters}} m²
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-xl-4">
                <ul class="property-list-details">
                    <li><span>Cuidad :</span> {{  props.property.municipality_name }}
                    </li>
                    <li><span>Habitaciones :</span> {{  props.property.rooms}}
                    </li>
                    <li><span>Baños :</span> {{  props.property.bathroom}}
                    </li>
                    <li><span>Estacionamiento :</span> {{  props.property.parking}}
                    </li>
                </ul>
            </div>
            
        </div>
        <!--<h4 class="content-title mt-4">Attachments</h4>
        <nuxt-link to="javascript:void(0)" class="attach-file"><i class="far fa-file-pdf"></i>Demo Property Document
        </nuxt-link>-->
        <!--<h4 class="mt-4">Property Brief</h4>
        <div class="row">
            <div class="col-sm-4">
                <p>Residences can be classified by and how they are connected to neighbouring residences and land.
                    Different types of housing tenure can be used for the same physical type.</p>
            </div>
            <div class="col-sm-4">
                <p>connected residences might be owned by a single entity and leased out, or owned separately
                    with an agreement covering the relationship between units and common.</p>
            </div>
            <div class="col-sm-4">
                <p>they are connected to neighbouring residences and land.
                    Different types of housing tenure can be used for the same physical type.</p>
            </div>
        </div>-->
    </div>
</template>

<script setup lang="ts">
import { format } from 'date-fns';

const props = defineProps({
  property: Object,
});
function formatDate(dateString:any) {
      return format(new Date(dateString), 'dd/MM/yyyy');
    }
</script>

<style scoped>

.content-title h4 {
    text-transform: capitalize !important;
}
.description-text-wrapper {
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
    margin-bottom: 20px;
}
.description-text {
    font-family: 'Montserrat' !important;
    font-size: 14px;
    color: #586167 !important;
}

</style>