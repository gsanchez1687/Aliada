
export const  usepropertyStore= defineStore('property' , () => {
    let alldata = ref([])
    function getdata(data:any){
        alldata.value = data
        
    }
    return{
        alldata,
        getdata
    }
})