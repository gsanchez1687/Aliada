interface val {
    name?:string;
    path?:string;
    label?:string;
    icon?:string;
    children?:value[]
    section?:section[];
    section2?:section2[];
 }
export interface title{
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
// export default title