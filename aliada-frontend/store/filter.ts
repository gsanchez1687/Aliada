import filteroption from '~/static/data/filteroption.json';
export const useFiltersStore = defineStore('filter-store',{    
    state: () => {
        return{
            data:filteroption.data
        }
    }
})