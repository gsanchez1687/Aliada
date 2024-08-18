import Rent from '~/static/data/types/letestforrent';
interface FilterObject{
    propertyStatus: string,
    propertyType: string,
    rooms:string,
    bed:string,
    bath:string,
    agencies:string,
}
export const useSidebarfilterStore = defineStore('filter',() => {
        const alllistdata = ref<any>([])
    const filterobject = ref<FilterObject>({
        propertyStatus: '',
        propertyType: '',
        rooms:'',
        bed:'',
        bath:'',
        agencies:'',
    })
    let route = useRoute();
    let type = ref<string>('')
    let pricename = ref<string>('')
    let price = ref<number[]>([])
    let area = ref<number[]>([])
    let propertyType = ref<string>('')
    const listingdata = ref<any>([])
    const alldata = ref<any>([])
    function setfilter(){
        let key = Object.keys(route.query).map(val => val)        
        key.forEach(ele => {
           if(route.query[ele] != ''){
                alllistdata.value = alldata.value.filter((item) => item[ele] == route.query[ele]) 
           }
           
        })
    }
    function rentdata(){
         alllistdata.value = alldata.value.filter((item) => item.type == 'rent')
    }
    function saledata(){    
        alllistdata.value = alldata.value.filter((item) => item.type == 'sale')
    }
    function allproperty(){
         alllistdata.value = alldata.value
    }
    function filterdata(){
        let key:string[] = Object.keys(route.query).map(val => val)        
        key.forEach(ele => {
           if(route.query[ele] != '' && route.query[ele] != route.query.price){
                alllistdata.value = alldata.value.filter((item:Rent) => item[ele] == route.query[ele]) 
           }
          
        })
     
    }
    function mapfilterdata(){
        let key = Object.keys(route.query).map(val => val)        
        key.forEach(ele => {
           if(route.query[ele] != ''){
                alllistdata.value = alldata.value.filter((item) => item[ele] == route.query[ele]) 
           }
        })
    }
    function filtercategory(value:string){
        propertyType.value = value
        alllistdata.value = alldata.value.filter((item) => item.propertyType == value)
    }
    function newtoolddata(value:string){
        alllistdata.value = alldata.value.sort((a , b) => {
            if(value == 'Sort by price (Low to high)'){
                return b.price < a.price ? -1 : 1
            }
            else if(value == 'Sort by Newest'){
                let date1 = new Date(a.date);
                let date2 = new Date(b.date);
                return date2?.getTime() < date1.getTime() ? -1 : 1;
            }
            else if (value == 'Sort by Oldest') {
                let date1 = new Date(a.date);
                let date2 = new Date(b.date);
                return date2?.getTime() > date1.getTime() ? -1 : 1;
            }
            else {
                return b.price !== a.price ? 1 : 1;
            }
        })
    }
    function filterprice(value:string[]){
        pricename.value = 'price'
        alllistdata.value = alldata.value.filter((item) => item.price >= value[0] && item.price <= value[1])
       
    }
    function filterarea(value:number[]){
        pricename.value = 'area'
        alllistdata.value = alldata.value.filter((item) => item.sqft >= value[0] && item.sqft <= value[1])
     }
    function setstatus(value:string){
        if(value == 'Property Status'){
            filterobject.value.propertyStatus = ''
        }
        else{
            filterobject.value.propertyStatus = value
        }
    }
    function gettype(value:string){
       filterobject.value.propertyType = value
    }
    function getrooms(value:string){
        filterobject.value.rooms = value
    }
    function getbed(value:string){
        filterobject.value.bed = value
    }
    function getbath(value:string){
        filterobject.value.bath = value
    }
    function getagency(value:string){
        filterobject.value.agencies = value
    }
    async function getdata(value:any){
        
        alllistdata.value = value;
        alldata.value = value
    }
    function compare(value:Rent[]){
       
        localStorage.setItem('campare' , JSON.stringify(value))
    }
    function wishlist(value:Rent[]){        
        localStorage.setItem('wishlist' , JSON.stringify(value))
    }
    function getprice(value:number[]){
        price.value = value
    }
    return{
        alldata,
        filterobject,
        setstatus,
        gettype,
        getrooms,
        alllistdata,
        getdata,
        filterdata,
        listingdata,
        getbed,
        getbath,
        getagency, 
        filterprice,
        filterarea,
        filtercategory,
        price,
        pricename,
        area,
        setfilter,
        type,
        newtoolddata,
        mapfilterdata,
        rentdata,
        saledata,
        allproperty,
        compare,
        getprice,
        wishlist
    }
})