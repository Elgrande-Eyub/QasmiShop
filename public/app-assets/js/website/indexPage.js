$(document).ready(function() {
    $('.addToCartButton').on('click', function(e) {
        e.preventDefault();

        // Get the product ID or any other required data
        var productId = $(this).data('product-id');
        var variationId = $(this).data('variation-id');

        // Make an Ajax POST request to the addItem route
        $.ajax({
            url: '/addCart',
            type: 'POST',
            data: {
                productId: productId,
                variationId: variationId
            },
            dataType: 'json',
            success: function(response) {
                Toast(response.message, true);
            },
            error: function(xhr, status, error) {
                // console.log('Error: ' + xhr.responseText);
            }
        });
    });


    function Toast($message, $isSucess) {

        var toast = $("#snackbar");

        toast.addClass("show");
        toast.text($message);

        if ($isSucess) {
            toast.addClass("success");
        } else {
            toast.addClass("error");
        }


        setTimeout(function() {
            toast.removeClass("show");
            toast.removeClass("success");
            toast.removeClass("error");
        }, 3000);

    }
});