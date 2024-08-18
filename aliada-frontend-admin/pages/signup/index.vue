<template>
    <div class="page-wrapper">
        <div class="authentication-box">
            <div class="container-fluid">
                <div class="row log-in">
                    <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-8 form-login">
                        <img src="/image/logo/aliada-realestate-color-logo.png" class="bg-img" alt="">
                            <br><br><br>
                        <div class="card">
                            <div class="card-body">
                                <div class="title-3 text-start">
                                    <h2>Registro Aliado</h2>
                                    <br>
                                </div>
                                <form>
                                 <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <Icon name="material-symbols:person-outline" />
                                                        </div><!--fin del input-group-text-->
                                                    </div><!--fin del input-group-prepend-->
                                                    <input type="text" v-model="form.name" class="form-control" placeholder="Nombre" required/>
                                                </div><!--fin del input-group-->
                                            </div><!--fin del form-group-->
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <Icon name="material-symbols:person-outline" />
                                                        </div><!--fin del input-group-text-->
                                                    </div><!--fin del input-group-prepend-->
                                                    <input type="text" v-model="form.lastname" class="form-control" placeholder="Apellido" required/>
                                                </div><!--fin del input-group-->
                                            </div><!--fin del form-group-->
                                        </div>
                                  </div><!--fin del row-->
                                  <div class="row">
                                     <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <Icon name="material-symbols:person-outline" />
                                                    </div><!--fin del input-group-text-->
                                                </div><!--fin del input-group-prepend-->
                                                <input type="email" v-model="form.email" class="form-control" placeholder="Email" required/>
                                            </div><!--fin del input-group-->
                                        </div><!--fin del form-group-->
                                     </div>
                                  </div><!--fin del row-->
                                  <div class="row">
                                     <div class="col">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <Icon name="material-symbols:person-outline" />
                                                    </div><!--fin del input-group-text-->
                                                </div><!--fin del input-group-prepend-->
                                                <select v-model="form.group_leader_id" class="form-control" required>
                                                    <option value="">Selecciona team leader</option>
                                                    <option v-for="item in Teamleader" :value="item.id">{{ item.name }}</option>
                                                </select>
                                            </div><!--fin del input-group-->
                                        </div><!--fin del form-group-->
                                     </div>
                                  </div><!--fin del row-->
                                  <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <Icon name="material-symbols:person-outline" />
                                                        </div><!--fin del input-group-text-->
                                                    </div><!--fin del input-group-prepend-->
                                                    <input type="password" v-model="form.password" minlength="8" maxlength="20" class="form-control" placeholder="Contraseña" required/>
                                                </div><!--fin del input-group-->
                                            </div><!--fin del form-group-->
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <Icon name="material-symbols:person-outline" />
                                                        </div><!--fin del input-group-text-->
                                                    </div><!--fin del input-group-prepend-->
                                                    <input type="password" v-model="form.repeatPassword" minlength="8" maxlength="20" class="form-control" placeholder="Repetir Contraseña" required/>
                                                </div><!--fin del input-group-->
                                            </div><!--fin del form-group-->
                                        </div>
                                        <p class="info">La contraseña debe ser un minimo de 8 caracteres y debe contener letras y numeros</p>
                                  </div><!--fin del row-->
                                  <div class="row form-btn">
                                        <div class="col-md-5">
                                            <button type="button" class="btn btn-pill btn-gradient color-4" @click="signup()">Guardar</button>
                                        </div>
                                        <div class="col-md-7">
                                                Ya tienes cuenta? <a href="/login">Inicia sesión</a>
                                        </div>
                                  </div><!--fin del row-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-7 offset-xxl-1 col-lg-6 auth-img bg-size background_wrapper" style="background-size: cover !important; background-image:url('/image/others/login-bg.webp')">
                        <img src="/image/others/login-bg.webp" class="bg-img d-none" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ca } from 'date-fns/locale';
import swal from 'sweetalert';
import backendServices from "~/services/BackendServices";

const Teamleader = ref([]);
const form = ref({
  name: '',
  lastname: '',
  email: '',
  group_leader_id: '',
  password: '',
  repeatPassword: ''
});

definePageMeta({
  layout: 'login',
});

let password = ref<boolean>(false)

onMounted(async () => {
    await backendServices
    .getAliado()
    .then((response: any) => {
        Teamleader.value = response.data.data
    })
    .catch((error: any) => {
      console.error("Error al obtener datos:", error);
    });
});

function validatePassword(password: string) {
    const hasLetter = /[a-zA-Z]/.test(password);
    const hasNumber = /\d/.test(password);
    if(hasLetter && hasNumber){
        return true;
    }
}

function signup() {
try{
        const formData = new FormData();
        formData.append("name", form.value.name);
        formData.append("lastname", form.value.lastname);
        formData.append("email", form.value.email);
        formData.append("group_leader_id", form.value.group_leader_id);
        formData.append("password", form.value.password);
        formData.append("repeatPassword", form.value.repeatPassword);
        if(!validatePassword(form.value.password)){
            swal("Error","La contraseña debe contener letras y numeros", "error");
        }
         if(form.value.password != form.value.repeatPassword){
            swal("Error","Las contraseñas no coinciden", "error");
        }else{
                backendServices
                .signup(formData)
                .then((response: any) => {
                if(response.status == 201){
                    swal("Exito!",'Se ha creado correctamente', "success")
                    .then((value) => {
                        window.location.href = "/login";
                    });
                }
                }).catch((error: any) => {
                    swal("Error",'Error en el servidor', "error");
                });
            }
    }catch(error){
        swal("Error",'Todos los campos son requeridos', "error");
    }
}

</script>

<style scoped>

.info{
    font-size: 12px;
    color: #6c757d;
    margin-top: 0px;
    padding-left: 30px;
    padding-right: 30px;
}
</style>