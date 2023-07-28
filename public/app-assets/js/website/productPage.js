$(document).ready(function() {

    $('.size-item').on('click', function(event) {
        event.preventDefault();

        var variationId = $(this).data('variation');

        $.ajax({
            url: '/getvariation/' + variationId,
            type: 'GET',
            data: { variationId: variationId },
            dataType: 'json',
            success: function(response) {

                var role = $('#userRole').data('role');

                if (role === 'professional') {
                    $('.comparedPrice').text(response.grossitePrice + 'Dhs');
                    $('.price').text("");
                    $('.Solde').text("");

                } else {

                    if (response.sold == 0) {

                        $('.comparedPrice').text(response.comparedPrice + 'Dhs');
                        $('.price').text("");
                        $('.Solde').text("");

                    } else {
                        $('.price').text(response.price + 'Dhs');
                        $('.Solde').text(response.sold + '% Solde');
                        $('.comparedPrice').text(response.comparedPrice + 'Dhs');

                    }

                    $('.comparedPrice').text(response.comparedPrice + 'Dhs');
                }

            }
        });
    });

    $('.size-item').on('click', function() {
        $('.size-item').removeClass('active');
        $(this).addClass('active');
    });
    $('#addToCart').on('click', function(e) {
        e.preventDefault();

        var selectedSize = $('.size-item.active');
        if (selectedSize.length === 0) {

            Toast('Veuillez sélectionner une taille avant d’ajouter au panier.', false);
            return;
        }

        var productId = $(this).data('product-id');
        var quantity = parseInt($('.qty-val').text());
        var variationId = selectedSize.data('variation');
        var variation_size = selectedSize.data('size');

        addToCart(productId, quantity, variationId, variation_size);

    });

    $('.size-item').on('click', function(e) {
        e.preventDefault();
        $('.size-item').removeClass('active');
        $(this).addClass('active');
    });

    function addToCart(productId, quantity, variationId, variation_size) {

        $.ajax({
            url: '/addCart',
            type: 'POST',
            data: {
                productId: productId,
                sizeId: variation_size,
                quantity: quantity,
                variationId: variationId
            },
            dataType: 'json',
            success: function(response) {


                Toast(response.message, true);

            },
            error: function(xhr, status, error) {

            }
        });
    }


    $(document).on('click', '.qty-up, .qty-down', function(e) {
        e.preventDefault();

        var quantityElement = $('.qty-val');
        var currentQuantity = parseInt(quantityElement.text());

        if ($(this).hasClass('qty-up')) {
            quantityElement.text(currentQuantity + 1);
        } else {
            // Decrement the quantity
            if (currentQuantity > 1) {
                quantityElement.text(currentQuantity - 1);
            }
        }
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