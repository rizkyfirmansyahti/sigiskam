/*
Template Name: Minia - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Datatables Js File
*/

$(document).ready(function() {
    var datatableInstance = null;
    
    function toggleScrollX() {
        var screenWidth = $(window).width();
        var languageOptions = {
            info: 'Menampilkan halaman _PAGE_ dari _PAGES_',
            infoEmpty: 'Tidak ada data yang tersedia',
            infoFiltered: '(Difilter dari _MAX_ total data)',
            lengthMenu: 'Menampilkan _MENU_ data per halaman',
            zeroRecords: 'Data kosong',
            search: 'Pencarian',
            paginate: {
                'next': 'Berikut',
                'previous': 'Sebelum',
            },
        };

        if (datatableInstance !== null) {
            datatableInstance.destroy();
        }

        if (screenWidth <= 768) {
            datatableInstance = $('#datatable').DataTable({
                responsive: false,
                columnDefs: [{
                    targets: -1,
                    orderable: false
                }],
                language: languageOptions,
                scrollX: true
            });
        } else {
            datatableInstance = $('#datatable').DataTable({
                responsive: false,
                columnDefs: [{
                    targets: -1,
                    orderable: false
                }],
                language: languageOptions,
                scrollX: false
            });
        }
    }

    toggleScrollX()
    // setInterval(toggleScrollX, 500);
    $(window).resize(toggleScrollX);

    $(".dataTables_length select").addClass('form-select form-select-sm');
});