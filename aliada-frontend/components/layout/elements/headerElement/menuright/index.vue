<template>
    <ul class="header-right">
        <li class="right-menu color-6">
            <ul class="nav-menu">
                <LayoutElementsHeaderElementMenurightLanguage/>
                <li class="dropdown">
                    <nuxt-link to="/page/user-panel/user-favourites">
                        <Icon name="material-symbols:favorite-outline" style="font-size:18px" />
                    </nuxt-link>
                </li>
                <li class="dropdown currency">
                    <a href="javascript:void(0)" @click.prevent="currency()">
                        <Icon name="ph:currency-dollar-bold" style="font-size:18px" />
                    </a>
                    <ul class="nav-submenu" :class="showing">
                        <li><a href="javascript:void(0)">Dollar</a></li>
                        <li><a href="javascript:void(0)">Euro</a></li>
                        <li><a href="javascript:void(0)">Pound</a></li>
                        <li><a href="javascript:void(0)">Yuan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <nuxt-link to="/page/otherpages/login">
                        <Icon name="ri:user-3-line" style="font-size:18px" />
                    </nuxt-link>
                </li>
            </ul>
        </li>
    </ul>
</template>

<script setup>
let show = ref(false);
let showing = ref('');

function currency() {
    show.value = !show.value
    if (show.value) {
        showing.value = 'open'
    } else {
        showing.value = ''
    }
}
</script>

<style lang="scss" scoped></style>
