<template>
  <div class="page-wrapper">
    <div class="authentication-box">
      <div class="container-fluid">
        <div class="row log-in">
          <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-8 form-login">
            <img
              src="/image/logo/aliada-realestate-color-logo.png"
              class="bg-img"
              alt=""
            />
            <br /><br /><br />
            <div class="card">
              <div class="card-body">
                <div class="title-3 text-start">
                  <h2>Soy Aliado</h2>
                  <br />
                </div>
                <form autocomplete="off" @submit.prevent="handleLogin">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <Icon name="material-symbols:person-outline" />
                        </div>
                      </div>
                      <input
                        type="email"
                        v-model="form.email"
                        class="form-control"
                        placeholder="Email"
                        autocomplete="off"
                      />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <Icon name="material-symbols:lock-outline" />
                        </div>
                      </div>
                      <input :type="password ? 'text' : 'password'" v-model="form.password" id="pwd-input" class="form-control" placeholder="Contraseña" autocomplete="off" maxlength="20"/>
                      <div class="input-group-apend">
                        <div class="input-group-text" @click="password = !password">
                          <i id="pwd-icon" :class=" password ? 'far fa-eye' : 'far fa-eye-slash'"></i>
                        </div>
                      </div>
                    </div>
                    <div class="important-note">
                      La contraseña debe tener un mínimo de 8 caracteres y debe
                      contener letras y números.
                    </div>
                  </div>
                  <div class="d-flex">
                    <label class="d-block mb-0" for="chk-ani">
                      <input class="checkbox_animated color-4" id="chk-ani" type="checkbox"/>
                      Recordarme
                    </label>
                    <!-- <a
                      href="https://sheltos-vue.vercel.app/page/otherpages/forgot-password"
                      class="font-rubik text-color-4"
                      >¿Olvidaste tu contraseña?</a
                    > -->
                  </div>
                  <div>
                    <button type="button" class="btn btn-gradient btn-pill color-4 me-sm-3 me-2" @click="handleLogin()">
                      Iniciar sesión
                    </button>
                    <nuxt-link to="/signup" target="_parent" class="btn btn-dashed btn-pill color-4">Crear Cuenta</nuxt-link>
                  </div>
                  <div class="divider">
                    <!--<h6>or</h6>-->
                  </div>
                  <!-- <CommonSocialicon title="Log in with"/> -->
                </form>
              </div>
            </div>
          </div>
          <div class="col-xxl-7 col-xl-7 offset-xxl-1 col-lg-6 auth-img bg-size background_wrapper" style="background-size: cover !important; background-image: url('/image/others/login-bg.webp');"
          >
            <img
              src="/image/others/login-bg.webp"
              class="bg-img d-none"
              alt=""
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const { login } = useSanctumAuth();

definePageMeta({
  layout: 'login',
});

const form = ref({
  email: '',
  password: '',
});

const handleLogin = async () => {
  try {
    await login(form.value);
  } catch (error) {
    console.error('Error al iniciar sesión:', error);
  }
};

let password = ref<boolean>(false);
</script>

<style scoped></style>
