import Axios from "axios";
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
  getAllProperty(filter: Object, page: number) {

    const pricePropertyString =
      filter.priceProperty !== undefined && filter.priceProperty.length === 2
        ? `priceProperty[]=${filter.priceProperty[0]}&priceProperty[]=${filter.priceProperty[1]}`
        : "&priceProperty=undefined";

        const areaPropertyString =
        filter.areaProperty !== undefined && filter.areaProperty.length === 2
          ? `areaProperty[]=${filter.areaProperty[0]}&areaProperty[]=${filter.areaProperty[1]}`
          : "&areaProperty=undefined";
          
    return api.get(
      `/api/all-properties/${page}?typeProperty=${filter.typeProperty}&${pricePropertyString}&${areaPropertyString}&categoryProperty=${filter.categoryProperty}&roomsProperty=${filter.roomsProperty}&bathsProperty=${filter.bathsProperty}`
    );
  },
  getPropertyBySlug(slug: any) {
    return api.get(`/api/properties/${slug}`);
  },
  getHomePropertySales() {
    return api.get(`/api/properties/home/sales`);
  },
  getHomePropertyRent() {
    return api.get(`/api/properties/home/rent`);
  },
  getTypeProperties() {
    return api.get(`/api/type-properties`);
  },
};
