export interface comment{
    src:string,
    username:string,
    date:string,
    detail:string,
    children:child[]
}
interface child{
    src:string,
    username:string,
    date:string,
    detail:string,
}