interface val{
    title:String;
    children:type[];
    icon?:string;
}
interface type{
    name?:string;
    section?:value[];
    section2?:typof[];
    children?:valueof[];
}
interface valueof{
    name:string;
    path:string;
    icon?:string
}
interface value{
    name:string;
    children:vale[];
}
interface typof{
    name:string;
    children:item[];
    
}
interface valueof{
    name:string;
   path:string;
   icon?:string

}
interface vale{
    name?:string;
    path:string;
    label?:string
}
interface item{
    name:string;
    path:string;
    icon?:string;
}
const navpagelink:val[] = [
    {
        title:'PAGE',
        icon:"teenyicons:layers-outline",
        children:[
            {
                name:'portfolio',
                children:[
                    {
                        name:'2 Grid',
                        path:'/'
                    },
                    {
                        name:'3 Grid',
                        path:'/'
                    },
                    {
                        name:'4 grid',
                        path:'/'
                    },
                    {
                        name:'2 grid title',
                        path:'/'
                    },
                    {
                        name:'3 grid title',
                        path:'/'
                    },
                    {
                        name:'4 grid title',
                        path:'/'
                    },
                    {
                        name:'3 Masonry',
                        path:'/'
                    },
                    {
                        name:'4 Masonry',
                        path:'/'
                    },
                    {
                        name:'parallax',
                        path:'/'
                    },
                    {
                        name:'Center Slides',
                        path:'/'
                    },
                    {
                        name:'Creative 1',
                        path:'/'
                    },
                    {
                        name:'Creative 2',
                        path:'/'
                    },
                    {
                        name:'Creative 3',
                        path:'/',
                        icon:'bx:bxs-bolt'
                    },
                    {
                        name:'Creative 4',
                        path:'/'
                    },
                    {
                        name:'Details',
                        path:'/'
                    },
                ]
            },
            {
                name:'Blog Page',
                children:[
                    {
                        name:'Left Sidebar',
                        path:'/'
                    },
                    {
                        name:'Right Sidebar',
                        path:'/'
                    },
                    {
                        name:'No Sidebar',
                        path:'/'
                    },
                    {
                        name:'Creative Left Sidebar',
                        path:'/'
                    },
                    {
                        name:'Creative Right Sidebar',
                        path:'/'
                    },
                    {
                        name:'Creative No Sidebar',
                        path:'/'
                    },
                    {
                        name:'List Left Sidebar',
                        path:'/'
                    },
                    {
                        name:'List Right Sidebar',
                        path:'/'
                    },
                    {
                        name:'List No Sidebar',
                        path:'/'
                    },
                    {
                        name:'Masonry Left Sidebar',
                        path:'/'
                    },
                    {
                        name:'Masonry right Sidebar',
                        path:'/'
                    },
                    {
                        name:'Masonry No Sidebar',
                        path:'/'
                    },
                    {
                        name:'Mix List Left Sidebar',
                        path:'/'
                    },
                    {
                        name:'Mix List Right Sidebar',
                        path:'/'
                    },
                    {
                        name:'Mix Grid Left Sidebar',
                        path:'/'
                    },
                    {
                        name:'Mix Grid Right Sidebar',
                        path:'/'
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
                                path:'/'
                            },
                            {
                                name:'Right Sidebar',
                                path:'/'
                            },
                            {
                                name:'No Sidebar',
                                path:'/'
                            },
                            {
                                name:'Detail with Image',
                                path:'/'
                            },
                            {
                                name:'Detail with Video',
                                path:'/'
                            },
                        ]
                    },
                    {
                        name:'Elements-Breadcrumb',
                        children:[
                            {
                                name:'Basic',
                                path:'/'
                            },
                            {
                                name:'Image with Effect',
                                path:'/',
                                label:'New'
                            },
                            {
                                name:'Right Content',
                                path:'/'
                            },
                            {
                                name:'Only Image',
                                path:'/'
                            },
                            {
                                name:'Small',
                                path:'/'
                            },
                            {
                                name:'Gradient',
                                path:'/'
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
                                path:'/'
                            },
                            {
                                name:'Agency Grid',
                                path:'/'
                            },
                            {
                                name:'Agency List',
                                path:'/'
                            },
                        ]
                    },
                    {
                        name:'Email Tamplate',
                        children:[
                            {
                                name:'Offer',
                                path:'/'
                            },
                            {
                                name:'Confirmation',
                                path:'/'
                            },
                            {
                                name:'Thank You',
                                path:'/'
                            },
                        ]
                    },
                    {
                        name:'User Panel',
                        children:[
                            {
                                name:'User Dashboard',
                                path:'/',
                                icon:'bx:bxs-bolt'
                            },
                            {
                                name:'My Listing',
                                path:'/'
                            },
                            {
                                name:'Create Proparty',
                                path:'/',
                            },
                            {
                                name:'My Profile',
                                path:'/'
                            },
                            {
                                name:'Favourites',
                                path:'/'
                            },
                            {
                                name:'Compare proparty',
                                path:'/',
                            },
                            {
                                name:'Card & Payment',
                                path:'/'
                            },
                            {
                                name:'Privacy',
                                path:'/'
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
                        path:'/'
                    },
                    {
                        name:'About Us 2',
                        path:'/'
                    },
                    {
                        name:'Services',
                        path:'/'
                    },
                    {
                        name:'Pricing',
                        path:'/'
                    },
                    {
                        name:'Coming Soon 1',
                        path:'/'
                    },
                    {
                        name:'Coming Soon 2',
                        path:'/'
                    },
                    {
                        name:'Coming Soon 3',
                        path:'/'
                    },
                    {
                        name:'404',
                        path:'/'
                    },
                    {
                        name:'FAQ',
                        path:'/'
                    },
                    {
                        name:'Log In',
                        path:'/'
                    },
                    {
                        name:'Sign Up',
                        path:'/'
                    },
                    {
                        name:'Sign Up Wizard',
                        path:'/',
                        icon:'bx:bxs-bolt'
                    },
                    {
                        name:'Forgot Password',
                        path:'/',
                    },
                    {
                        name:'Terms & Conditions',
                        path:'/',
                    },
                    {
                        name:'Privacy Policy',
                        path:'/'
                    }
                ]
            }
        ]
    }
];

export default navpagelink;