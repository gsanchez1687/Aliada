<template>
  <section class="property-wizard horizontal-wizard">
    <div class="container">
      <div class="row wizard-box">
        <div class="col-lg-8 col-sm-10">
          <div class="theme-card">
            <form-wizard @on-complete="onComplete">
              <div class="wizard-form-details log-in">
                <tab-content title="Account information" :before-change="beforeTabSwitch">
                  <PageOtherpagesSignupWizardAccountInfo :classes="validationclass" />
                </tab-content>
                <tab-content title="Location" :before-change="beforeTabSwitch2">
                  <PageOtherpagesSignupWizardLocation :classes="validationclass" />
                </tab-content>
                <tab-content title="Successfully submitted">
                  <PageOtherpagesSignupWizardSubmitted />
                </tab-content>
              </div>
            </form-wizard>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import Swal from "sweetalert2";
import { FormWizard, TabContent } from "vue3-form-wizard";
import "vue3-form-wizard/dist/style.css";
import { usewizaredStore } from "~/store/wizard";
const validationclass = ref<string>("");
let store = usewizaredStore();
function beforeTabSwitch() {
  if (
    store.name !== "" &&
    store.phone !== "" &&
    store.email !== "" &&
    store.password !== ""
  ) {
    validationclass.value = "was-validated";
    return true;
  } else {
    return false;
  }
}
function beforeTabSwitch2() {
  if (
    store.address !== "" &&
    store.city !== "" &&
    store.country !== "" &&
    store.state !== "" &&
    store.pincode !== ""
  ) {
    validationclass.value = "was-validated";
    return true;
  } else {
    return false;
  }
}
function onComplete() {
  store.submit()

}
</script>

<style scoped></style>
