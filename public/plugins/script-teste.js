$(document).ready(function() {
    
    let table = $('#example').DataTable();
    new $.fn.dataTable.SearchBuilder(table, {});
    table.searchBuilder.container().prependTo(table.table().container());
});