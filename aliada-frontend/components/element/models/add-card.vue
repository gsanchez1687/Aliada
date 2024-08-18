<template>
    <div class="modal fade edit-profile-modal" id="add-card">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">add new card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="a-month">card type</label>
                            <select id="a-month" class="form-control">
                                <option v-for="(opt , index) in option" :key="index">{{ opt }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="a-na">name on card</label>
                            <input type="text" class="form-control" id="a-na">
                        </div>
                        <div class="form-group">
                            <label for="a-n">card number</label>
                            <input type="text" class="form-control" id="a-n">
                        </div>
                        <div class="row gx-3">
                            <div class="form-group col-md-8">
                                <label for="a-e">expiry date</label>
                                <input type="text" class="form-control" id="a-e">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="a-c">cvv</label>
                                <input type="password"  maxlength="3"  class="form-control" id="a-c">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dashed color-2 btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-gradient color-2 btn-pill" data-bs-dismiss="modal">add card</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
let option:string[]=['add new card...','credit card','debit card','debit card with ATM pin']
</script>

<style scoped>

</style>