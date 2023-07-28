$(document).ready(function() {
    var variationDiv = $(".contentPV").first().clone();

    $('input[name="varaitionButton"]').on('click', function() {
        if ($(this).is(':checked')) {
            $('button[name="addVariation"]').prop('disabled', false);

        } else {
            $('button[name="addVariation"]').prop('disabled', true);

            $('.productVariation').empty();
            var emptyVariationDiv = variationDiv.clone();
            emptyVariationDiv.find(".price, .discount").on("input", calculatePrice); // Attach event listener to price and discount inputs
            $('.productVariation').append(emptyVariationDiv);
        }
    });

    $('button[name="addVariation"]').on('click', function() {
        var emptyVariationDiv = variationDiv.clone();
        emptyVariationDiv.find(".price, .discount").on("input", calculatePrice); // Attach event listener to price and discount inputs
        $('.productVariation').append(emptyVariationDiv);
    });

    $(".productVariation").on("input", ".price, .discount", calculatePrice);

    function calculatePrice() {
        var variationDiv = $(this).closest('.contentPV');
        var price = parseFloat(variationDiv.find('.price').val());
        var sold = parseFloat(variationDiv.find('.discount').val());

        // Check if both inputs have valid numbers
        if (!isNaN(price) && !isNaN(sold)) {
            // Check if sold is within the range of 0-100
            if (sold >= 0 && sold <= 100) {
                var discount = price * (sold / 100);
                var newPrice = price - discount;
                variationDiv.find('.priceDiscounted').val(newPrice.toFixed(2));
            }
        } else {
            variationDiv.find('.priceDiscounted').val(0);
        }
    }

    $('#submitForm').on('click', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        var form = $('#formData')[0]; // Select the form element
        var formData = new FormData(form); // Create a FormData object to store form data

        // Retrieve the variation data and add it to the formData object
        var variations = [];
        $('.contentPV').each(function() {
            var variation = {
                size: $(this).find('select[name="size"]').val(),
                price: $(this).find('input[name="price"]').val(),
                solde: $(this).find('input[name="sold"]').val(),
                grossitePrice: $(this).find('input[name="grossitePrice"]').val(),
                stock: $(this).find('input[name="stock"]').val(),
                comparedPrice: $(this).find('input[name="comparedPrice"]').val(),
                minCommande: $(this).find('input[name="minCommande"]').val()
            };
            variations.push(variation);
        });

        // Add the variations array as a JSON string to the formData object
        formData.append('variations', JSON.stringify(variations));

        // Add the CSRF token to the formData object
        variations._token = $('meta[name="csrf-token"]').attr('content');

        // Append each selected image file to the formData object
        var imageFiles = $('.image')[0].files;
        for (var i = 0; i < imageFiles.length; i++) {
            formData.append('images[]', imageFiles[i]);
        }

        /* var variationStatus = 0;
        if ($('input[name="varaitionButton"]').is(':checked')) variationStatus = 0;

        formData.append('variation', variationStatus); */

        var variationStatus = $('input[name="varaitionButton"]').is(':checked') ? 1 : 0;
        formData.append('variationStatus', variationStatus);


        // Perform AJAX POST request to send form data
        $.ajax({
            url: "/admin/addproduit", // Replace with the actual form submission URL
            type: "POST", // Replace with the actual form submission method (e.g., 'POST')
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the content type
            success: function(response) {
                Swal.fire({
                    title: response.message,
                    type: "success",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                console.log(response);
            },
            error: function(xhr, status, error, response) {
                Swal.fire({
                    title: "Error!",
                    text: xhr.responseJSON.message,
                    type: "error",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        });
    });





});