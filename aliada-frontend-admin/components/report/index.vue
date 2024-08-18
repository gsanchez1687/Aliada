<template>
    <div class="page-body">
        <CommonBreadcrumb title="Reporte de ventas" page="Reporte de ventas"/>
        <div class="container-fluid property-wizard horizontal-wizard">
            <div class="row wizard-box">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body admin-wizard2">
                            <form-wizard step-size="xs">
                                <tab-content title="Reserva">
                                    <form class="gx-3">
                                        <h5>Detalle de la reserva</h5>
                                        <div class="row">
                                        <div class="col form-group">
                                            <label>Identificador de la propiedad <span>*</span></label>
                                            <select class="form-control" name="" id="">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>

                                        <div class="col form-group">
                                            <label>Nombre de la propiedad <span>*</span></label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col form-group">
                                            <label>Nombre del cliente <span>*</span></label>
                                            <input class="form-control" type="text" name="" id="">
                                        </div>

                                        <div class="col form-group">
                                            <label>Nombre del aliado <span>*</span></label>
                                            <select class="form-control" name="" id="">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>

                                        <div class="col form-group">
                                            <label>Team Leader <span>*</span></label>
                                            <select class="form-control" name="" id="">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        </div><!--fin del row--->

                                        <div class="row">

                                            <div class="col form-group">
                                                <label>Monto de venta <span>*</span></label>
                                            <input class="form-control" type="text" name="" id="">
                                            </div>

                                            <div class="col form-group">
                                                <label>Tipo de moneda <span>*</span></label>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Seleccione</option>
                                                    <option value="mxm">mxm</option>
                                                    <option value="usd">usd</option>
                                                </select>
                                            </div>

                                            <div class="col form-group">
                                                <label>Porcentaje de comisión <span>*</span></label>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">10%</option>
                                                    <option value="2">20%</option>
                                                    <option value="3">30%</option>
                                                    <option value="4">40%</option>
                                                    <option value="5">50%</option>
                                                </select>
                                            </div>

                                            <div class="col form-group">
                                                <div class="control-group">
                                                    <label for="">Incluye IVA ? <span>*</span></label>
                                                    <label class="control control-radio">
                                                        SI
                                                        <input type="radio" name="iva" />
                                                        <div class="control_indicator"></div>
                                                    </label>
                                                    <label class="control control-radio">
                                                        NO
                                                        <input type="radio" name="iva" />
                                                        <div class="control_indicator"></div>
                                                    </label>
                                                </div>
                                            </div>

                                        </div><!--fin del row--->

                                        <div class="row">
                                            <div class="col form-group">
                                                <label>Tipo de lead <span>*</span></label>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Seleccione</option>
                                                    <option value="1"> Lead propio</option>
                                                    <option value="2">Lead de campaña</option>
                                                </select>
                                            </div>

                                            <div class="col form-group">
                                                <label>Como lo conoció? <span>*</span></label>
                                            <input class="form-control" type="text" name="" id="">
                                            </div>

                                            <div class="col form-group">
                                                <label>Nombre de la compaña de marketing <span>*</span></label>
                                            <input class="form-control" placeholder="Ej. Inmuebles" type="text" name="" id="">
                                            </div>
                                        </div><!--fin del row--->

                                        <div class="row">

                                            <div class="col form-group">
                                                <div class="control-group">
                                                    <label for="">Captacion de propiedad (1%) <span>*</span></label>
                                                    <label class="control control-radio">
                                                        SI
                                                        <input type="radio" name="captacion" />
                                                        <div class="control_indicator"></div>
                                                    </label>
                                                    <label class="control control-radio">
                                                        NO
                                                        <input type="radio" name="captacion" />
                                                        <div class="control_indicator"></div>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col form-group">
                                                <div class="control-group">
                                                    <label for="">Referido <span>*</span></label>
                                                    <label class="control control-radio">
                                                        SI
                                                        <input type="radio" name="referido"/>
                                                        <div class="control_indicator"></div>
                                                    </label>
                                                    <label class="control control-radio">
                                                        NO
                                                        <input type="radio" name="referido" />
                                                        <div class="control_indicator"></div>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col form-group">
                                                <div class="control-group">
                                                    <label for="">Comisión compartida <span>*</span></label>
                                                    <label class="control control-radio">
                                                        SI
                                                        <input type="radio" name="comision"/>
                                                        <div class="control_indicator"></div>
                                                    </label>
                                                    <label class="control control-radio">
                                                        NO
                                                        <input type="radio" name="comision" />
                                                        <div class="control_indicator"></div>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col form-group">
                                                <label>Quien paga ? <span>*</span></label>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Aliada</option>
                                                    <option value="2">Broker</option>
                                                </select>
                                            </div>

                                            <div class="col form-group">
                                                <label>Comisión compartida (%) <span>*</span></label>
                                                <input class="form-control" placeholder="Ej. 2%" type="text" name="" id="">
                                            </div>

                                        </div><!--fin del row--->

                                        <div class="row">
                                            <div class="col form-group">
                                                <p>Documentos a cargar <span>*</span></p>
                                                <p><b>Importante:</b> Para validar su reporte debe cargar los siguientes documentos en formato PDF, PNG, o JPEG legibles</p>
                                                <p>
                                                    1. Comprobante de apartado <br>
                                                    2. Carta oferta firmada <br>
                                                </p>
                                            </div>

                                            <div class="col form-group">
                                                <!--dropzone-->
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
                                                <!--end dropzone-->
                                            </div>
                                        </div><!--fin del row--->

                                        <div class="row">
                                            <h5>Distribución de la comisión</h5>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                    <th>ID propiedad</th>
                                                    <th>Aliado</th>
                                                    <th>Valor de la propiedad</th>
                                                    <th>Comisión pactada</th>
                                                    <th>Comisión a broker(60%)</th>
                                                    <th>Comisión aliada(40%)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>DOWTON</td>
                                                        <td>Oscar de carlos</td>
                                                        <td>$1.443.693 MXN</td>
                                                        <td>6%</td>
                                                        <td>$44.804,15 MXN</td>
                                                        <td>$29,869,43 MXN</td>
                                                    </tr>
                                                    <tr>
                                                        <td>DOWTON</td>
                                                        <td>Oscar de carlos</td>
                                                        <td>$1.443.693 MXN</td>
                                                        <td>6%</td>
                                                        <td>$44.804,15 MXN</td>
                                                        <td>$29,869,43 MXN</td>
                                                    </tr>
                                                    <tr>
                                                        <td>DOWTON</td>
                                                        <td>Oscar de carlos</td>
                                                        <td>$1.443.693 MXN</td>
                                                        <td>6%</td>
                                                        <td>$44.804,15 MXN</td>
                                                        <td>$29,869,43 MXN</td>
                                                    </tr>
                                                    <tr>
                                                        <td>DOWTON</td>
                                                        <td>Oscar de carlos</td>
                                                        <td>$1.443.693 MXN</td>
                                                        <td>6%</td>
                                                        <td>$44.804,15 MXN</td>
                                                        <td>$29,869,43 MXN</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><!--fin del row--->
                                        <div class="row">
                                            <div class="form-btn col-sm-12">
                                                <button type="button" class="btn btn-pill btn-gradient color-4">Crear</button>
                                                <button type="button" class="btn btn-pill btn-dashed color-4">Cancelar</button>
                                            </div>
                                        </div>
                                    </form>
                                </tab-content>

                                <tab-content title="Concreta tu venta" >
                                    <UserFormwizardSecondtab/>
                                </tab-content>
                                <tab-content title="Venta concretada" >
                                    <div class="row">
                                        <div class="finish">
                                            <div class="party-popper-icon"></div>
                                            <h1>¡Haz concretado tu venta con éxito!</h1>
                                            <div class="container">
                                                <div>
                                                    <span class="icon money-icon"></span>
                                                    <span>Tu comisión:</span>
                                                    <span>$44.804,15 MXN</span>
                                                </div>
                                                <div class="border-vertical"></div>
                                                <div>
                                                    <span class="icon check-icon"></span>
                                                    <span>Haz ganado:</span>
                                                    <span>1120 puntos</span>
                                                </div>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </tab-content>

                               
                            </form-wizard>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
//importing components
import {FormWizard,TabContent} from "vue3-form-wizard";
import { useDropzone } from "vue3-dropzone";
import 'vue3-form-wizard/dist/style.css';

//reactive state
const state = reactive({
  files: [],
});

//function to handle the file upload
const isDragActive = ref(true);

//function to get the file url
function getFileUrl(file: any) {
  if (file) {
    return URL.createObjectURL(file);
  } else {
    return "";
  }
}

//function to handle the file drop
function onDrop(acceptFiles: any, rejectReasons: any) {
  state.files.push(...acceptFiles);
}

//function to handle the file delete
function handleClickDeleteFile(index: number) {
  state.files.splice(index, 1);
}

//function to handle the file preview
const { getRootProps, getInputProps, ...rest } = useDropzone({ onDrop });

</script>

<style ang="scss" scoped>

.form-group span{
    color: red;
    font-size: 12px;
}

.control {
    display: block;
    position: relative;
    padding-left: 30px;
    margin-bottom: 5px;
    padding-top: 3px;
    cursor: pointer;
}
    .control input {
        position: absolute;
        z-index: -1;
        opacity: 0;
    }
.control_indicator {
    position: absolute;
    top: 2px;
    left: 0;
    height: 20px;
    width: 20px;
    background: #e6e6e6;
    border: 0px solid #000000;
    border-radius: undefinedpx;
}
.control:hover input ~ .control_indicator,
.control input:focus ~ .control_indicator {
    background: #cccccc;
}

.control input:checked ~ .control_indicator {
    background: #6249A2;
}
.control:hover input:not([disabled]):checked ~ .control_indicator,
.control input:checked:focus ~ .control_indicator {
    background: #6249A2;
}
.control input:disabled ~ .control_indicator {
    background: #e6e6e6;
    opacity: 0.6;
    pointer-events: none;
}
.control_indicator:after {
    box-sizing: unset;
    content: '';
    position: absolute;
    display: none;
}
.control input:checked ~ .control_indicator:after {
    display: block;
}
.control-radio .control_indicator {
    border-radius: 50%;
}

.control-radio .control_indicator:after {
    left: 7px;
    top: 7px;
    height: 6px;
    width: 6px;
    border-radius: 50%;
    background: #ffffff;
    transition: background 250ms;
}
.control-radio input:disabled ~ .control_indicator:after {
    background: #7b7b7b;
}.control-radio .control_indicator::before {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    width: 4.5rem;
    height: 4.5rem;
    margin-left: -1.3rem;
    margin-top: -1.3rem;
    background: #2aa1c0;
    border-radius: 3rem;
    opacity: 0.6;
    z-index: 99999;
    transform: scale(0);
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

h5{
    color:#586167;
}

.table thead th{
    color: #586167;
}
.table.table-striped {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #e0e0e0;
    tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }
}

.finish {
    margin-top: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 50vh;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 481px;
    height: 141px;
    background-color: #714DCC; /* Purple background color */
    border-radius: 10px; /* Rounded corners */
    padding: 20px; /* Space inside the container */
    box-sizing: border-box; /* Include padding in the element's total width and height */
    color: white; /* White text color */
    font-family: Arial, sans-serif; /* Font style */
}

.container div {
    padding: 10px 30px 10px 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.container div span {
    margin-top: 2px;
    font-size: 16px; /* Adjust font size as needed */
}

.icon {
   
}

.party-popper-icon {
    width: 50px; /* Adjust the size as needed */
    height: 50px; /* Adjust the size as needed */
    background-image: url('../../assets/party-popper.png');
    background-size: cover; /* Ensure the image covers the entire element */
    background-position: center;
    display: inline-block;
}


.money-icon::before {
    font-size: 42px !important; /* Adjust icon size as needed */
    content: "\1F4B0"; /* Unicode for money bag emoji */
}

.check-icon::before {
    font-size: 32px !important; /* Adjust icon size as needed */
    content: "\2705"; /* Unicode for check mark emoji */
}
.border-vertical {
    border-left: 1px solid white;
    height: 100%;
}




</style>