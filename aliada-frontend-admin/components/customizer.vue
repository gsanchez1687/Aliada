<template>
    <div class="customizer-wrap" :class="open?'open' : ''">
        <div class="customizer-links"  @click="open = true">
          <Icon name="material-symbols:settings-outline" />
        </div>
        <div class="customizer-contain custom-scrollbar">
            <div class="setting-back">
                <Icon name="ic:round-close" @click="open = false"/>
            </div>
            <div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-1">Layout type</h6>
                </div>
                <div class="option-setting">
                    <span>Light</span>
                    <label class="switch">
                        <input type="checkbox" name="chk1" value="option" @input="check()" class="setting-check"><span class="switch-state"></span>
                    </label>
                    <span>Dark</span>
                </div>
            </div>
            <!--<div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-1">Layout Direction</h6>
                </div>
                <div class="option-setting">
                    <span>LTR</span>
                    <label class="switch">
                        <input type="checkbox" name="chk2" value="option"  @input="layout()" class="setting-check1"><span class="switch-state"></span>
                    </label>
                    <span>RTL</span>
                </div>
            </div>-->
            <!--<div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-1">Unlimited Color</h6>
                </div>
                 <div class="option-setting unlimited-color-layout">
                    <div class="form-group">
                        <label for="ColorPicker1">color 1</label>
                        <input id="ColorPicker1" v-model="primary" @change="setcolor()" type="color"  name="Default">
                    </div>
                    <div class="form-group">
                        <label for="ColorPicker2">color 2</label>
                        <input id="ColorPicker2" v-model="secondary" type="color" @change="setcolor()" name="Default">
                    </div> 
                </div> 
            </div>-->
        </div>
    </div>
</template>

<script lang="ts" setup>

</script>

<style lang="scss" scoped>

</style>