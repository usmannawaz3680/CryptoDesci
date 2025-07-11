import "./bootstrap";
import "flowbite";
import "datatables.net";
import "datatables.net-dt/css/dataTables.dataTables.css";
import $ from "jquery";
import Alpine from 'alpinejs'
import { collapse } from "@alpinejs/collapse";

window.Alpine = Alpine

Alpine.start()
Alpine.plugin(collapse);
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
    $("[id^='cryptoDiscoverTable']").each(function () {
        $(this).DataTable({
            paging: false,
            searching: false,
            info: false,
            ordering: true,
            columnDefs: [{ orderable: false, targets: [3] }],
        });
    });
});