//display data table buttons
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
//show popup modal
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
//auto close alert button
$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
// //auto load page
// $(window).load(function(){
//   $('#myModal').modal('show');
// }).onRefresh();
