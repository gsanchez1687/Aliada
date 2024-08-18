export interface agency{
    title:string,
    subtitle:string,
    media: body[]
}
interface body{
    name?:string,
    body?:string,
    type?:string
}