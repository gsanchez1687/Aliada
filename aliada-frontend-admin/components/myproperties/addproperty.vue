<template>
  <div class="page-body">
    <CommonBreadcrumb title="Crear propiedad" page="Mis propiedades" />
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
              <h5>Detalles de la propiedad</h5>
            </div>
            <div class="card-body admin-form">
              <form class="row gx-3" @submit.prevent="saveProperty">
                <!-- Tipo de Propiedad -->
                <div class="col-sm-3 form-group">
                  <label>Tipo de Propiedad</label>

                  <select
                    class="form-control"
                    v-model="property.type_property_id"
                    required
                    id="type_property_id"
                  >
                    <option disabled value="">Seleccionar</option>
                    <option
                      v-for="option in propertyTypes"
                      :key="option.id"
                      :value="option.id"
                    >
                      {{ option.name }}
                    </option>
                  </select>
                </div>
                <!---Tipologia-->
                <div class="col-sm-3 form-group">
                  <label>Tipología</label>

                  <select
                    class="form-control"
                    v-model="property.typology_id"
                    required
                    id="tipology_id"
                  >
                    <option disabled value="">Seleccionar</option>
                    <option
                      v-for="option in typologyType"
                      :key="option.id"
                      :value="option.id"
                    >
                      {{ option.name }}
                    </option>
                  </select>
                </div>

                <!-- Estado de la propiedad (Category ID) -->
                <div class="col-sm-3 form-group">
                  <label>Estado de la propiedad</label>
                  <select
                    class="form-control"
                    id="category_id"
                    required
                    v-model="property.category_id"
                  >
                    <option disabled value="">Seleccionar</option>
                    <option
                      v-for="status in propertyStatus"
                      :key="status.id"
                      :value="status.id"
                    >
                      {{ status.name }}
                    </option>
                  </select>
                </div>

                <div class="col-sm-3 form-group">
                  <label>Etiqueta</label>
                  <select
                    class="form-control"
                    id="label_id"
                    required
                    v-model="property.label_id"
                  >
                    <option
                      v-for="label in labels"
                      :key="label.id"
                      :value="label.id"
                    >
                      {{ label.name }}
                    </option>
                  </select>
                </div>

                <div class="col-sm-3 form-group">
                  <label>Fecha de entrega (opcional) <span class="font-danger">*</span></label>
                  <VueDatePicker v-model="date"></VueDatePicker>
                </div>

                <!-- Precio -->
                <div class="col-sm-3 form-group">
                  <label>Precio</label>
                  <input
                    type="number"
                    id="price"
                    class="form-control"
                    v-model="property.price"
                    placeholder="$2800000"
                    required
                  />
                </div>

                <!-- Tipo de moneda -->
                <div class="col-sm-3 form-group">
                  <label>Tipo de moneda</label>
                  <select
                    class="form-control"
                    id="currency"
                    v-model="property.currency"
                    required>
                    <option value="mxn">
                      MXN
                    </option>
                    <option value="usd">
                      USD
                    </option>
                  </select>
                </div>

                <!-- Cantidad de habitaciones -->
                <div class="col-sm-3 form-group">
                  <label>Habitaciones</label>
                  <select
                    class="form-control"
                    id="rooms"
                    required
                    v-model="property.rooms"
                  >
                    <option
                      v-for="room in roomOptions"
                      :key="room"
                      :value="room"
                    >
                      {{ room }}
                    </option>
                  </select>
                </div>

                <!-- Baños -->
                <div class="col-sm-3 form-group">
                  <label>Baños</label>
                  <select
                    class="form-control"
                    id="bathroom"
                    required
                    v-model="property.bathroom"
                  >
                    <option
                      v-for="bathroom in bathroomOptions"
                      :key="bathroom"
                      :value="bathroom"
                    >
                      {{ bathroom }}
                    </option>
                  </select>
                </div>

                <!-- Medio Baños -->
                <div class="col-sm-3 form-group">
                  <label>Medios Baños</label>
                  <select
                    class="form-control"
                    id="half_bathroom"
                    required
                    v-model="property.half_bathroom"
                  >
                    <option
                      v-for="half_bathroom in halfbathroomOptions"
                      :key="half_bathroom"
                      :value="half_bathroom"
                    >
                      {{ half_bathroom }}
                    </option>
                  </select>
                </div>

                <!-- Área (m2) -->
                <div class="col-sm-3 form-group">
                  <label>Área (m<sup>2</sup>)</label>
                  <input
                    type="number"
                    id="square_meters"
                    class="form-control"
                    v-model="property.square_meters"
                    placeholder="550"
                    required
                  />
                </div>

                <!-- Vista -->
                <div class="col-sm-3 form-group">
                  <label>Vista</label>
                  <select
                    class="form-control"
                    id="views"
                    required
                    v-model="property.views"
                  >
                    <option disabled value="">Seleccionar</option>
                    <option
                      v-for="view in views"
                      :key="view.id"
                      :value="view.id"
                    >
                      {{ view.name }}
                    </option>
                  </select>
                </div>


                <div class="col-sm-3 form-group">
                  <label>Estacionamiento</label>
                  <select
                    class="form-control"
                    id="parking"
                    required
                    v-model="property.parking"
                  >
                    <option
                      v-for="parking in parkingOptions"
                      :key="parking"
                      :value="parking"
                    >
                      {{ parking }}
                    </option>
                  </select>
                </div>

                <div class="col-sm-3 form-group">
                  <label>Captación</label>
                  <select
                    class="form-control"
                    id="capture"
                    v-model="property.capture"
                    required>
                    <option value="">
                      Seleccionar
                    </option>
                    <option value="aliado">
                      Aliado
                    </option>
                    <option value="developer">
                      Desarrollador
                    </option>
                  </select>
                </div>

                <div v-if="showAliado" class="col-sm-3 form-group">
                  <label>Aliado</label>
                  <select
                    class="form-control"
                    id="aliado"
                    required>
                    <option value="">
                      David Rosas
                    </option>
                    <option value="">
                      Rafael Azuaje
                    </option>
                  </select>
                </div>

                <!--Estimado mensual -->
                <div class="col-sm-3 form-group">
                  <label>Pago estimado / mes (Est.)</label>
                  <input type="number" id="estimated_monthly_payment" class="form-control" v-model="property.estimated_monthly_payment" placeholder="Ej. 1857" required/>
                </div>

                <!--Cuota mantenimiento -->
                <div class="col-sm-3 form-group">
                  <label>Mantenimiento mensual (HOA)</label>
                  <input type="number" id="maintenance_fee" class="form-control" v-model="property.maintenance_fee" placeholder="Ej. 945" required/>
                </div>

                <!--Desarrollador -->
                <div class="col-sm-6 form-group">
                  <label>Nombre del desarrollador</label>
                  <input
                    type="text"
                    id="developer"
                    class="form-control"
                    v-model="property.developer"
                    placeholder="Ej. Aliada Real Estate"
                    required
                  />
                </div>

                <!-- Title -->
                <div class="col-sm-6 form-group">
                  <label>Título</label>
                  <input
                    type="text"
                    id="title"
                    class="form-control"
                    v-model="property.title"
                    placeholder="Título de la propiedad"
                    required
                  />
                </div>

                <!-- Descripción -->
                <div class="col-sm-12 form-group">
                  <label>Descripción</label>
                  <textarea
                    rows="4"
                    id="description"
                    class="form-control"
                    v-model="property.description"
                    required
                  ></textarea>
                </div>

                <!-- Dirección -->
                <div class="col-sm-6 form-group">
                  <label>Dirección</label>
                  <input
                    type="text"
                    id="address"
                    class="form-control"
                    v-model="property.address"
                    placeholder="Address of your property"
                    required
                  />
                </div>

                <!-- Código Postal -->
                <div class="col-sm-6 form-group">
                  <label>Código Postal</label>
                  <input type="number" id="postal_code" class="form-control" v-model="property.postal_code" placeholder="Solo número" required/>
                </div>

                <!-- Estado -->
                <div class="col-sm-3 form-group">
                  <label>Estado</label>
                  <select id="state_id" class="form-control" v-model="property.state_id">
                    <option disabled value="">Seleccionar</option>
                    <option
                      v-for="state in states"
                      :key="state.id"
                      :value="state.id"
                    >
                      {{ state.name }}
                    </option>
                  </select>
                </div>

                <!-- Ciudad -->
                <div class="col-sm-3 form-group">
                  <label>Ciudad</label>
                  <select
                    id="municipality_id"
                    class="form-control"
                    v-model="property.municipality_id"
                  >
                    <option disabled value="">Seleccionar</option>
                    <option
                      v-for="city in municipality"
                      :key="city.id"
                      :value="city.id"
                    >
                      {{ city.name }}
                    </option>
                  </select>
                </div>

                <!-- Amenidades -->
                <div class="col-sm-12 form-group">
                  <label>Amenidades</label>
                  <div class="additional-checkbox">
                    <label
                      v-for="(amenity, index) in amenities"
                      :key="index"
                      :for="'amenity-' + index"
                      class="checkbox-label"
                    >
                      <input
                        class="checkbox_animated color-4"
                        type="checkbox"
                        id="amenities"
                        :id="amenity.id"
                        v-model="property.amenities"
                        :value="amenity.id"
                      />
                      {{ amenity.name }}
                    </label>
                  </div>
                </div>

                <!-- DropZone for image uploads -->
                <div class="mt-3 mb-3">
                  <div class="dropzone-1">
                    <label>Galería de Imágenes</label>
                    <div
                      class="border"
                      :class="{
                        isDragActive,
                      }"
                      v-bind="getRootProps()"
                    >
                      <input v-bind="getInputProps()" />
                      <p v-if="isDragActive">Soltar la imágenes aquí...</p>
                      <p v-else>
                        <!-- Drag and drop files here, or Click to select files -->
                        Arrastra y suelta las imágenes aquí, o haz click para seleccionar
                      </p>
                    </div>
                    <div v-if="state.files.length > 0" class="files">
                      <div
                        class="file-item"
                        v-for="(file, index) in state.files"
                        :key="index"
                      >
                        <img
                          class="img-dropzone"
                          :src="getFileUrl(file)"
                          :alt="file.name"
                        />
                        <span
                          class="delete-file"
                          @click="handleClickDeleteFile(index)"
                        >
                          <img src="/svg/delete.svg" width="18" /> Borrar</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row content-map">
                  <label>Ubicación de la propiedad</label>

                  <div class="col-xl-8 map-section">
                    <GoogleMap
                      v-if(show)
                      :api-key="config.public.GOOGLE_MAPS_API_KEY"
                      style="width: 100%; height: 300px"
                      :center="center"
                      :zoom="12"
                      @click="setLocation"
                    >
                      <CustomMarker
                        v-if="
                          property.coordinates_x != null &&
                          property.coordinates_y != null
                        "
                        :options="{
                          position: {
                            lat: parseFloat(property.coordinates_x),
                            lng: parseFloat(property.coordinates_y),
                          },
                          anchorPoint: 'BOTTOM_CENTER',
                        }"
                      >
                        <div style="text-align: center">
                          <img
                            :src="'/image/others/aliada_map_marker.webp'"
                            width="50"
                            height="50"
                            style="margin-top: 8px"
                          />
                        </div>
                      </CustomMarker>
                      <Marker
                        v-if="
                          property.coordinates_x != null &&
                          property.coordinates_y != null
                        "
                        :options="{
                          position: {
                            lat: parseFloat(property.coordinates_x),
                            lng: parseFloat(property.coordinates_y),
                          },
                        }"
                      >
                      </Marker>
                    </GoogleMap>
                  </div>

                  <div class="col-xl-4">
                    <div class="col-sm-12 form-group">
                      <label>Coordenada X</label>
                      <input
                        type="number"
                        id="coordinates_x"
                        class="form-control"
                        required
                        v-model="property.coordinates_x"
                      />
                    </div>
                    <div class="col-sm-12 form-group">
                      <label>Coordenada Y</label>
                      <input
                        type="number"
                        id="coordinates_y"
                        class="form-control"
                        required
                        v-model="property.coordinates_y"
                      />
                    </div>
                  </div>
                </div>

                <!-- Submit Buttons -->
                <div class="form-btn col-sm-12">
                  <button
                    type="button"
                    class="btn btn-pill btn-gradient color-4"
                    @click="saveProperty()"
                  >
                    Guardar
                  </button>
                  <button
                    type="button"
                    @click="cancel()"
                    class="btn btn-pill btn-dashed color-4"
                  >
                    Cancelar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { add, format } from 'date-fns'
import { onMounted, reactive, ref } from "vue";
import { useDropzone } from "vue3-dropzone";
import { CustomMarker, GoogleMap, Marker } from "vue3-google-map";
import backendServices from "~/services/BackendServices";
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import { elementAnimate, getElementByID } from '@syncfusion/ej2-vue-maps';
import { properties } from '@syncfusion/ej2-vue-maps/src/maps/maps.component';


let date = ref()

const config = useRuntimeConfig();
const toast = useToast();
const center = { lat: 20.21402, lng: -87.467099 };
const state = reactive({
  files: [],
});
const property = ref({
  type_property_id: 0,
  category_id: 0,
  label_id: null,
  price: 0,
  rooms: 0,
  bathroom: 0,
  half_bathroom: 0,
  square_meters: 0,
  views: null,
  description: "",
  address: "",
  postal_code: "",
  state_id: null,
  municipality_id: null,
  title: "",
  amenities: [],
  parking: 0,
  coordinates_x: null,
  coordinates_y: null,
  videoLink: "",
  capture: "",
  estimated_monthly_payment: 0,
  maintenance_fee: 0,
  currency: "mxn",
  developer: "",
  typology_id: null,
});

// Date picker

/* const date = ref(new Date()) */

// Dropdown data sources
const propertyTypes = ref([]);
const typologyType = ref([]);
const propertyStatus = ref([]);
const states = ref([]);
const municipality = ref([]);
const amenities = ref([]);
const roomOptions = ref([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]);
const parkingOptions = ref([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
const bathroomOptions = ref([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]);
const halfbathroomOptions = ref([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
const views = ref([]);
const isDragActive = ref(true);
const labels = ref([]);
const show = ref(true);
const showAliado = ref(false);

function getFileUrl(file: any) {
  if (file) {
    return URL.createObjectURL(file);
  } else {
    return "";
  }
}

onMounted(async () => {
  await backendServices
    .getTypeProperty()
    .then((response: any) => {
      propertyTypes.value = response.data.data;
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });

  await backendServices
    .getCategories()
    .then((response: any) => {
      propertyStatus.value = response.data.data;
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });

  await backendServices
    .getStates()
    .then((response: any) => {
      states.value = response.data;
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });

  await backendServices
    .getAmenities()
    .then((response: any) => {
      amenities.value = response.data;
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });

  await backendServices
    .getViews()
    .then((response: any) => {
      views.value = response.data;
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });
});

watch(
  () => property.value.state_id,
  async (newValue: any, oldValue: any) => {
    await backendServices
      .getCitiesByIdState(newValue)
      .then((response: any) => {
        municipality.value = response.data;
        property.value.municipality_id = null;
      })
      .catch((error: any) => {
        console.error("Error al obtener datos:", error);
      });
  },
  { deep: true }
);

watch(
  () => property.value.type_property_id,
  async (newValue: any, oldValue: any) => {
    await backendServices
      .getTypology(newValue)
      .then((response: any) => {
        typologyType.value = response.data;
        property.value.typology_id = null;
      })
      .catch((error: any) => {
        console.error("Error al obtener datos:", error);
      });
  },
  { deep: true }
);


watch(
  () => property.value.category_id,
  async (newValue: any, oldValue: any) => {
    await backendServices
      .getCategoryLabels(newValue)
      .then((response: any) => {
        labels.value = response.data;
        property.value.label_id = null;
      })
      .catch((error: any) => {
        console.error("Error al obtener datos:", error);
      });
  },
  { deep: true }
);
watch(
  () => property.value.coordinates_x,
  async (newValue: any, oldValue: any) => {
    show.value = false;
    show.value = true;
  },
  { deep: true }
);

watch(
  () => property.value.capture,
  async (newValue: any, oldValue: any) => {
    if (newValue == 'aliado') {
      showAliado.value = true
    } else {
      showAliado.value = false
    }
  },
  { deep: true }
);


function onDrop(acceptFiles: any, rejectReasons: any) {
  state.files.push(...acceptFiles);
}

function handleClickDeleteFile(index: number) {
  state.files.splice(index, 1);
}

const setLocation = (event: any) => {
  property.value.coordinates_x = event.latLng.lat();
  property.value.coordinates_y = event.latLng.lng();
};

const { getRootProps, getInputProps, ...rest } = useDropzone({ onDrop });
// Property save function
function saveProperty() {
  const formData = new FormData();
  formData.append("type_property_id", property.value.type_property_id);
  formData.append("typology_id", property.value.typology_id);
  formData.append("category_id", property.value.category_id);
  formData.append("price", property.value.price);
  formData.append("rooms", property.value.rooms);
  formData.append("bathroom", property.value.bathroom);
  formData.append("half_bathroom", property.value.half_bathroom);
  formData.append("square_meters", property.value.square_meters);
  formData.append("views", property.value.views);
  formData.append("description", property.value.description);
  formData.append("address", property.value.address);
  formData.append("postal_code", property.value.postal_code);
  formData.append("state_id", property.value.state_id);
  formData.append("municipality_id", property.value.municipality_id);
  formData.append("title", property.value.title);
  formData.append("label_id", property.value.label_id);
  formData.append("parking", property.value.parking);
  formData.append("coordinates_x", property.value.coordinates_x);
  formData.append("coordinates_y", property.value.coordinates_y);
  formData.append("estimated_monthly_payment", property.value.estimated_monthly_payment);
  formData.append("maintenance_fee", property.value.maintenance_fee);
  formData.append("currency", property.value.currency);
  formData.append("capture", property.value.capture);

  state.files.forEach((file: any, index: number) => {
    formData.append(`images[${index}]`, file);
  });

  property.value.amenities.forEach((amenity: any, index: number) => {
    formData.append(`amenities[${index}]`, amenity);
  });

  if (property.value.address && property.value.postal_code && property.value.state_id && property.value.municipality_id && property.value.title && property.value.description && property.value.coordinates_x && property.value.coordinates_y && property.value.price && property.value.rooms && property.value.bathroom && property.value.half_bathroom && property.value.square_meters && property.value.views && property.value.parking && property.value.capture && property.value.currency && property.value.typology_id) {
    backendServices
      .saveProperty(formData)
      .then((response: any) => {
        toast.add({
          title: "Creado con exito",
          color: "green",
          background: 'dark:bg-slate-900',
          timeout: 5000,
        });
        //cancel();
      })
      .catch((error: any) => {
        toast.add({
          title: 'Error creando la propiedad',
          color: "red",
          background: 'dark:bg-slate-900',
          timeout: 5000,
        });
        console.error("Error al obtener datos:", error);
      });
  } else {
    toast.add({
          title: 'Formulario incompleto',
          color: "red",
          background: 'dark:bg-slate-900',
          timeout: 5000,
        });
      validateForm();
      console.error("FormData is empty");
  }
}

//funcion que rellena los border de rojo si estan vacios
function validateForm() {
  const styleError = '1px solid #ee5253';
  const styleSuccess = '1px solid #1dd1a1';
  const elementTypepropertyid = getElementByID('type_property_id');
  const elementTypology = getElementByID('tipology_id');
  const category_id = getElementByID('category_id');
  const elementLabelId = getElementByID('label_id');
  const elementPrice = getElementByID('price');
  const elementCurrency = getElementByID('currency');
  const elementSquareMeters = getElementByID('square_meters');
  const elementViews = getElementByID('views');
  const elementCapture = getElementByID('capture');
  const elementEstimatedMonthlyPayment = getElementByID('estimated_monthly_payment');
  const elementMaintenanceFee = getElementByID('maintenance_fee');
  const elementDeveloper = getElementByID('developer');
  const elementTile = getElementByID('title');
  const elementDescription = getElementByID('description');
  const elementAdress = getElementByID('address');
  const elementPostalCode = getElementByID('postal_code');
  const elementState = getElementByID('state_id');
  const elementMunicipality = getElementByID('municipality_id');
  const elementCoordinatesX = getElementByID('coordinates_x');
  const elementCoordinatesY = getElementByID('coordinates_y');

  if(property.value.type_property_id < 1) {
    (elementTypepropertyid as HTMLElement).style.border = styleError;
  }else{
    (elementTypepropertyid as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.typology_id == null) {
    (elementTypology as HTMLElement).style.border = styleError;
  }else{
    (elementTypology as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.category_id < 1) {
    (category_id as HTMLElement).style.border = styleError;
  }else{
    (category_id as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.label_id == null) {
    (elementLabelId as HTMLElement).style.border = styleError;
  }else{
    (elementLabelId as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.price < 1) {
    (elementPrice as HTMLElement).style.border = styleError;
  }else{
    (elementPrice as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.currency !== 'mxn' && property.value.currency !== 'usd') {
    (elementCurrency as HTMLElement).style.border = styleError;
  }else{
    (elementCurrency as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.square_meters < 1) {
    (elementSquareMeters as HTMLElement).style.border = styleError;
  }else{
    (elementSquareMeters as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.views == null) {
    (elementViews as HTMLElement).style.border = styleError;
  }else{
    (elementViews as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.capture !== 'aliado' && property.value.capture !== 'developer') {
    (elementCapture as HTMLElement).style.border = styleError;
  }else{
    (elementCapture as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.estimated_monthly_payment < 1) {
    (elementEstimatedMonthlyPayment as HTMLElement).style.border = styleError;
  }else{
    (elementEstimatedMonthlyPayment as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.maintenance_fee < 1) {
    (elementMaintenanceFee as HTMLElement).style.border = styleError;
  }else{
    (elementMaintenanceFee as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.developer == '') {
    (elementDeveloper as HTMLElement).style.border = styleError;
  }else{
    (elementDeveloper as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.title == '') {
    (elementTile as HTMLElement).style.border = styleError;
  }else{
    (elementTile as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.description == '') {
    (elementDescription as HTMLElement).style.border = styleError;
  }else{
    (elementDescription as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.state_id == null) {
    (elementState as HTMLElement).style.border = styleError;
  }else{
    (elementState as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.municipality_id == null) {
    (elementMunicipality as HTMLElement).style.border = styleError;
  }else{
    (elementMunicipality as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.address == "") {
    (elementAdress as HTMLElement).style.border = styleError;
  }else{
    (elementAdress as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.postal_code == "") {
    (elementPostalCode as HTMLElement).style.border = styleError;
  }else{
    (elementPostalCode as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.coordinates_x == null) {
    (elementCoordinatesX as HTMLElement).style.border = styleError;
  }else{
    (elementCoordinatesX as HTMLElement).style.border = styleSuccess;
  }

  if(property.value.coordinates_y == null) {
    (elementCoordinatesY as HTMLElement).style.border = styleError;
  }else{
    (elementCoordinatesY as HTMLElement).style.border = styleSuccess;
  }
}

// Reset form
function cancel() {
  property.value = {
    type_property_id: 1,
    typology_id: null,
    category_id: 1,
    label_id: null,
    price: 0,
    rooms: 0,
    bathroom: 0,
    half_bathroom: 0,
    square_meters: 0,
    views: null,
    description: "",
    address: "",
    postal_code: "",
    state_id: null,
    municipality_id: null,
    title: "",
    amenities: [],
    parking: 0,
    coordinates_x: null,
    coordinates_y: null,
    videoLink: "",
    capture: "",
    pay_monthly: 0,
    maintenance_monthly: 0,
    zipcode: "",
  };
  state.files = []
}
</script>

<style lang="scss" scoped>
.content-map {
  margin-top: 20px;
}
.img-dropzone {
  height: 100px;
  width: 100%;
  margin-bottom: 10px;
  border-radius: 5px;
}
.checkbox-label {
  display: block;
  margin-bottom: 10px;
}

.additional-checkbox {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 10px;
}

.additional-checkbox label {
  color: rgba(88, 97, 103, 0.7);
  /* margin-left: 20px; */
  text-transform: capitalize;
}

input[type="checkbox"] {
  margin-right: 15px !important;
}

.checkbox-label {
  display: flex;
  align-items: center;
}

input[type="checkbox"] {
  margin-right: 5px;
}
.dropzone-1 {
  width: 100%;
  padding: 0px;
  border-radius: 8px;
  /* box-shadow: rgba(60, 64, 67, 0.1) 0px 2px 15px 0px; */
  font-size: 12px;
  line-height: 1.5;
}
.files {
  display: flex;
  flex-wrap: wrap;
  margin-top: 10px !important;
  width: 100%;
  padding: 10px;
  border-radius: 8px;
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
    rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
  font-size: 12px;
  line-height: 1.5;
}

.border {
  border: 2px dashed #ccc;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  transition: all 0.3s ease;
  background: #fff;

  &.isDragActive {
    border: 2px dashed #ffb300;
    background-color: #f4f4f9;
  }
}

.file-item {
  border-radius: 8px;
  background: rgb(244 244 249 / 100%);
  padding: 7px;
  max-width: 165px;
  margin-top: 0px;
  margin-right: 10px;

  &:first-child {
    margin-top: 0;
  }

  .delete-file {
    display: block;
    color: #2b2e97;
    margin-top: -5px;
    padding: 0px 0px;
    border-radius: 8px;
    cursor: pointer;
  }
}

.mt-3 {
  margin-top: 30px;
}
.mb-3 {
  margin-bottom: 30px !important;
}

.br-20 {
  border-radius: 20px;
}
</style>
