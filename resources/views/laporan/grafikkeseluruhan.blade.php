<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Setting Obyek Belanja</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
    <link href="{{ asset("/bower_components/admin-lte/awesome-font/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/ionic.css")}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- DataTables -->
    <link href="{{ asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css") }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
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
            Grafik Realisasi Keseluruhan
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body" style="margin-top:5px">
                    <form class="form" method="" action="">
                        <div class="form-inline">
                            <label for="tahun">Tahun:</label>
                            <select class="form-control select2" id="pertahun">
                                @foreach($tahun as $data)
                                <option value="{{$data->tahun}}">{{$data->tahun}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary" style="margin-left:20px">preview</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-xs-4">
                <div class="box">
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Bulan</th>
                        <th>RKO</th>
                        <th>Realisasi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($rko as $data)
                      <tr>
                        <td>Januari</td>
                        <td>{{$data->jan}}<?php $rkoJan = $data->jan ?></td>
                        <td>0</td>
                      </tr>
                      <tr>
                        <td>Februari</td>
                        <td>{{$data->feb}}<?php $rkoFeb = $data->feb ?></td>
                        <td>0</td>
                      </tr>
                      <tr>
                        <td>Maret</td>
                        <td>{{$data->mar}} <?php $rkoMar = $data->mar ?></td>
                        <td>0</td>
                      </tr>
                      <tr>
                        <td>April</td>
                        <td>{{$data->apr}} <?php $rkoApr = $data->apr ?></td>
                        <td>0</td>
                      </tr>
                      <tr>
                        <td>Mei</td>
                        <td>{{$data->mei}} <?php $rkoMei = $data->mei ?></td>
                        <td>0</td>
                      </tr>
                      <tr>
                        <td>Juni</td>
                        <td>{{$data->jun}} <?php $rkoJun = $data->jun ?></td>
                        <td>0</td>
                      </tr>
                      <tr>
                        <td>Juli</td>
                        <td>{{$data->jul}} <?php $rkoJul = $data->jul ?></td>
                        <td>0</td>
                      </tr>
                        <tr>
                        <td>Agustus</td>
                        <td>{{$data->agu}} <?php $rkoAgu = $data->agu ?></td>
                        <td>0</td>
                      </tr>
                        <tr>
                        <td>September</td>
                        <td>{{$data->sep}} <?php $rkoSep = $data->sep ?></td>
                        <td>0</td>
                      </tr>
                        <tr>
                        <td>Oktober</td>
                        <td>{{$data->okt}} <?php $rkoOkt = $data->okt ?></td>
                        <td>0</td>
                      </tr>
                        <tr>
                        <td>November</td>
                        <td>{{$data->nov}} <?php $rkoNov = $data->nov ?></td>
                        <td>0</td>
                      </tr>
                        <tr>
                        <td>Desember</td>
                        <td>{{$data->des}} <?php $rkoDes = $data->des ?></td>
                        <td>0</td>
                      </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                  </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-8">
              <div class="box">
                <div class="box-body">
                <div class="box-header"></div>
                <div class="chart">
                    <canvas id="barChart" style="height:330px"></canvas>
                </div>
                <div class="box-footer">
                    <center>
                        <span style="background-color:rgba(210, 214, 222, 1); padding:5px">RKO</span>
                        <span style="background-color:#00a65a; padding:5px; color:#fff; margin-left:20px">Realisasi</span>
                    </center>
                </div>    
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->

    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}"></script>
    <!--  Chart  -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/chartjs/Chart.min.js") }}"></script>
    <!-- DataTables -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
    <!-- FastClick -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/fastclick/fastclick.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/demo.js") }}"></script>
    <!-- page script -->
    <script>
    $(function () {
        //bar chart
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = {
          labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
          datasets: [
            {
              label: "RKO",
              //styling grafik batang1
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
                
              //data grafik dari database RKO perbulan pertahun
              data: [@foreach($rko as $data) {{$data->jan}}, {{$data->feb}}, {{$data->mar}}, {{$data->apr}}, {{$data->mei}}, {{$data->jun}}, {{$data->jul}}, {{$data->agu}}, {{$data->sep}}, {{$data->okt}}, {{$data->nov}}, {{$data->des}} @endforeach]
            },
            {
              label: "realisasi",
              //styling grafik batang2
              fillColor: "#00a65a",
              strokeColor: "#00a65a",
              pointColor: "#00a65a",
              pointStrokeColor: "#00a65a",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "#00a65a",
                
              //data grafik dari database realisasi anggaran program perbulan pertahun
              data: [28, 48, 40, 19, 86, 27, 90, 24, 78, 44, 56, 45]
            }
          ]
        };
//        barChartData.datasets[1].fillColor = "#00a65a";
//        barChartData.datasets[1].strokeColor = "#00a65a";
//        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
        
    });
    </script>
  </body>
</html>