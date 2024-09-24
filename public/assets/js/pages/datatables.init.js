/*
Template Name: Minible - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Datatables Js File
*/

$(document).ready(function() {
    $('#datatable').DataTable();

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        
        $(".dataTables_length select").addClass('form-select form-select-sm');
} );


// Export Supplier
$(document).ready(function () {
    $('#datatable-supplier').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: 'Export Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'colvis',
                text: 'Pilih Kolom',
                className: 'btn btn-info'
            }
        ],
        responsive: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json" // Terjemahkan DataTables ke Bahasa Indonesia jika perlu
        }
    });
});
