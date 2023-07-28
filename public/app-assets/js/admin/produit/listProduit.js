$(document).ready(function() {
    csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('.delete-produit').on('click', function() {

        var produitId = $(this).data('record-id');

        // Show the SweetAlert modal for confirmation
        Swal.fire({
            title: 'tu es sûr ?',
            text: "Vous ne pourrez pas revenir en arrière !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimez-le !',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            cancelButtonText: 'Annuler',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {


                $.ajax({
                    url: 'deleteproduit/' + produitId,
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    dataType: 'json',
                    success: function(response) {


                        if (response.status === 200) {
                            Swal.fire({
                                title: "supprimée!",
                                text: response.message,
                                type: "success",
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Erreur!",
                                text: response.message,
                                type: "error",
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,
                            });
                        }
                    }
                });

            }
        })

    });

    $('.isPublic').on('click', function() {

        var produitId = $(this).data('record-id');


        $.ajax({
            url: 'produits/public/' + produitId,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function(response) {


                if (response.status === 200) {
                    Swal.fire({
                        title: "Activée!",
                        text: response.message,
                        type: "success",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: "Desactivée!",
                        text: response.message,
                        type: "error",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                }
            }
        });
    });


    "use strict"
    // init list view datatable
    var dataListView = $(".data-list-view").DataTable({
        responsive: true,
        columnDefs: [{
            orderable: true,
            targets: 0,
            checkboxes: { selectRow: true }
        }],
        dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
        oLanguage: {
            sLengthMenu: "_MENU_",
            sSearch: ""
        },
        aLengthMenu: [
            [4, 10, 15, 20],
            [4, 10, 15, 20]
        ],
        select: {
            style: "single"
        },
        order: [
            [1, "asc"]
        ],
        bInfo: false,
        pageLength: 4,
        buttons: [{
            text: "<i class='feather icon-plus'></i> Ajoute Un Produit",
            action: function() {
                window.location.href = "addproduits";
            },
            className: "btn-outline-primary"
        }],
        initComplete: function(settings, json) {
            $(".dt-buttons .btn").removeClass("btn-secondary")
        }
    });

    dataListView.on('draw.dt', function() {
        setTimeout(function() {
            if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
            }
        }, 50);
    });

    // init thumb view datatable
    var dataThumbView = $(".data-thumb-view").DataTable({
        responsive: false,
        columnDefs: [{
            orderable: true,
            targets: 0,
            checkboxes: { selectRow: true }
        }],
        dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
        oLanguage: {
            sLengthMenu: "_MENU_",
            sSearch: ""
        },
        aLengthMenu: [
            [4, 10, 15, 20],
            [4, 10, 15, 20]
        ],
        select: {
            style: "multi"
        },
        order: [
            [1, "asc"]
        ],
        bInfo: false,
        pageLength: 4,
        buttons: [{
            text: "<i class='feather icon-plus'></i> Add New",
            action: function() {
                $(this).removeClass("btn-secondary")
                $(".add-new-data").addClass("show")
                $(".overlay-bg").addClass("show")
            },
            className: "btn-outline-primary"
        }],
        initComplete: function(settings, json) {
            $(".dt-buttons .btn").removeClass("btn-secondary")
        }
    })

    dataThumbView.on('draw.dt', function() {
        setTimeout(function() {
            if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
            }
        }, 50);
    });

    // To append actions dropdown before add new button
    var actionDropdown = $(".actions-dropodown")
    actionDropdown.insertBefore($(".top .actions .dt-buttons"))


    // Scrollbar
    if ($(".data-items").length > 0) {
        new PerfectScrollbar(".data-items", { wheelPropagation: false })
    }

    // Close sidebar
    $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
        $(".add-new-data").removeClass("show")
        $(".overlay-bg").removeClass("show")
        $("#data-name, #data-price").val("")
        $("#data-category, #data-status").prop("selectedIndex", 0)
    })



    // dropzone init
    Dropzone.options.dataListUpload = {
        complete: function(files) {
            var _this = this
                // checks files in class dropzone and remove that files
            $(".hide-data-sidebar, .cancel-data-btn, .actions .dt-buttons").on(
                "click",
                function() {
                    $(".dropzone")[0].dropzone.files.forEach(function(file) {
                        file.previewElement.remove()
                    })
                    $(".dropzone").removeClass("dz-started")
                }
            )
        }
    }
    Dropzone.options.dataListUpload.complete()

    // mac chrome checkbox fix
    if (navigator.userAgent.indexOf("Mac OS X") != -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
    }
});