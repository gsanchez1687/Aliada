 export interface rent {
  id: string;
  img: string[];
  propertyStatus: string;
  label: string[];
  country: string;
  title: string;
  price: string;
  home:string;
  details: string;
  bed: number;
  bath: number;
  sqft: number;
  rooms: number;
  date: string;
  rent: boolean;
  sale: boolean;
  propertyType: string;
  agencies: string;
  video?:string;
  type?:string;
}

export default rent;