interface color{
    primary:string;
    secondary:string
}
interface InitialValues {
    theme1:string 
    theme2:string
}
export const  usecustomizerStore= defineStore('customizer' , () => {
    const property = ref()
    let route = useRoute();
    function setcolor(color:color){
        if(route.path.search(/home/) == 1 ){
            document.documentElement.style.setProperty(property.value.theme1 , color.primary)
            document.documentElement.style.setProperty(property.value.theme2 , color.secondary)
        }
        else if(route.path == '/'){
            document.documentElement.style.setProperty('--theme-default8' , color.primary)
            document.documentElement.style.setProperty('--theme-default9' , color.secondary)
        }
        else{
            document.documentElement.style.setProperty('--theme-default3' , color.primary)
            document.documentElement.style.setProperty('--theme-default4' , color.secondary)
        }
    }
    function getproperty(value:InitialValues){
        property.value = value
        
    }
    return{
       
        setcolor,
        getproperty,
        property
    }
})