<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "Anggaran SatPolPP" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/font.css")}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/ionic.css")}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- DataTabel -->
    <link href="{{ asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css") }}" rel="stylesheet" type="text/css" />
    <!-- Skin -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}" rel="stylesheet" type="text/css" />
    
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css")}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/iCheck/all.css")}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/colorpicker/bootstrap-colorpicker.min.css")}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.css")}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/select2/select2.min.css")}}">

    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />


    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">

      <!-- Header -->
      @include('header')

      <!-- Sidebar -->
      @include('sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{ $page_title or "Anggaran SatPolPP" }}
            <small>{{ $page_description or null }}</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">          
          <!-- Your Page Content Here -->
          @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Footer -->
      

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <!-- Select2 -->
    <script src="{{ asset("bower_components/admin-lte/plugins/select2/select2.full.min.js")}}"></script>
    <!-- InputMask -->
    <script src="{{ asset("bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js")}}"></script>
    <script src="{{ asset("bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js")}}"></script>
    <script src="{{ asset("bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js")}}"></script>
    <script src="{{ asset("bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset("bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js")}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset("bower_components/admin-lte/plugins/colorpicker/bootstrap-colorpicker.min.js")}}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset("bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js")}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset("bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js")}}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset("bower_components/admin-lte/plugins/iCheck/icheck.min.js")}}"></script>
    <!-- FastClick -->
    <script src="{{ asset("bower_components/admin-lte/plugins/fastclick/fastclick.min.js")}}"></script>
    <!-- jQuery 2.1.3 -->
    <script src="{{ asset("bower_components/admin-lte/dist/js/demo.js")}}"></script>

    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        $(".select2").select2();
      });
    
    
    </script>
  </body>
</html>