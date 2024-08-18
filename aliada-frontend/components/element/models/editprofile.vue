<template>
    <div class="modal fade edit-profile-modal" id="edit-profile">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row gx-3">
                            <div class="form-group col-md-6">
                                <label for="first">first name</label>
                                <input type="text" class="form-control" id="first" placeholder="first name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last">last name</label>
                                <input type="text" class="form-control" id="last" placeholder="last name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">gender</label>
                                <select id="gender" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>female</option>
                                    <option>male</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Birthday</label>
                                <vue-date-picker v-model="date"></vue-date-picker>
                            </div>
                            <div class="form-group col-12">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dashed color-2 btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-gradient color-2 btn-pill" data-bs-dismiss="modal">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
let date = ref()

</script>

<style scoped></style>