import Swal from "sweetalert2";
export const usewizaredStore = defineStore('wizard' , () => {
    const name = ref<string>('')
    const phone = ref<string>('')
    const email = ref<string>('')
    const password = ref<string>('')
    const address = ref<string>('')
    const city = ref<string>('')
    const state = ref<string>('')
    const country = ref<string>('')
    const pincode = ref<string>('')
    function submit(){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success ms-1',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Are you sure you want to submit the form?',
            text: "please confirm the details!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              swalWithBootstrapButtons.fire(
                
                'Your file has been Submitted.',
                'success'
              )
              setTimeout(() => {
                location.reload()
              }, 2000);
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
        })
    }
    return{
        name,
        phone,
        email,
        password,
        address,
        city,
        state,
        country,
        pincode,
        submit
    }
})