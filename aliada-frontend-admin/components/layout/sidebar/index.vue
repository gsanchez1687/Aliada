<template>

        <div class="page-sidebar" id="sidebar">
            <div class="logo-wrap">
                <nuxt-link href="/">
                    <img src="/image/logo/aliada-realestate-color-logo.png" class="img-fluid for-light" alt="">
                    <img src="/image/logo/aliada-realestate-white-logo.png" class="img-fluid for-dark" alt="">
                </nuxt-link>
                <div class="back-btn d-lg-none d-inline-block" @click="removesidebar()">
                   <Icon name="mdi:chevron-double-left" class="fs-3" />
                </div>
            </div>
            <div class="main-sidebar">
                <div class="user-profile">
                    <div class="media">
                        <div class="change-pic">
                            <img src="/image/avatar/Rafa.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="media-body">
                            <nuxt-link to="/users/profile"><h6>Admin user</h6></nuxt-link>
                            <span class="font-roboto">info@aliadarealestate.com</span>
                        </div>
                    </div>
                </div>
                <div id="mainsidebar">
                    <ul class="sidebar-menu custom-scrollbar">
                        <li class="sidebar-item" v-for="(item , index) in alldata" :key="index">
                            <nuxt-link :to="item.link?item.link:'javascript:void(0)'" class="sidebar-link" :class="[item.link?'only-link':'' , item.title == activemenu && active?'active':'' || item.link == route.path?'active':'']" @click="getactivevalue(item.title)">
                               <Icon :name="item.icon" class="fs-3"/>
                                <span>{{ item.title }}</span>
                                <div class="according-menu" v-if="item.children"><i class="fa fa-angle-right"></i></div>
                            </nuxt-link>
                            <ul class="nav-submenu menu-content" v-if="item.children" :class="item.title == activemenu && active?'d-block':'d-none'">
                                <li v-for="(child , index) in item.children" :key="index">
                                    <nuxt-link :to="child.link" :class="child.link == route.path?'active':''">
                                        <Icon :name="child.icon"/>
                                        {{ child.title }}<span class="label label-shadow ms-2" v-if="child.label">{{ child.label }}</span>
                                    </nuxt-link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="upgrade-box">
                                <br>
                                <!--<img src="/image/svg/1.svg" class="img-fluid" alt="">-->
                                <h6>¿Necesitas ayuda?</h6>
                                <a href="mailto:soporte@aliadarealestate.com" target="_blank" class="p-0 m-0">
                                    <span class="d-block">Contáctanos a "soporte@aliadarealestate.com"</span></a>
                                
                                <button type="button" onclick=" window.open('mailto:soporte@aliadarealestate.com', '_blank');" class="btn btn-pill btn-gradient color-4 btn-sm mt-2 fw-bold">Contactar ahora</button>
                                <br>
                                <br>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> 
        </div>
</template>

<script setup lang="ts">
/*
import { baseUrl } from "@/composable/apiurl";
interface sidebar{
    link?:string;
    icon:string;
    title:string;
    collapse:boolean;
    children?:children[]
}
interface children{
    link:string;
    title:string;
    icon:string;
    label?:string;
}
const route = useRoute();
const {data} = await useFetch(baseUrl+'/data/sidebar.json')
const alldata:sidebar[] = data.value.sidebar
let activemenu = ref<string>('')
let active = ref<boolean>(false)
function getactivevalue(value:string) {
    active.value = !active.value
    activemenu.value = value
}
onMounted(() => {
    alldata.filter(menuItem => {
        menuItem.children?.filter(subItem =>{
            if (route.path === subItem.link){
                activemenu.value=menuItem.title
                active.value = true
            }
        })
    })
})
function removesidebar(){
    document.getElementById('main-page')?.classList.add('close_icon')
    document.getElementById('sidebar')?.classList.add('close_icon')
}*/

import { ref } from 'vue';

interface SidebarItem {
    link?: string;
    icon: string;
    title: string;
    collapse: boolean;
    active: boolean;
    children?: SidebarItem[];
}

const route = useRoute();

// Complete hardcoded sidebar data
const alldata: SidebarItem[] = ref([
    {
        link: "/",
        icon: "material-symbols:airplay-outline",
        title: "Inicio",
        collapse: false,
        active: false
    },
    {
        icon: "bi:grid",
        title: "Mis propiedades",
        collapse: true,
        active: false,
        children: [
            {
                link: "/my-properties/add-property",
                title: "Agregar propiedad",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "/my-properties/property-list",
                title: "Listado de propiedades",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "/my-properties/myproperties",
                title: "Mis Propiedades",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "/my-properties/Propertiesmyteam",
                title: "Propiedades de mi equipo",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
        ]
    }
    ,
    {
        icon: "lucide:users",
        title: "Usuarios",
        collapse: true,
        active: false,
        children: [
            /* {
                link: "/users/profile",
                title: "Perfil",
                icon: "material-symbols:keyboard-double-arrow-right"
            }, */
            {
                link: "/users/adduser",
                title: "Agregar usuario",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            /* {
                link: "/users/adduserwizard",
                title: "Agregar usuario - v2",
                icon: "material-symbols:keyboard-double-arrow-right",
                label: "new"
            }, */
            /* {
                link: "/users/edituser",
                title: "Editar usuario",
                icon: "material-symbols:keyboard-double-arrow-right"
            }, */
            {
                link: "/users/allusers",
                title: "Todos los usuarios",
                icon: "material-symbols:keyboard-double-arrow-right"
            }
        ]
    },
    {
        icon: "ic:baseline-person-add-alt",
        title: "Equipo y Aliados",
        collapse: true,
        active: false,
        children: [
            /* {
                link: "/agent/agentprofile",
                title: "Mi perfil",
                icon: "material-symbols:keyboard-double-arrow-right"
            }, */
            {
                link: "/agent/addagent",
                title: "Agregar Aliado (Solo ve team leader)",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            /* {
                link: "/agent/addagentwizard",
                title: "Add agent wizard",
                icon: "material-symbols:keyboard-double-arrow-right",
                label: "new"
            }, */
            /* {
                link: "/agent/editagent",
                title: "Edit agent",
                icon: "material-symbols:keyboard-double-arrow-right"
            }, */
            {
                link: "/agent/allagent",
                title: "Listado de Aliados (solo ve team leader)",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "/agent/allagent",
                title: "Listado de Team Leaders (solo ve Mentor)",
                icon: "material-symbols:keyboard-double-arrow-right"
            }/* ,
            {
                link: "/agent/invoice",
                title: "Invoice",
                icon: "material-symbols:keyboard-double-arrow-right"
            } */
        ]
    },
    {
        link: "/map",
        icon: "material-symbols:location-on-outline-rounded",
        title: "Mapa de Propiedades",
        collapse: false,
        active: false
    },
    {
        link: "/report",
        icon: "ri:bar-chart-line",
        title: "Reportes",
        collapse: false,
        active: false,
        children: [
            {
                link: "",
                title: "Cargar reporte (lo ve aliado, team leader y mentor)",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "",
                title: "Mis reportes (lo ve aliado, team leader y mentor)",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "",
                title: "Listado de reportes (lo ve admin)",
                icon: "material-symbols:keyboard-double-arrow-right"
            }
        ]
    },
    {
        icon: "bi:flag",
        title: "Metas",
        collapse: true,
        active: false,
        children: [
            {
                link: "",
                title: "Mis metas",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "",
                title: "Metas de mi equipo",
                icon: "material-symbols:keyboard-double-arrow-right"
            }
        ]
    }
    ,
    {
        icon: "bi:flag",
        title: "Training",
        collapse: true,
        active: false,
        children: [
            {
                link: "",
                title: "Crear curso (ve Admin)",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "",
                title: "Mis cursos (ve aliado, team leader, mentor)",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "",
                title: "Listado de cursos (Ve admin)",
                icon: "material-symbols:keyboard-double-arrow-right"
            }
        ]
    }
    ,
    {
        link: "/payment",
        icon: "ph:credit-card",
        title: "Comisiones",
        collapse: false,
        active: false
    },
    {
        icon: "bi:flag",
        title: "Marketing",
        collapse: true,
        active: false,
        children: [
            {
                link: "",
                title: "Tarjeta de presentación",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "",
                title: "Firma de email",
                icon: "material-symbols:keyboard-double-arrow-right"
            }
        ]
    }
    
    /* ,
    {
        icon: "gg:lock-unlock",
        title: "Seguridad",
        collapse: true,
        active: false,
        children: [
            {
                link: "/Authentication/login",
                title: "Log in",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "/Authentication/signup",
                title: "sign up",
                icon: "material-symbols:keyboard-double-arrow-right"
            },
            {
                link: "/Authentication/404",
                title: "404",
                icon: "material-symbols:keyboard-double-arrow-right"
            }
        ]
    } */
]);

let activemenu = ref<string>('');
let active = ref<boolean>(false);

function getactivevalue(value: string) {
    active.value = !active.value;
    activemenu.value = value;
}

onMounted(() => {
    alldata.value.filter(menuItem => {
        menuItem.children?.filter(subItem =>{
            if (route.path === subItem.link){
                activemenu.value = menuItem.title;
                active.value = true;
            }
        })
    })
});

function removesidebar(){
    document.getElementById('main-page')?.classList.add('close_icon');
    document.getElementById('sidebar')?.classList.add('close_icon');
}

</script>
