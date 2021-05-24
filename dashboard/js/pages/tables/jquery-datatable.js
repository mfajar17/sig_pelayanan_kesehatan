$(function () {
    $('.js-basic-example').DataTable({
        responsive: true,
        lengthMenu:[0,5,10,100],
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        // lengthMenu:[5,10,100],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});