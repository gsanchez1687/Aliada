export interface agent {
  src: string;
  label: string;
  icon: icon[];
  span: string;
  name: string;
  detail: string;
  content: content[]
}
interface icon {
  to: string;
  img: string;
}
interface content {
  icon?: string;
  contact?: string;
  contact1?: string;
  labels?: string;
  labels2?: string;
  content?:string
}