<template>
  <div class="agent-property">
    <div class="filter-panel">
      <div class="top-panel">
        <div>
          <h3>Properties Listing</h3>
          <span class="show-result"
            >Showing <span>1-15 of 70</span> Listings</span
          >
        </div>
        <ul class="grid-list-filter d-flex">
          <li>
            <div class="dropdown">
              <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"
                ><span>{{ selected }}</span>
                <i class="fas fa-angle-down ms-lg-3 ms-2"></i
              ></span>
              <div class="dropdown-menu text-start">
                <nuxt-link
                  class="dropdown-item"
                  to="javascript:void(0)"
                  v-for="(item, index) in sorting"
                  :key="index"
                  @click="getvalue(item)"
                  >{{ item }}</nuxt-link
                >
              </div>
            </div>
          </li>
          <li class="grid-btn" :class="active == 'grid' ? 'active' : ''">
            <nuxt-link
              to="javascript:void(0)"
              class="grid-layout-view"
              @click="gridview()"
            >
              <Icon name="lucide:layout-grid" />
            </nuxt-link>
          </li>
          <li class="list-btn" :class="active == 'list' ? 'active' : ''">
            <nuxt-link
              to="javascript:void(0)"
              class="list-layout-view"
              @click="setlistview()"
            >
              <Icon name="material-symbols:format-list-bulleted" />
            </nuxt-link>
          </li>
        </ul>
      </div>
    </div>
  </div>
  added
  <AgentAgentProfileListdata :classes="classes" :lview="lview" />
</template>
<script setup lang="ts">
let sorting: string[] = [
  "Lo más nuevo",
  "Lo más antiguo",
  "Destacados",
  "Filtrar por precio (menor a mayor)",
];
let classes = ref<string>("col-md-6");
let selected = ref("Filtrar por...");
let active = ref<string>("grid");
let lview = ref<string>("");
function getvalue(value: string) {
  selected.value = value;
}
function setlistview() {
  classes.value = "col-md-12";
  lview.value = "list-view";
  active.value = "list";
}
function gridview() {
  active.value = "grid";
  lview.value = "";
  classes.value = "col-md-6";
}
</script>

<style scoped></style>
