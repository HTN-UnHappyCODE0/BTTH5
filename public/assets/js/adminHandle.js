// Auto Close Alert
var alertSuccess = document.querySelector('.alert-success')
var alertDanger = document.querySelector('.alert-danger')
// console.log(alertSuccess);
if(alertSuccess){
    setTimeout(function(){
       alertSuccess.remove();
    }, 2500)
}

if(alertDanger){
    setTimeout(function(){
        alertDanger.remove();
    },3000)
}
// End Auto Close Alert

//Filter Role As User
var filterBy = document.querySelector('#filter-by');
// console.log(roleAsFilter);
if(filterBy){
    filterBy.addEventListener('change', function(e){
        // console.log(typeof(e.target.value));
        this.form.submit();
    });
}
//End Filter Role As User

