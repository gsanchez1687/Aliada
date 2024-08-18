<template>
    <section class="small-section contact-2">
        <div class="container">
            <div class="row gx-3">
                <div class="col-xl-6 col-lg-5">
                    <div class="log-in px-xxl-5 px-lg-4">
                        <div class="mb-4 text-start">
                            <h2>¿Tienes una consulta?</h2>
                        </div>
                        <form class="row gx-3">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <Icon name="material-symbols:person-2-outline" />
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Tu nombre" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <Icon name="ph:phone" />
                                        </div>
                                    </div>
                                    <input placeholder="Teléfono o Whatsapp" class="form-control" name="mobnumber" id="tbNumbers"
                                        type="number" maxlength="10" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <Icon name="material-symbols:mail-outline" />
                                        </div>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6">Escribe tu consulta aquí
                                </textarea>
                            </div>
                            <div class="submit-btn with-captcha">
                                <div class="captcha">
                                    <div class="spinner">
                                        <label>
                                            <input type="checkbox" :disabled="check" @click="disable">
                                            <span class="checkmark"><span>&nbsp;</span></span>
                                        </label>
                                    </div>
                                    <div class="text">
                                        No soy un robot
                                    </div>
                                    <div class="logo">
                                        <img src="/image/inner-pages/recaptcha.png" alt="" />
                                        <p>reCAPTCHA</p>
                                        <small>Privacy - Terms</small>
                                    </div>
                                </div>
                                <div>
                                </div>
                                <button class="btn btn-gradient color-4 btn-flat" type="submit">Enviar Mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
                <ContactContact2Details />
            </div>
        </div>
    </section>
    <ContactContact2Downloadapp />
</template>

<script setup lang="ts">
let check = ref<boolean>(false)
function disable() {
    check.value = true
}
</script>

<style scoped></style>