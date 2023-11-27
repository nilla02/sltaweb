// Call the dataTables jQuery plugin

$(document).ready(function() {
  $('#dataTable').DataTable( {
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
  } );
} );

$(document).ready(function() {
  $('#accommodation').DataTable( {
    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    "order": [[ 6, "asc" ]],
  } );
} );