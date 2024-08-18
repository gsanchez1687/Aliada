
import {offers} from '~/static/data/offer.json';
import offer from '~/static/data/types/offer';
export const useApiStore = defineStore('apistore' , () => {
    const alloffers = <offer[]>offers
 
    return{
        alloffers,
        
    }
})