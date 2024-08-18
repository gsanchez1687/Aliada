interface title{
   title:string,
   children:valu[]
   icon?:string;
}
interface valu{
    name:string,
    path:string,
    label?:string,
    icon?:string
}

const menulink2:title[] = [
    {
        title: 'MODULES',
        icon:"octicon:zap-16",
        children:[
            {
                name : 'buttons',
                path: '/'
            },
            {
                name: 'label',
                path:'/',
            },
            {
                name:'title',
                path:'/'
            },
            {
                name:'image ratio',
                path:'/',
                icon:'bx:bxs-bolt'
            },
            {
                name:'Footer',
                path:'/'
            },
            {
                name:'Blog',
                path:'/',
            },
            {
                name:'Brand',
                path:'/',
            },
            {
                name:'testimonial',
                path:'/'
            },
            {
                name:'full banner',
                path:'/',
            },
            {
                name:'About',
                path:'/',
            },
            {
                name:'service',
                path: '/',

            },
            {
                name:'proparty',
                path:'/'
            },
            {
                name:'feature',
                path:'/'
            },
            {
                name:'others',
                path:'/'
            },
        ]
    },
    {
        title:'AGENT',
        icon:"mdi:account-outline",
        children:[
            {
                name:'agent profile',
                path:'/',
            },
            {
                name:'agent grid',
                path:'/',
            },
            {
                name:'agent list',
                path:'/',
            },
            {
                name:'submit proparty',
                path:'/',
                label:'New'
            },
        ]
    },
    {
        title:'CONTACT',
        icon:"akar-icons:location",
        children:[
            {
                name:'contect us 1',
                path:'/',
            },
            {
                name:'contect us 2',
                path:'/',
            },
            {
                name:'contect us 3',
                path:'/',
            },
        ]
    }
];

export default menulink2;