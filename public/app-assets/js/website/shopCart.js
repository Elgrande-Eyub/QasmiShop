$(document).ready(function() {
    csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('#proceedToCheckout').on('click', function() {
        // Get the IDs of the selected products
        var selectedProducts = [];

        $('input[name="selectedProduct[]"]:checked').each(function() {
            var productId = $(this).val();
            var index = $(this).attr('id').replace('selectedProduct', '');
            var size = $('.size').eq(index).text();
            var quantity = $('.quantity').eq(index).text();

            var product = {
                productId: productId,
                size: size,
                quantity: quantity
            };

            selectedProducts.push(product);
        });
    });

    $('.updateQte').on('click', function(e) {

        e.preventDefault();
        var row = $(this).closest('tr');
        var quantityElement = row.find('.qty-val');
        var currentQuantity = parseInt(quantityElement.text());
        var role = $('#userRole').data('role');
        var itemId = $(this).data('cart-id');
        if (role === '') {
            var itemId = $(this).data('item-id');
        }

        if ($(this).hasClass('qty-up')) {
            currentQuantity += 1;
        } else {
            currentQuantity -= 1;
        }

        var productId = row.find('input[name="selectedProduct[]"]').val();
        updateQuantity(itemId, productId, currentQuantity);
        quantityElement.text(currentQuantity);
        var comparedPrice = parseFloat(row.find('.comparedPrice').text());
        var newTotal = currentQuantity;
        var totalSingle = comparedPrice * newTotal;
        var formattedTotalSingle = totalSingle.toFixed(2);
        row.find('.totalSingle').text(formattedTotalSingle + ' DHs');
    });

    function updateQuantity(cartId, productId, quantity) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/updateQuantity',
            type: 'POST',
            data: {
                productId: productId,
                quantity: quantity,
                cartId: cartId
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                console.log(response);

            },

        });
    }

    $('.delete-cart').on('click', function(e) {
        e.preventDefault();

        var role = $('#userRole').data('role');
        var itemId = 0;
        var itemId = $(this).data('cart-id');
        if (role === '') {
            var itemId = $(this).data('item-id');
        }

        $.ajax({
            url: '/deleteCart/' + itemId,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                location.reload();
            },
        });
    });

    function generateRandomString(length) {
        const charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let randomString = '';
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            randomString += charset[randomIndex];
        }
        return randomString;
    }

    // Function to redirect to another page with the random string
    function redirectToAnotherPage() {
        const destinationUrl = '/checkoutSession?' + generateRandomString(20) + '=' + generateRandomString(10);
        window.location.href = destinationUrl;
    }


    $('#proceedToCheckout').on('click', function() {

        let cartProducts = [];

        $('tr[data-cart-id]').each(function() {
            let cartId = $(this).data('cart-id');
            let productId = $(this).find('input[name="selectedProduct[]"]').val();
            let productName = $(this).find('.nameProduct').text().trim();
            let size = $(this).find('.size').text().trim();
            let variation = $(this).find('.size').data('variation-id');
            let price = $(this).find('.comparedPrice').text().trim();
            let quantity = $(this).find('.quantity').text().trim();

            cartProducts.push({
                cartID: cartId,
                productID: productId,
                productName: productName,
                size: size,
                variation: variation,
                price: price,
                quantity: quantity
            });
        });


        $.ajax({
            url: '/checkoutSession',
            type: 'POST',
            data: {
                cartProducts
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                redirectToAnotherPage();
            },
        });

    });


});