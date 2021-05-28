<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')
<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
@endif
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@switch($page_name)
    @case('analytics')
      {{-- Dashboard --}}
      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/dash_2.js')}}"></script>
      @break

    @case('session_timeout')
      {{-- Compoentnts session timeout --}}
      <script src="{{asset('assets/js/components/session-timeout/bootstrap-session-timeout.js')}}"></script>
      <script src="{{asset('assets/js/components/session-timeout/custom-bootstrap_session_timeout.js')}}"></script>
      @break

    @case('notifications')
      {{-- Compoents Snackbar --}}
      <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
      <script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
      <script src="{{asset('assets/js/components/notification/custom-snackbar.js')}}"></script>
      <script>
          // Get the Toast button
          var toastButton = document.getElementById("toast-btn");
          // Get the Toast element
          var toastElement = document.getElementsByClassName("toast")[0];

          toastButton.onclick = function() {
              $('.toast').toast('show');
          }
      </script>
      @break

    @case('sweet_alerts')
      {{-- Components Sweetalerts --}}
      <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
      <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
      <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
      @break
  
      @case('cadastrar-empresa')
      {{-- Table Datatable Custom --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script>
          // var e;
          c3 = $('#tabela-empresas').DataTable({
              "oLanguage": {
                  "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                  "sInfo": "Showing page _PAGE_ of _PAGES_",
                  "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                  "sSearchPlaceholder": "Pesquisar...",
                  "sLengthMenu": "Results :  _MENU_",
              },
              "stripeClasses": [],
              "lengthMenu": [5, 10, 20, 50, 100],
              "pageLength": 5
          });

          multiCheck(c3);
      </script>
      {{-- Table Datatable HTML5 --}}
      {{-- <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
      <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
      <script>
          $('#zero-config').DataTable( {
              dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
              buttons: {
                  buttons: [
                      { extend: 'copy', className: 'btn' },
                      { extend: 'csv', className: 'btn' },
                      { extend: 'excel', className: 'btn' },
                      { extend: 'print', className: 'btn' }
                  ]
              },
              "oLanguage": {
                  "oPaginate": {"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                  "sInfo": "Showing page _PAGE_ of _PAGES_",
                  "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                  "sSearchPlaceholder": "Pesquisar...",
                  "sLengthMenu": "Results :  _MENU_",
              },
              "stripeClasses": [],
              "lengthMenu": [5, 10, 20, 30, 50, 100],
              "pageLength": 5 
          } );
      </script> --}}
      <script src="{{asset('plugins/font-icons/feather/feather.min.js')}}"></script>
      <script type="text/javascript">
          feather.replace();
      </script>
      <script src="{{asset('plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
      <script src="{{asset('plugins/scripts-empresa.js')}}"></script>
      <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
      <script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
      <script src="{{asset('plugins/bootstrap-maxlength/custom-bs-maxlength.js')}}"></script>
      @break

      @case('vendas')
        <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
        <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
        <script>
            $('#zero-config').DataTable( {
                dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'btn' },
                        { extend: 'csv', className: 'btn' },
                        { extend: 'excel', className: 'btn' },
                        { extend: 'print', className: 'btn' }
                    ]
                },
                "oLanguage": {
                    "oPaginate": {"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Pesquisar...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 30, 50, 100],
                "pageLength": 5 
            } );
        </script>
        <script src="{{asset('plugins/scripts-vendas.js')}}"></script>
      @break

      @case('cadastrar-profissional')
      {{-- Table Datatable HTML5 --}}
      <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
      <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
      <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
      <script>
          $('#zero-config').DataTable( {
              dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
              buttons: {
                  buttons: [
                      { extend: 'copy', className: 'btn' },
                      { extend: 'csv', className: 'btn' },
                      { extend: 'excel', className: 'btn' },
                      { extend: 'print', className: 'btn' }
                  ]
              },
              "oLanguage": {
                  "oPaginate": {"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                  "sInfo": "Showing page _PAGE_ of _PAGES_",
                  "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                  "sSearchPlaceholder": "Pesquisar...",
                  "sLengthMenu": "Results :  _MENU_",
              },
              "stripeClasses": [],
              "lengthMenu": [5, 10, 20, 30, 50, 100],
              "pageLength": 5 
          } );
      </script>
      <script src="{{asset('plugins/font-icons/feather/feather.min.js')}}"></script>
      <script type="text/javascript">
          feather.replace();
      </script>
      <script src="{{asset('plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
      <script src="{{asset('plugins/scripts-profissional.js')}}"></script>
      <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
      <script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
      <script src="{{asset('plugins/bootstrap-maxlength/custom-bs-maxlength.js')}}"></script>
      @break


    @default
    <script>console.log('No custom script available.')</script>
@endswitch
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->