<template>
    <div class="page-body">
        <CommonBreadcrumb title="Todos los usuarios" page="Administrar usuarios"/>
        <div class="container-fluid">
            <div class="row agent-section property-section user-lists">
                <div class="col-lg-12">
                    <div class="col-xl-12">
                        <div class="property-2 row column-sm property-label property-grid payment-table">
                          <div id="batchDelete" clcass="transactions table-responsive custom-scrollbar">
                            <table class="table table-bordered table-striped text-center table-hover cursor-pointer">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre y apellido</th>
                                  <th>Email</th>
                                  <th>Teléfono</th>
                                  <th>Fecha creación</th>
                                  <th>Tipo de usuario</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-if="(users.length === 0)">
                                  <td colspan="8" class="text-center">
                                    No se encontraron usuarios
                                  </td>
                                </tr>
                                <tr v-else v-for="user in users" :key="user.id">
                                  <td>{{ user.id }}</td>
                                  <td>{{ user.name }} {{ user.lastname }}</td>
                                  <td>{{ user.email }}</td>
                                  <td>{{ user.phone }}</td>
                                  <td>{{ user.created_at }}</td>
                                  <td>{{ user.role }}</td>
                                  <td class="btn-actions-wrapper">
                                    <div class="btn-actions-wrapper">
                                      <nuxt-link :to="'/admin/user/edituser/' + user.id" class=""> <img src="/svg/edit.svg" width="20" /></nuxt-link>
                                      <nuxt-link :to="'/admin/user/view/' + user.id" class=""> <img src="/svg/see.svg" width="20" /></nuxt-link>
                                      <nuxt-link  class=""> <img src="/svg/delete.svg" width="20" /></nuxt-link>
                                  </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table><!--end table-->
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
// import { ref, onMounted } from "vue";
import backendServices from "~/services/BackendServices";

const toast = useToast();
const users = ref([]);

onMounted(async() => {
    await backendServices
    .getAllUser()
    .then((response) => {
      if(response.status == 201){
        users.value = response.data.data;
      }else{
        toast.add({title: 'Error al cargar usuarios',color: "red",background: 'dark:bg-slate-900',timeout: 5000});
      }
    })
});

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
</style>
