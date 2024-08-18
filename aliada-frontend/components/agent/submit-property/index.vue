<template>
  <section class="property-wizard">
    <div class="container">
      <div class="row wizard-box">
        <div class="col-sm-12">
          <form-wizard>
            <div class="wizard-form-details">
              <tab-content title="General">
                <AgentSubmitPropertyGeneral />
              </tab-content>
              <tab-content title="Address">
                <AgentSubmitPropertyAddress />
              </tab-content>
              <tab-content title="Gallery">
                <AgentSubmitPropertyGallery />
              </tab-content>
              <tab-content title="Confirmation">
                <AgentSubmitPropertyConfirmation />
              </tab-content>
            </div>
          </form-wizard>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { FormWizard, TabContent } from "vue3-form-wizard";
import "vue3-form-wizard/dist/style.css";
</script>

<style scoped></style>