<template>
    <div class="page-body">
        <CommonBreadcrumb title="Crear usuario" page="Administrar usuarios"/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Detalles del usuario</h5>
                        </div>
                        <div class="card-body admin-form">
                            <form class="row gx-3" @submit.prevent="createUser">

                                <div class="col-sm-3 col-sm-3 form-group">
                                    <label>Nombre <span class="font-danger">*</span></label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      required
                                      v-model="user.name"
                                      placeholder="Nombre"
                                    />
                                  </div>

                                  <div class="col-sm-3 col-sm-3 form-group">
                                    <label>Apellido <span class="font-danger">*</span></label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      required
                                      v-model="user.lastname"
                                      placeholder="Apellido"
                                    />
                                  </div>

                                  <div class="col-sm-3 form-group">
                                    <label>Género <span class="font-danger">*</span></label>
                                    <select
                                      class="form-control"
                                      required
                                      v-model="user.gender"
                                      >
                                      <option value="">Seleccionar</option>
                                      <option value="Hombre">Hombre</option>
                                      <option value="Mujer">Mujer</option>
                                      <option value="Otro">Otro</option>
                                    </select>
                                  </div>

                                  <div class="col-sm-3 form-group">
                                    <label>Rol de usuario <span class="font-danger">*</span></label>
                                    <select
                                      class="form-control"
                                      required
                                      v-model="user.group_leader_id"
                                      >
                                      <option value="">Seleccionar</option>
                                      <option value="4">Administrador</option>
                                      <option value="5">Usuario</option>
                                      <option value="3">Mentor</option>
                                      <option value="2">Team leader</option>
                                      <option value="1">Aliado</option>
                                      
                                    </select>
                                  </div>

                                  <div class="col-sm-3 form-group">
                                    <label>Teléfono <span class="font-danger">*</span></label>
                                    <input
                                      type="phone"
                                      class="form-control"
                                      placeholder="+52..."
                                      required
                                      v-model="user.phone"
                                    />
                                  </div>

                                  <div class="col-md-3 col-sm-3">
                                    <label>Fecha de nacimiento <span class="font-danger">*</span></label>
                                    <VueDatePicker v-model="user.date_birth"></VueDatePicker>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Correo electrónico <span class="font-danger">*</span></label>
                                    <input
                                      type="phone"
                                      class="form-control"
                                      placeholder="hola@aliadarealestate.com"
                                      required
                                      v-model="user.email"
                                    />
                                  </div>

                                  <div class="col-md-3 col-sm-3">
                                    <label>Contraseña <span class="font-danger">*</span></label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      required
                                      v-model="user.password"
                                    />
                                </div>


                                <div class="col-md-3 col-sm-3">
                                  <label>Repetir contraseña <span class="font-danger">*</span></label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    required
                                    v-model="user.repeatPassword"
                                  />
                              </div>

                              <div class="col-md-6 col-sm-6">
                                <label>Dirección <span class="font-danger">*</span></label>
                                <input
                                  type="text"
                                  class="form-control"
                                  required
                                  v-model="user.address"
                                />
                              </div>

                              <div class="col-md-3 col-sm-3">
                                <label>Código postal <span class="font-danger">*</span></label>
                                <input
                                  type="number"
                                  class="form-control"
                                  required
                                  v-model="user.code_postal"
                                />
                              </div>

                                <!-- <CommonInputfieldsTextfield label="First name" placeholder="enter your name" classes="col-md-4 col-sm-6" star="*"/>
                                <CommonInputfieldsTextfield label="Last name" placeholder="enter your surname" classes="col-md-4 col-sm-6" star="*"/>
                                <CommonInputfieldsStatusfield label="Gender" show="Gender" classes="col-md-4 col-sm-6" :data="Gender" star="*"/>
                                <CommonInputfieldsNumberfield label="Phone number" placeholder="enter your mobile number" classes="col-md-4 col-sm-6" star="*"/>
                                <div class="col-md-4 col-sm-6">
                                    <label>Date of birth <span class="font-danger">*</span></label>
                                    <VueDatePicker v-model="date"></VueDatePicker>
                                </div>
                                <CommonInputfieldsTextfield label="Email Address" placeholder="enter your email" classes="col-md-4 col-sm-6" star="*"/>
                                <CommonInputfieldsTextfield label="Password" placeholder="Enter your password" classes=" col-sm-6" star="*"/>
                                <CommonInputfieldsTextfield label="Confirm Password" placeholder="Enter your password" classes=" col-sm-6" star="*"/>
                                <CommonInputfieldsTextarea classes="col-sm-12" label="Description" /> 
                                <CommonInputfieldsTextfield label="Address" placeholder="Enter your Address" classes=" col-sm-6" star="*"/>
                                <CommonInputfieldsNumberfield label="Zip code" placeholder="Enter pin code" classes="col-sm-6" star="*"/>-->
                                <!-- <div class="dropzone-admin">
                                    <label>Media</label>
                                    <DropZone  :maxFiles="Number(10000000000)"  url="http://localhost:5000/item" :uploadOnDrop="true" :multipleUpload="true" class="p-3" :parallelUpload="3"/>
                                </div> -->
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
                                <div class="form-btn">
                                    <button type="button" class="btn btn-pill btn-gradient color-4" @click="createUser()">Crear</button>
                                    <button type="button" class="btn btn-pill btn-dashed color-4">Cancelar</button>
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
//IMPORTACIONES
import { onMounted, reactive, ref } from "vue";
import { useDropzone } from "vue3-dropzone";
import backendServices from "~/services/BackendServices";
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import { repeat } from "lodash";
import { ca } from "date-fns/locale";

//DECLARACIONES
const state = reactive({
  files: [],
});
const user = ref({
group_leader_id:"",
 name: "",
 lastname:"",
 roles: "",
 phone: "",
 date_birth: "",
 email: "",
 password: "",
 repeatPassword: "",
 address: "",
 code_postal: "",
 gender: "",
});
const { getRootProps, getInputProps, ...rest } = useDropzone({ onDrop });
const toast = useToast();

//METODOS
function getFileUrl(file: any) {
  if (file) {
    return URL.createObjectURL(file);
  } else {
    return "";
  }
}

function onDrop(acceptFiles: any, rejectReasons: any) {
  state.files.push(...acceptFiles);
}

state.files.forEach((file: any, index: number) => {
    formData.append(`images[${index}]`, file);
  });

function handleClickDeleteFile(index: number) {
  state.files.splice(index, 1);
}


//obtener la lista de roles
onMounted(async () => {
  //await backendServices.getRoles().then( (responde:any) =>{
    //  roles.value = responde.data
  // })
});

//Guadar el formulario
function createUser(){
  try{
    const datebirth = user.value.date_birth ? user.value.date_birth : new Date();
    const dateFinal = new Date(datebirth).toISOString().split('T')[0];
    const formData = new FormData();
    formData.append("group_leader_id", user.value.group_leader_id);
    formData.append("name", user.value.name);
    formData.append("lastname", user.value.lastname);
    formData.append("phone", user.value.phone);
    formData.append("date_birth", dateFinal);
    formData.append("email", user.value.email);
    formData.append("password", user.value.password);
    formData.append("repeatPassword", user.value.repeatPassword);
    formData.append("address", user.value.address);
    formData.append("code_postal", user.value.code_postal);
    formData.append("gender", user.value.gender);

    state.files.forEach((file: any, index: number) => {
      formData.append(`images[${index}]`, file);
    });

    if(user.value.name && user.value.lastname && user.value.group_leader_id && user.value.phone && user.value.date_birth && user.value.email && user.value.password && user.value.repeatPassword && user.value.address && user.value.code_postal){
      backendServices.createUser(formData).then((response: any) => {
        if (response.status === 201) {
          toast.add({title: "Creado con exito",color: "green",background: 'dark:bg-slate-900',timeout: 5000,});
        } else {
          toast.add({title: 'Error al crear el usuario',color: "red",background: 'dark:bg-slate-900',timeout: 5000});
        }
      });
    }else{
      toast.add({title: 'Formulario incompleto',color: "red",background: 'dark:bg-slate-900',timeout: 5000,});
    }
  }catch(e){
    toast.add({title: `Error al crear el usuario ${e} `,color: "red",background: 'dark:bg-slate-900',timeout: 5000});
  }
  
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