import { defineNuxtPlugin } from "#app";
export default defineNuxtPlugin(() => {
  const { isAuthenticated } = useSanctumAuth();
  
  const route = useRoute();
  
  if (isAuthenticated.value && route.fullPath =="/login" ) {
    window.location.href = "/";
  }

  if(!isAuthenticated.value && ( route.fullPath !="/login" && route.fullPath != "/signup" ) ){
    window.location.href = "/login";
  }
   
});
