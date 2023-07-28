$(document).ready(function() {
    csrfToken = $('meta[name="csrf-token"]').attr('content');

    /* $('#confirmeCheckout').on('click', function() {
        // $('#storeCommande').submit();
        loginBtn.classList.add("loading");
        setTimeout(() => $('#storeCommande').submit(), 3000);
    }); */


    const loginBtn = document.getElementById("login-btn");
    loginBtn.addEventListener('click', () => {

        loginBtn.classList.add("loading");

        setTimeout(() => $('#storeCommande').submit(), 3000);
    });

    /* const loginBtn = $("#login-btn");

     loginBtn.on('click', function() {
         loginBtn.addClass("loading");

         setTimeout(function() {
             $('#storeCommande').submit();
         }, 3000);
     }); */
});