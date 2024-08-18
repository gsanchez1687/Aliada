<template>
  <section class="login-wrap">
    <div class="container">
      <div class="row log-in">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
          <div class="theme-card">
            <div class="title-3 text-start">
              <h2>Log in</h2>
            </div>
            <form>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <Icon name="material-symbols:person-2-outline" />
                    </div>
                  </div>
                  <input type="email" class="form-control" placeholder="Enter Email" required />
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <Icon name="material-symbols:lock-outline" />
                    </div>
                  </div>
                  <input :type="type" id="pwd-input" class="form-control" placeholder="Password" maxlength="8" required />
                  <div class="input-group-apend">
                    <div class="input-group-text">
                      <i id="pwd-icon" :class="showpassword ? ' far fa-eye' : 'far fa-eye-slash'" @click="show()"></i>
                    </div>
                  </div>
                </div>
                <div class="important-note">
                  password should be a minimum of 8 characters and should contains letters and numbers
                </div>
              </div>
              <div class="d-flex">
                <label class="d-block mb-0" for="chk-ani">
                  <input class="checkbox_animated color-2" id="chk-ani" type="checkbox" />
                  <span>Remember me</span>
                </label>
                <nuxt-link to="/page/otherpages/forgot-password" class="font-rubik text-color-2">Forgot password
                  ?</nuxt-link>
              </div>
              <div>
                <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">
                  Log in
                </button>
                <nuxt-link to="/page/otherpages/signup" class="btn btn-dashed btn-pill color-2">Create Account</nuxt-link>
              </div>
              <ElementSocialaccount />
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
let showpassword = ref<boolean>(false);
let type = ref<string>('password')
function show() {
  showpassword.value = !showpassword.value
  if (showpassword.value == true) {
    type.value = 'text'
  }
  else {
    type.value = 'password'
  }
}
</script>

<style scoped></style>