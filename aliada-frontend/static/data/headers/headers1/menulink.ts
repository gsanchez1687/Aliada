 interface val {
    name?:string | undefined;
    path?:string;
    label?:string;
    icon?:string;
    children?:value[]
    section?:section[];
    section2?:section2[];
 }
 interface title{
    title:string;
    icon?:string
    magamenu?:boolean
    right?:boolean
    children:val[]
 }
 interface value{
    name:string;
    path?:string;
    children?:valueof[]
    icon?:string;
 }
 interface type{
    name?:string;
    path?:string;
    icon?:string;
 }
 
interface valueof{
    name:string;
    path:string;
    icon?:string
}
interface section{
    name:string;
    children?:vale[];
}
interface section2{
    name?:string;
    children:item[];
    
}
interface valueof{
    name:string;
   path:string;
   icon?:string

}
interface vale{
    name?:string;
    path?:string;
    label?:string
}
interface item{
    name:string;
    path:string;
    icon?:string;
}
 const navlink:title[] = [
    {
        title:'Aliada',
        magamenu:false,
        right:true,
        icon:"akar-icons:location",
        children:[
            {
                name:'Inicio',
                path:'/',
            },
            {
                name:'Quiénes Somos',
                path:'/',
            },
        ]
    },
    {
        title:'Propiedades',
        icon:"ph:clipboard-light",
        magamenu:false,
        right:false,
        children:[
            {
                /*name:'Todas las propiedades',
                path:'/listing/all-properties',*/
                /*
                children:[
                    {
                        name:'2 Grid',
                        children:[
                            {
                                name:'Left Sidebar',
                                path:'/listing/grid_view/2_grid_view/left-sidebar'
                            },
                            {
                                name:'Right Sidebar',
                                path:'/listing/grid_view/2_grid_view/right-sidebar'
                            },
                            {
                                name:'No Sidebar',
                                path:'/listing/grid_view/2_grid_view/no-sidebar'
                            }
                        ]
                    },
                    {
                        name:'3 Grid',
                        children:[
                            {
                                name:'Left Sidebar',
                                path:'/listing/grid_view/3_grid_view/left-sidebar'
                            },
                            {
                                name:'Right Sidebar',
                                path:'/listing/grid_view/3_grid_view/right-sidebar'
                            },
                            {
                                name:'No Sidebar',
                                path:'/listing/grid_view/3_grid_view/nosidebar'
                            }
                        ]
                    },
                    {
                        name:'Slider',
                        path:'/listing/grid_view/slider'
                    },
                    {
                        name: 'Map',
                        children:[
                            {
                                name:'Google Map',
                                path:'/listing/grid_view/map/googlemap',
                            },
                            {
                                name:'leaflet Map',
                                path:'/listing/grid_view/map/leafletmap',
                            },
                        ]
                    },
                    {
                        name:'Map Model',
                        children:[
                            {
                                name:'Google Map',
                                path:'/listing/grid_view/mapmodel/googlemapmodel',
                            },
                            {
                                name:'leaflet Map',
                                path:'/listing/grid_view/mapmodel/leafletmapmodel',
                            },
                        ]
                    },
                    {
                        name:'Left Side Map',
                        children:[
                            {
                                name:'Google Map',
                                path:'/listing/grid_view/leftsidemap/googlemap',
                            },
                            {
                                name:'leaflet Map',
                                path:'/listing/grid_view/leftsidemap/leafletmap',
                            },
                        ]
                    },
                    {
                        name:'Onclick Map',
                        children:[
                            {
                                name:'Google Map',
                                path:'/listing/grid_view/onclickmap/googlemap',
                            },
                            {
                                name:'leaflet Map',
                                path:'/listing/grid_view/onclickmap/leaflet',
                            },
                        ]
                    },
                    {
                        name:'Map Header',
                        children:[
                            {
                                name:'Google Map',
                                path:'/listing/grid_view/mapheader/googlemap',
                            },
                            {
                                name:'leaflet Map',
                                path:'/listing/grid_view/mapheader/leafletmap',
                            },
                        ]
                    }

                ]
                */
            },
            /* {
                name:'En venta',
                path:'/listing/tablayout/tableftsidebar',
            },
            {
                name:'En renta',
                path:'/listing/tablayout/tableftsidebar',
            }, */
            {
                name:'Mapa de propiedades',
                path:'/listing/list_view/map/map-properties',
            },
            /*
            {
                name:'List view',
                children:[
                    {
                        name:'Listing',
                        children:[
                            {
                                name:'Left Sidebar',
                                path:'/listing/list_view/listing/leftsidebar'
                            },
                            {
                                name:'Right Sidebar',
                                path:'/listing/list_view/listing/rightsidebar'
                            },
                            {
                                name:'No Sidebar',
                                path:'/listing/list_view/listing/nosidebar'
                            }
                        ]
                    },
                    {
                        name:'Map',
                        children:[
                            {
                                name:'Google Map',
                                path:'/listing/list_view/map/googlemap',
                            },
                            {
                                name:'leaflet Map',
                                path:'/listing/list_view/map/leafletmap',
                            },
                        ]
                    },
                    {
                        name:'Slider',
                        path:'/listing/list_view/slider',            
                    },
                    {
                        name: 'Thumbnail Image',
                        path:'/listing/list_view/thumbnailimage'
                    },
                    {
                        name:'video',
                        path:'/listing/list_view/video'
                    }
                ]
            },
            {
                name:'Tab Layout',
                children:[
                    {
                        name:'Tab Full Width',
                        path:'/listing/tablayout/tablayout'
                    },
                    {
                        name:'Tab Left Sidebar',
                        path:'/listing/tablayout/tableftsidebar'
                    },
                    {
                        name:'Tab right sidebar',
                        path:'/listing/tablayout/tabrightsidebar'
                    },
                ]
            }
            */
        ]
    },
    /*
    {
        title:'Property',
        magamenu:false,
        right:false,
        icon:"material-symbols:link-rounded",
        children:[
            {
                name:'Sticky Tab Or Classic',
                path:'/property/single-property-1'
            },
            {
                name:'360 view',
                path:'/property/single-property-2'
            },
            {
                name:'Without Top',
                path:'/property/single-property-3'
            },
            {
                name:'Left Sidebar',
                path:'/property/single-property-4'
            },
            {
                name:'Info Tab',
                path:'/property/single-property-5'
            },
            {
                name:'Image Sidebar',
                path:'/property/single-property-6'
            },
            {
                name:'Thumbnail Image',
                path:'/property/single-property-7'
            },
            {
                name:'Image Box',
                path:'/property/single-property-8'
            },
            {
                name:'Template breadcrumb',
                path:'/property/single-property-9'
            },
            {
                name:'model detail',
                path:'/property/single-property-10',
                icon:'bx:bxs-bolt'
                
            },
        ]
    },
    {
        title:'Page',
        magamenu:true,
        right:false,
        icon:"teenyicons:layers-outline",
        children:[
            {
                name:'portfolio',
                children:[
                    {
                        name:'2 Grid',
                        path:'/page/portfolio/2-grid'
                    },
                    {
                        name:'3 Grid',
                        path:'/page/portfolio/3-grid'
                    },
                    {
                        name:'4 grid',
                        path:'/page/portfolio/4-grid'
                    },
                    {
                        name:'2 grid title',
                        path:'/page/portfolio/2-grid-title'
                    },
                    {
                        name:'3 grid title',
                        path:'/page/portfolio/3-grid-title'
                    },
                    {
                        name:'4 grid title',
                        path:'/page/portfolio/4-grid-title'
                    },
                    {
                        name:'3 Masonry',
                        path:'/page/portfolio/3-masonry'
                    },
                    {
                        name:'4 Masonry',
                        path:'/page/portfolio/4-masonery'
                    },
                    {
                        name:'parallax',
                        path:'/page/portfolio/parallax'
                    },
                    {
                        name:'Center Slides',
                        path:'/page/portfolio/center-slide'
                    },
                    {
                        name:'Creative 1',
                        path:'/page/portfolio/creative1'
                    },
                    {
                        name:'Creative 2',
                        path:'/page/portfolio/creative2'
                    },
                    {
                        name:'Creative 3',
                        path:'/page/portfolio/creative3',
                        icon:'bx:bxs-bolt'
                    },
                    {
                        name:'Creative 4',
                        path:'/page/portfolio/creative4'
                    },
                    {
                        name:'Details',
                        path:'/page/portfolio/details'
                    },
                ]
            },
            {
                name:'Blog Page',
                children:[
                    {
                        name:'Left Sidebar',
                        path:'/page/blog_page/left-sidebar'
                    },
                    {
                        name:'Right Sidebar',
                        path:'/page/blog_page/right-sidebar'
                    },
                    {
                        name:'No Sidebar',
                        path:'/page/blog_page/no-sidebar'
                    },
                    {
                        name:'Creative Left Sidebar',
                        path:'/page/blog_page/creative-left-sidebar'
                    },
                    {
                        name:'Creative Right Sidebar',
                        path:'/page/blog_page/creative-right-sidebar'
                    },
                    {
                        name:'Creative No Sidebar',
                        path:'/page/blog_page/creative-no-sidebar'
                    },
                    {
                        name:'List Left Sidebar',
                        path:'/page/blog_page/blog-list-left-sidebar'
                    },
                    {
                        name:'List Right Sidebar',
                        path:'/page/blog_page/blog-list-right-sidebar'
                    },
                    {
                        name:'List No Sidebar',
                        path:'/page/blog_page/blog-list-no-sidebar'
                    },
                    {
                        name:'Masonry Left Sidebar',
                        path:'/page/blog_page/masonry-left-sidebar'
                    },
                    {
                        name:'Masonry right Sidebar',
                        path:'/page/blog_page/masonry-right-sidebar'
                    },
                    {
                        name:'Masonry No Sidebar',
                        path:'/page/blog_page/masonry-no-sidebar'
                    },
                    {
                        name:'Mix List Left Sidebar',
                        path:'/page/blog_page/mix-list-left-sidebar'
                    },
                    {
                        name:'Mix List Right Sidebar',
                        path:'/page/blog_page/mix-list-right-sidebar'
                    },
                    {
                        name:'Mix Grid Left Sidebar',
                        path:'/page/blog_page/mix-grid-left-sidebar'
                    },
                    {
                        name:'Mix Grid Right Sidebar',
                        path:'/page/blog_page/mix-grid-right-sidebar'
                    },
                ]
            },
            {
               section:[
                    {
                        name:'Blog Detail Pages',
                        children:[
                            {
                                name:'Left Sidebar',
                                path:'/page/blog_details/left-sidebar'
                            },
                            {
                                name:'Right Sidebar',
                                path:'/page/blog_details/right-sidebar'
                            },
                            {
                                name:'No Sidebar',
                                path:'/page/blog_details/no-sidebar'
                            },
                            {
                                name:'Detail with Image',
                                path:'/page/blog_details/gallery'
                            },
                            {
                                name:'Detail with Video',
                                path:'/page/blog_details/video'
                            },
                        ]
                    },
                    {
                        name:'Elements-Breadcrumb',
                        children:[
                            {
                                name:'Basic',
                                path:'/listing/grid_view/2_grid_view/left-sidebar'
                            },
                            {
                                name:'Image with Effect',
                                path:'/page/breadcrumb/image-with-effect',
                                label:'New'
                            },
                            {
                                name:'Right Content',
                                path:'/page/breadcrumb/right-content'
                            },
                            {
                                name:'Only Image',
                                path:'/property/single-property-1'
                            },
                            {
                                name:'Small',
                                path:'/listing/list_view/map/leafletmap'
                            },
                            {
                                name:'Gradient',
                                path:'/listing/list_view/map/googlemap'
                            },
                        ]
                    }
               ]
            },
            {
                section2:[
                    {
                        name:'Agency',
                        children:[
                            {
                                name:'Agency Profile',
                                path:'/page/agency/agency-profile'
                            },
                            {
                                name:'Agency Grid',
                                path:'/page/agency/agency-grid'
                            },
                            {
                                name:'Agency List',
                                path:'/page/agency/agency-list'
                            },
                        ]
                    },
                    {
                        name:'User Panel',
                        children:[
                            {
                                name:'User Dashboard',
                                path:'/page/user-panel/deshbord',
                                icon:'bx:bxs-bolt'
                            },
                            {
                                name:'My Listing',
                                path:'/page/user-panel/user-listing'
                            },
                            {
                                name:'Create Property',
                                path:'/page/user-panel/create-property',
                            },
                            {
                                name:'My Profile',
                                path:'/page/user-panel/user-profile'
                            },
                            {
                                name:'Favourites',
                                path:'/page/user-panel/user-favourites'
                            },
                            {
                                name:'Compare property',
                                path:'/page/user-panel/compare',
                            },
                            {
                                name:'Card & Payment',
                                path:'/page/user-panel/user-payment'
                            },
                            {
                                name:'Privacy',
                                path:'/page/user-panel/user-privacy'
                            }
                        ]
                    }
                ]
            },          
            {
                name:'Other Pages',
                children:[
                    {
                        name:'About Us 1',
                        path:'/page/otherpages/aboutus1'
                    },
                    {
                        name:'About Us 2',
                        path:'/page/otherpages/aboutus2'
                    },
                    {
                        name:'Services',
                        path:'/page/otherpages/services'
                    },
                    {
                        name:'Pricing',
                        path:'/page/otherpages/pricing'
                    },
                    {
                        name:'Coming Soon 1',
                        path:'/page/otherpages/coming-soon1'
                    },
                    {
                        name:'Coming Soon 2',
                        path:'/page/otherpages/coming-soon2'
                    },
                    {
                        name:'Coming Soon 3',
                        path:'/page/otherpages/coming-soon3'
                    },
                    {
                        name:'404',
                        path:'/page/otherpages/404'
                    },
                    {
                        name:'FAQ',
                        path:'/page/otherpages/faq'
                    },
                    {
                        name:'Log In',
                        path:'/page/otherpages/login'
                    },
                    {
                        name:'Sign Up',
                        path:'/page/otherpages/signup'
                    },
                    {
                        name:'Sign Up Wizard',
                        path:'/page/otherpages/signup-wizard',
                        icon:'bx:bxs-bolt'
                    },
                    {
                        name:'Forgot Password',
                        path:'/page/otherpages/forgot-password',
                    },
                    {
                        name:'Terms & Conditions',
                        path:'/page/otherpages/terms-condition',
                    },
                    {
                        name:'Privacy Policy',
                        path:'/page/otherpages/privacy-policy'
                    }
                ]
            }
        ]
    },
    {
        title: 'Modules',
        magamenu:false,
        right:true,
        icon:"octicon:zap-16",
        children:[
            {
                name : 'buttons',
                path: '/modules/button'
            },
            {
                name: 'label',
                path:'/modules/label',
            },
            {
                name:'title',
                path:'/modules/title'
            },
            {
                name:'image ratio',
                path:'/modules/image-ratio',
                icon:'bx:bxs-bolt'
            },
            {
                name:'Footer',
                path:'/modules/footer'
            },
            {
                name:'Blog',
                path:'/modules/blog',
            },
            {
                name:'Brand',
                path:'/modules/brand',
            },
            {
                name:'testimonial',
                path:'/modules/testimonials'
            },
            {
                name:'full banner',
                path:'/modules/banner',
            },
            {
                name:'About',
                path:'/modules/about',
            },
            {
                name:'service',
                path: '/modules/services',

            },
            {
                name:'proparty',
                path:'/modules/property'
            },
            {
                name:'feature',
                path:'/modules/feature'
            },
            {
                name:'others',
                path:'/modules/others'
            },
        ]
    },
    {
        title:'Agent',
        magamenu:false,
        right:true,
        icon:"mdi:account-outline",
        children:[
            {
                name:'agent profile',
                path:'/agent/agent-profile',
            },
            {
                name:'agent grid',
                path:'/agent/agent-grid',
            },
            {
                name:'agent list',
                path:'/agent/agent-list',
            },
            {
                name:'submit proparty',
                path:'/agent/submit-property',
                label:'New'
            },
        ]
    },
    */
    {
        title:'Ayuda',
        magamenu:false,
        right:true,
        icon:"akar-icons:location",
        children:[
            /*
            {
                name:'contect us 1',
                path:'/contact/contact-1',
            },
            */
            {
                name:'Contacto',
                path:'/contact/contact-2',
            },
            /*
            {
                name:'contect us 3',
                path:'/contact/contact-3',
            },
            */
        ]
    }
];

export default navlink
