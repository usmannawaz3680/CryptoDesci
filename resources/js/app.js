import "./bootstrap";
import "flowbite";
import 'datatables.net';
import 'datatables.net-dt/css/dataTables.dataTables.css';
import $ from 'jquery';
// import "flowbite";
$(document).ready(function () {
  $("[id^='cryptoTable']").each(function () {
    $(this).DataTable({
      paging: false,
      searching: false,
      info: false,
      ordering: true,
      columnDefs: [{ orderable: false, targets: [4] }],
    });
  });
});