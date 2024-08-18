import Axios from "axios";
import path from "path";
const config = useRuntimeConfig();

const api = Axios.create({
  baseURL: config.public.baseURL,
  headers: {
    'X-Requested-With': 'XMLHttpRequest',
  },
  withCredentials: true,
  withXSRFToken: true,
})

export default {
  getAllProperty(page:number) {
    return api.get(`/api/all-properties/${page}`)
  },
  
  getTypology(idProperty : number ) {
    return api.get(`/api/property/typologies-by-id/${idProperty}`)
  },

  getPropertyBySlug(slug:string) {
    return api.get(`/api/properties/${slug}`)
  },

  getTypeProperty() {
    return api.get(`/api/type-properties`)
  },

  getCategories() {
    return api.get(`/api/categories`)
  },

  getStates() {
    return api.get(`api/states`)
  },

  getCitiesByIdState(idState : number ) {
    return api.get(`/api/municipalities/states-by-id/${idState}`)
  },

  getAmenities() {
    return api.get(`/api/amenities`)
  },

  getViews() {
    return api.get(`/api/views`)
  },

  saveProperty(formData: Object){
    return api.post(`/api/properties`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  getCategoryLabels(idCategory:number){
    return api.get(`/api/category-labels/${idCategory}`,);
  },

  getAllPropertyByIdUser(filter: Object, page: number) {

        const areaPropertyString =
        filter.areaProperty !== undefined && filter.areaProperty != null
          ? `areaProperty[]=0}&areaProperty[]=${filter.areaProperty}`
          : "&areaProperty=undefined";

    return api.get(
      `/api/properties/all-properties-by-user-id/${page}?typeProperty=${filter.typeProperty}&${areaPropertyString}&categoryProperty=${filter.categoryProperty}&roomsProperty=${filter.roomsProperty}&bathsProperty=${filter.bathsProperty}`
    );
  },

  deleteProperty(idProperty:number){
    return api.delete(`/api/properties/${idProperty}`,);
  },

 updateProperty(idProperty:number, data: Object){
    return api.post(`/api/properties/${idProperty}`, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  changeStatusProperty(idProperty:number, status: number){
    return api.post(`/api/properties/change-status-property/${idProperty}/${status}`);
  },

  getStatusProperty(idProperty:number){
    return api.get(`/api/properties/status-property/${idProperty}`);
  },

  getImage(url:string){
    return api.get(`/api/properties/image/get-image`, {
      params: {
        path: url
      },
      responseType: 'blob'
    });
  },

  createUser(formData: Object){
    if(formData.get('group_leader_id') == 1){
      this.createuseraliado(formData);
    }else if(formData.get('group_leader_id') == 2){
      this.createuserteamleader(formData);
    }else{
      return api.post(`/api/users`, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      });
    }
  },

  createuseraliado(formData: Object){
    return api.post(`/api/create-user-aliado`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  createuserteamleader(formData: Object){
    return api.post(`/api/create-user-team-leader`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  getAllUser(){
    return api.get(`/api/users/all-users`);
  },

  signup(formData: Object){
    return api.post(`/api/create-user-aliado`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  },

  getAliado(){
    return api.get(`/api/aliados`);
  },

}