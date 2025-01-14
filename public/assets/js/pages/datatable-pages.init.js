/*
Template Name: Minia - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: datatable for pages Js File
*/


// datatable
// $(document).ready(function () {
//     $('.datatable').DataTable({
//         responsive: false,
//         columnDefs: [
//             {
//             targets: -1,
//             orderable: false,
//             }
//         ],
//     });
//     $(".dataTables_length select").addClass('form-select form-select-sm');
// });
$(document).ready(function() {
    $('.datatable').DataTable({
        responsive: false,
    });
    $(".dataTables_length select").addClass('form-select form-select-sm');
});