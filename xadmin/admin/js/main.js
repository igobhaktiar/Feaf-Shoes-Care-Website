// Call the dataTables jQuery plugin
// $(document).ready(function () {
//   $('#tb_layanan').DataTable();
// });
$(document).ready(function () {
  $('#dataTable').DataTable();
});
var table = $('#tb_layanan').DataTable({
  pageLength : 5,
  lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'yyoo']]
});
