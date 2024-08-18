<template>
  <div class="page-body">
    <CommonBreadcrumb title="Propiedades pendienetes por aprobar" page="Propiedades pendienetes por aprobar" />
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header pb-0">
              <h5>Filtrar propiedades</h5>
            </div>
            <div class="card-body admin-form">
              <form class="row gx-3" @submit.prevent="filterProperties">
                <div class="col-sm-2 form-group">
                  <label>Tipo de Propiedad</label>
                  <select class="form-control" v-model="selectedType">
                    <option value="">Seleccionar</option>
                    <option v-for="type in propertyTypes" :key="type.id" :value="type.id" >
                      {{ type.name }}
                    </option>
                  </select>
                </div>

                <div class="col-sm-2 form-group">
                  <label>Estatus / Entrega</label>
                  <select class="form-control" v-model="selectedStatus">
                    <option value="">Seleccionar</option>
                    <option
                      v-for="status in propertyStatus"
                      :key="status.id"
                      :value="status.id"
                    >
                      {{ status.name }}
                    </option>
                  </select>
                </div>

                <div class="col-sm-2 form-group">
                  <label>Recámaras</label>
                  <select class="form-control" v-model="selectedRooms">
                    <option value="">Seleccionar</option>
                    <option
                      v-for="roomOption in roomOptions"
                      :key="roomOption"
                      :value="roomOption"
                    >
                      {{ roomOption }}
                    </option>
                  </select>
                </div>

                <div class="col-sm-2 form-group">
                  <label>Baños</label>
                  <select class="form-control" v-model="selectedBathrooms">
                    <option value="">Seleccionar</option>
                    <option
                      v-for="bathroomOption in bathroomOptions"
                      :key="bathroomOption"
                      :value="bathroomOption"
                    >
                      {{ bathroomOption }}
                    </option>
                  </select>
                </div>

                <div class="col-sm-2 form-group">
                  <label>Área (m2)</label>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="550"
                    v-model="area"
                  />
                </div>

                <div class="form-btn col-sm-2">
                  <button
                    type="submit"
                    class="btn btn-pill btn-gradient color-4"
                  >
                    Filtrar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="property-2 row column-sm property-label property-grid payment-table">
                      <div id="batchDelete" class="transactions table-responsive custom-scrollbar">
                        <table class="table table-bordered table-striped text-center table-hover cursor-pointer">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Propiedad</th>
                              <th>Tipo</th>
                              <th>Precio (MXN)</th>
                              <th>Fecha</th>
                              <th>Área m<sup>2</sup></th>
                              <th>Clasificación</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-if="properties.length === 0">
                              <td colspan="8" class="text-center">
                                No se encontraron propiedades
                              </td>
                            </tr>
                            <tr
                              v-else
                              v-for="(property) in properties"
                              :key="property.id"
                            >
                              <td>{{ property.id }}</td>
                              <td>{{ property.title }}</td>
                              <td>{{ property.type_property.name }}</td>
                              <td>{{ formatPrice(property.price) }}</td>
                              <td>{{ formatDate(property.created_at) }}</td>
                              <td>{{ property.square_meters }}</td>
                              <td class="jsgrid-cell">
                                <span>{{ property.category.name }}</span>
                              </td>

                              <td>
                                <div class="btn-actions-wrapper">
                                  <NuxtLink
                                    :to="`${config.public.FRONTEND_URL}/property/single-property/${property.slug}`"
                                    external
                                    target="_blank"
                                  >
                                    <span class="show-property">
                                      <img src="/svg/see.svg" width="20" />
                                    </span>
                                  </NuxtLink>
                                  <NuxtLink
                                    :to="`/my-properties/edit-property/${property.slug}`"
                                  >
                                    <span class="edit-property">
                                      <img src="/svg/edit.svg" width="20" />
                                    </span>
                                  </NuxtLink>
                                  <span
                                    class="delete-property"
                                    @click="deleteProperty(property.id)"
                                  >
                                    <img src="/svg/delete.svg" width="20" />
                                  </span>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div><!--fin de la tabla-->
                  </div><!--fin de property-2-->
          </div>
        </div>
      </div>
    </div>

    <UModal v-model="modalDeleteOpen" prevent-close>
      <UCard
        :ui="{
          ring: '',
          divide: 'divide-y divide-gray-100 dark:divide-gray-100',
        }"
      >
        <template #header>
          <div class="flex items-center justify-between">
            <h3
              class="text-base font-semibold leading-6 text-gray-900 dark:text-white"
            >
              Eliminar propiedad
            </h3>
            <UButton
              color="gray"
              variant="ghost"
              icon="i-heroicons-x-mark-20-solid"
              class="-my-1"
              @click="modalDeleteOpen = false"
            />
          </div>
        </template>
        <p>Estas seguro que deseas eliminar la propiedad?.</p>
        <template #footer>
          <div class="flex items-end justify-end">
            <UButton
              style="margin-right: 10px; background-color: gray"
              @click="modalDeleteOpen = false"
              >Cancelar</UButton
            >
            <UButton @click="saveDeleteProperty()">Borrar</UButton>
          </div>
        </template>
      </UCard>
    </UModal> 
  </div>
</template>

<script setup lang="ts">
import { sl } from "date-fns/locale";
import backendServices from "~/services/BackendServices";

const config = useRuntimeConfig();
const toast = useToast();
const propertyTypes = ref([]);
const propertyStatus = ref([]);
const properties = ref([]);
const roomOptions = ref([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
const bathroomOptions = ref([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

const selectedType = ref(null);
const selectedStatus = ref(null);
const selectedRooms = ref(null);
const selectedBathrooms = ref(null);
const area = ref(null);
const property_id = ref<number>(0);

const isLoading = ref(false);
const pagination = ref({
  from: 0,
  to: 0,
  total: 0,
});

const page = 1;

const modalDeleteOpen = ref(false);

//tabs
const items = [{
  key: 'aprobados',
  label: 'Aprobados',
}, {
  key: 'pendienteporaprobar',
  label: 'Pendiente por aprobar',
}];
//fin de tabs


onMounted(async () => {
  try {
    isLoading.value = true;
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

    await filterProperties();
  } catch (error) {
    console.error("Error fetching data:", error);
  } finally {
    isLoading.value = false;
  }

  // Get all properties
  await backendServices
    .getAllPropertyByIdUser({}, page)
    .then((response: any) => {
      properties.value = response.data.data;
      pagination.value.from = response.data.from;
      pagination.value.to = response.data.to;
      pagination.value.total = response.data.total;
      isLoading.value = false;
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });

});
watch(
  () => selectedType.value,
  async (newValue: any, oldValue: any) => {
    await backendServices
      .getCategoryLabels(newValue)
      .then((response: any) => {
        propertyStatus.value = response.data;
        selectedStatus.value = null;
      })
      .catch((error: any) => {
        console.error("Error al obtener datos:", error);
      });
  }
);

const filterProperties = async () => {
  isLoading.value = true;
  const filter = {
    categoryProperty: selectedStatus.value,
    typeProperty: selectedType.value,
    areaProperty: area.value,
    roomsProperty: selectedRooms.value,
    bathsProperty: selectedBathrooms.value,
  };
  const response = await backendServices.getAllPropertyByIdUser(filter, page);
  await backendServices
    .getAllPropertyByIdUser(filter, page)
    .then((response: any) => {
      properties.value = response.data.data;
      pagination.value.from = response.data.from;
      pagination.value.to = response.data.to;
      pagination.value.total = response.data.total;
      isLoading.value = false;
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });
};

// Format Date
const formatDate = (dateString: string) => {
  const date = new Date(dateString);
  const day = date.getDate().toString().padStart(2, "0");
  const month = (date.getMonth() + 1).toString().padStart(2, "0");
  const year = date.getFullYear();
  return `${day}-${month}-${year}`;
};

// Format Price
const formatPrice = (price : number) => {
  return `$${new Intl.NumberFormat("en-US").format(price)}`;
};

const editProperty = (property) => {};

const deleteProperty = async (idProperty: number) => {
  property_id.value = idProperty;
  modalDeleteOpen.value = true;
};

const saveDeleteProperty = async () => {
  await backendServices
    .deleteProperty(property_id.value)
    .then((response: any) => {
      isLoading.value = false;
      filterProperties();
      toast.add({
        title: "Propiedad borrada con exito",
        color: "green",
        timeout: 3000,
      });
      modalDeleteOpen.value = false;
    })
    .catch((error: any) => {
      toast.add({
        title: "Error al eliminar la propiedad",
        color: "red",
        timeout: 3000,
      });
    });
};
</script>

<style scoped>
.btn-actions-wrapper {
  display: flex;
  justify-content: center;
  text-align: center;
}
.btn-actions-wrapper a {
  margin-right: 5px !important;
}

.tabs-container {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.tabs-container button {
  margin: 0 5px;
  padding: 10px 15px;
  border: 1px solid #007bff;
  background-color: #007bff;
  color: white;
  cursor: pointer;
  border-radius: 4px;
  transition: background-color 0.3s, border-color 0.3s;
}

.tabs-container button.active {
  background-color: #0056b3;
  border-color: #0056b3;
}

.tabs-container button:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

.tab-content {
  margin-top: 20px;
}



</style>
